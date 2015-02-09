<?php
require_once __DIR__.'/../../src/moosend/MoosendApi.php';
require_once __DIR__.'/../../src/moosend/Models/SubscriberParams.php';

use moosend\MoosendApi;
use moosend\StubHttpClient;
use moosend\Wrappers\SubscribersWrapper;
use moosend\Models\SubscriberParams;

class SubscribersWrapperTest extends \PHPUnit_Framework_TestCase {
	private $_moosendApi;
	private $_stubHttpClient;
	private $_apiKey = 'myApiKey';
	private $_campaignID = 'myCampaignID';
	
	public function setUp() {
		$this->_moosendApi = new MoosendApi($this->_apiKey);
		$this->_stubHttpClient = new StubHttpClient();
	}
	
	function tearDown() {
		$this->_moosendApi = null;
		$this->_stubHttpClient = null;
	}
	
	/**
	 * Test SubscribersWrapper constructor when API key is valid.
	 * @covers moosend\Wrappers\SubscribersWrapper::__construct
	 * @group SubscribersWrapperTest
	 */
	public function test_Can_Create_SubscriberWrapper_Instance() {
		$subscribersWrapper = new SubscribersWrapper($this->_stubHttpClient, $this->_moosendApi->getApiEndpoint(), $this->_apiKey);
		$this->assertInstanceOf('moosend\Wrappers\SubscribersWrapper', $subscribersWrapper);
	}

	//================================================================================
	// SubscribersWrapper::getSubscriberByEmail
	//================================================================================
	
	/**
	 * Test error handling when calling getByEmail with an invalid mailingListID and/or email.
	 * @group SubscribersWrapperTest
	 * @covers moosend\Wrappers\SubscribersWrapper::getSubscriberByEmail
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForGetByEmailAndRemoveSubscriber
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_GetSubscriberByEmail_With_Invalid_Arguments($mailingListID, $email) {
		$this->_moosendApi->subscribers->getSubscriberByEmail($mailingListID, $email);
	}
	
	//================================================================================
	// SubscribersWrapper::removeSubscriber
	//================================================================================
	
	/**
	 * Test error handling when calling removeSubscriberByEmail with an invalid mailingListID and/or email.
	 * @group SubscribersWrapperTest
	 * @covers moosend\Wrappers\SubscribersWrapper::removeSubscriber
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForGetByEmailAndRemoveSubscriber
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_RemoveSubscriber_With_Invalid_Arguments($mailingListID, $email) {
		$this->_moosendApi->subscribers->removeSubscriber($mailingListID, $email);
	}
	
	//================================================================================
	// SubscribersWrapper::removeMultipleSubscribers
	//================================================================================
	
	/**
	 * Test error handling when calling removeMultipleSubscribers with an invalid mailingListID and/or email.
	 * @group SubscribersWrapperTest
	 * @covers moosend\Wrappers\SubscribersWrapper::removeMultipleSubscribers
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForGetByEmailAndRemoveSubscriber
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_RemoveMultipleSubscribers_With_Invalid_Arguments($mailingListID, $email) {
		$this->_moosendApi->subscribers->removeMultipleSubscribers($mailingListID, $email);
	}

	//================================================================================
	// Invalid values provider 
	//================================================================================
	
	public function providerInvalidValuesForGetByEmailAndRemoveSubscriber() {
		return array (
				array('', ''),
				array(123, ''),
				array(123.4, 123),
				array(null, '')
		);
	}
	
	//================================================================================
	// SubscribersWrapper::addSubscriber
	//================================================================================
	
	/**
	 * Test error handling when calling addSubscriber with an invalid mailing list ID address.
	 * @group SubscribersWrapperTest
	 * @covers moosend\Wrappers\SubscribersWrapper::addSubscriber
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForAddSubscriber
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_AddSubscriber_With_Invalid_MailingListID($mailingListID) {
		$params = new SubscriberParams();
		$this->_moosendApi->subscribers->addSubscriber($mailingListID, $params);
	}
	
	//================================================================================
	// Invalid values provider
	//================================================================================
	
	public function providerInvalidValuesForAddSubscriber() {
		return array (
				array(''),
				array(123),
				array(123.4),
				array(null)
		);
	}
	
	//================================================================================
	// SubscribersWrapper::addMultipleSubscribers
	//================================================================================
	
	/**
	 * Test error handling when calling addMultipleSubscribers with an invalid mailing list ID.
	 * @group SubscribersWrapperTest
	 * @covers moosend\Wrappers\SubscribersWrapper::addMultipleSubscribers
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForAddMultipleSubscribers
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_AddMultipleSubscribers_With_Invalid_MailingListID($mailingListID, $subscribers) {
		$this->_moosendApi->subscribers->addMultipleSubscribers($mailingListID, $subscribers);
	}
	
	//================================================================================
	// Invalid values provider
	//================================================================================
	
	public function providerInvalidValuesForAddMultipleSubscribers() {
		return array (
				array('', array()),
				array(null, array())
		);
	}
	
	//================================================================================
	// SubscribersWrapper::unsubscribe
	//================================================================================
	
	/**
	 * Test error handling when calling addSubscriber with an invalid mailing list ID address.
	 * @group SubscribersWrapperTest
	 * @covers moosend\Wrappers\SubscribersWrapper::unsubscribe
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForUnsubscribe
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_AddSubscriber_With_Invalid_Arguments($email, $campaignID, $mailingListID) {
		$this->_moosendApi->subscribers->unsubscribe($email, $campaignID, $mailingListID);
	}
	
	//================================================================================
	// Invalid values provider
	//================================================================================
	
	public function providerInvalidValuesForUnsubscribe() {
		return array (
				array('', '', 123),
				array(123, '', ''),
				array('', '', 123)
		);
	}
	
// 	//================================================================================
// 	// SubscribersWrapper::removeMultipleSubscribers
// 	//================================================================================
	
// 	/**
// 	 * Test error handling when calling removeMultipleSubscribers with an invalid arguments.
// 	 * @group SubscribersWrapperTest
// 	 * @covers moosend\Wrappers\SubscribersWrapper::removeMultipleSubscribers
// 	 * @expectedException InvalidArgumentException
// 	 * @dataProvider providerInvalidValuesForRemoveMultipleSubscribers
// 	 */
// 	public function test_Throws_InvalidArgumentException_When_Calling_AddSubscriber_With_Invalid_Arguments($email, $campaignID, $mailingListID) {
// 		$this->_moosendApi->subscribers->removeMultipleSubscribers($mailingListID, $emails);
// 	}
	
// 	//================================================================================
// 	// Invalid values provider
// 	//================================================================================
	
// 	public function providerInvalidValuesForRemoveMultipleSubscribers() {
// 		return array (
// 				array('', '', 123),
// 				array(123, '', ''),
// 				array('', '', 123)
// 		);
// 	}
}