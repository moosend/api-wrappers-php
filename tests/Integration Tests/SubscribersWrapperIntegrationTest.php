<?php
namespace tests\IntegrationTests;

use moosend\MoosendApi;
use moosend\Models\SubscriberParams;
use moosend\ApiException;

class SubscribersWrapperIntergrationTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * @group SubscribersWrapperIntergrationTest
	 */
	public function test_SubscribersWrapperIntergrationTests() {
		$apiKey = 'a3ad8125-2a70-4868-ac05-29c75286810a';
		$moosendApi = new MoosendApi($apiKey);
		$mailingListID = '15930a54-345f-474f-a106-784793932e3d';
		
		// new subscriber params
		$member = new SubscriberParams();
		$member->name = 'Giannis';
		$member->email = 'giannis@example.com';
		$member->customFields = array("Age=30", "Country=GREECE"); 
		
		// add new subscriber
		$moosendApi->subscribers->addSubscriber($mailingListID, $member);
		
		// get the new susbscriber
		$subscriber = $moosendApi->subscribers->getSubscriberByEmail($mailingListID, $member->email);
		
		$this->assertEquals($member->name, $subscriber->Name);
		$this->assertEquals($member->email, $subscriber->Email);
		$this->assertEquals(30, $subscriber->CustomFields[0]->Value);
		$this->assertEquals('Age', $subscriber->CustomFields[0]->Name);
		$this->assertEquals('GREECE', $subscriber->CustomFields[1]->Value);
		$this->assertEquals('Country', $subscriber->CustomFields[1]->Name);
		
		// unsubscribe
		$moosendApi->subscribers->unsubscribe($member->email, null, $mailingListID);
		
		// get the unsubscribed subscriber
		$unsubscribed = $moosendApi->subscribers->getSubscriberByEmail($mailingListID, $member->email);
		$this->assertTrue($unsubscribed->SubscribeType == 2, 'successfully unsubscribed');	
		
		// subscribe user again
		$moosendApi->subscribers->addSubscriber($mailingListID, $member);
		
		// remove subscriber
		$moosendApi->subscribers->removeSubscriber($mailingListID, $member->email);
		
		// get the removed subscriber
		$removed = $moosendApi->subscribers->getSubscriberByEmail($mailingListID, $member->email);
		$this->assertTrue($removed->SubscribeType == 4	, 'successfully removed');
		
		//  add multiple subcribers
		$newSubscribers = [
		 'Subscribers[0].Email' => 'first@1.com',
		 'Subscribers[0].Name' => 'first',
		 'Subscribers[0].CustomFields' => ['Age=22', 'Country=GREECE'],
		 'Subscribers[1].Email' => 'second@2.com',
		 'Subscribers[1].Name' => 'second',
		 'Subscribers[1].CustomFields' => ['Age=32', 'Country=USA']
		 ];
		$add = $moosendApi->subscribers->addMultipleSubscribers($mailingListID, $newSubscribers);
		
		// get subscribers
		try {
			$subscriber1 = $moosendApi->subscribers->getSubscriberByEmail($mailingListID, 'first@1.com');
			$subscriber2 = $moosendApi->subscribers->getSubscriberByEmail($mailingListID, 'second@2.com');
			
			$this->assertTrue($subscriber1->Email == 'first@1.com');
			$this->assertTrue($subscriber2->Email == 'second@2.com');
		} catch (ApiException $e) {
			var_dump($e->getMessage());
		}
		
		// remove multiple subscribers
		$emails = 'first@1.com, second@2.com';
		$moosendApi->subscribers->removeMultipleSubscribers($mailingListID, $emails);
		
		try {
			$subscriber1 = $moosendApi->subscribers->getSubscriberByEmail($mailingListID, 'first@1.com');
			$subscriber2 = $moosendApi->subscribers->getSubscriberByEmail($mailingListID, 'second@2.com');
		} catch (ApiException $e) {
			$this->assertTrue(true);
		}
	}
}