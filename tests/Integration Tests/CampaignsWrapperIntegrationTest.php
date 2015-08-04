<?php
namespace tests\IntegrationTests;

use moosend\MoosendApi;
use moosend\Models\CampaignParams;
use moosend\Models\ABCampaignData;
use moosend\ApiException;

class CampaignsWrapperIntergrationTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * @group CampaignsWrapperIntergrationTest
	 */
	public function test_CampaignsWrapperIntegrationTests() {
		$apiKey = '03e3c603-44f4-4b23-88be-95b200d2f752';
		$moosendApi = new MoosendApi($apiKey);
		$mailingListID = 'c673e294-a68a-46de-bdbf-e2ead42679c5';
		
		// find segment ID
		$segments = $moosendApi->segments->getSegments($mailingListID);
		$segmentID = null;
		foreach ($segments as $segment) {
			if ($segment->getName() == 'Campaigns Wrapper Integration Tests Segment (under 30)') {
				$segmentID = $segment->getID();
			}
		}
		
		// draft parameters
		$draftParams = new CampaignParams();
		
		$draftParams->MailingListID = $mailingListID;
		$draftParams->Name = 'Campaigns Wrapper Integration Tests: Draft Name';
		$draftParams->Subject = 'Campaigns Wrapper Integration Tests: Subject';
		$draftParams->SenderEmail = 'j_tg86@yahoo.com';
		$draftParams->ReplyToEmail = 'j_tg86@yahoo.com';
	    $draftParams->ConfirmationToEmail = 'example@example.com'; 
		$draftParams->WebLocation = 'http://en.aegeanair.com/-/media/newsletter/290715/indexGR1.html';
 		$draftParams->SegmentID = $segmentID;
		$draftParams->ABCampaignType = 1;
		$draftParams->WebLocationB = 'http://www.mycoupon.gr/newsletter/index';
		$draftParams->HoursToTest = 1;
		$draftParams->ListPercentage = 25;
		$draftParams->ABWinnerSelectionType = 1;
		
		// create draft
		try {
			$draftID = $moosendApi->campaigns->createDraft($draftParams);
		} catch (ApiException $e) {
			if ($e->getCode() == -2) {
				var_dump($e->getMessages());
			} else {
				var_dump($e->getMessage());
			}
		}
		
		// get draft
		$draft = $moosendApi->campaigns->getCampaign($draftID);
				
		$this->assertEquals($draftParams->Name, $draft->getName());
 		$this->assertEquals($draftParams->Subject, $draft->getSubject());
 		$this->assertEquals($draftParams->SenderEmail, $draft->getSender()->getEmail());
 		$this->assertEquals($draftParams->ReplyToEmail, $draft->getReplyToEmail()->getEmail());
		$this->assertEquals($draftParams->ConfirmationToEmail, $draft->getConfirmationTo());
		$this->assertEquals($draftParams->WebLocation, $draft->getWebLocation());
		$this->assertEquals($draftParams->MailingListID, $draft->getMailingList()->getID());
		$this->assertEquals($draftParams->SegmentID, $draft->getSegment()->getID());
		$this->assertEquals($draftParams->ABCampaignType, $draft->getABCampaignData()->getABCampaignType());
		$this->assertEquals($draftParams->WebLocationB, $draft->getABCampaignData()->getWebLocationB());
		$this->assertEquals($draftParams->HoursToTest, $draft->getABCampaignData()->getHoursToTest());
		$this->assertEquals($draftParams->ListPercentage, $draft->getABCampaignData()->getListPercentage());
		$this->assertEquals($draftParams->ABWinnerSelectionType, $draft->getABCampaignData()->getABWinnerSelectionType());
		
		// updateDraft
		$sender = $moosendApi->campaigns->getSenderDetails('j_tg86@yahoo.com');
		
		$draft->setName('Campaigns Wrapper Integration Tests: Draft Name After Update');
		$draft->setSubject('Campaigns Wrapper Integration Tests: Subject After Update');
		$draft->setWebLocation('http://www.mycoupon.gr/newsletter/index');
		$draft->setConfirmationTo('example@example.com');
		$draft->setSender($sender);
		$draft->setReplyToEmail($sender);

		$newMailingList = $moosendApi->mailingLists->getDetails('f22f9e33-c1c6-41ee-94e9-03265fa4feff');
		$draft->setMailingList($newMailingList);
		
		$segment = null;
		$segments = $moosendApi->segments->getSegments($newMailingList->getID());
		foreach ($segments as $newListSegment) {
			if ($newListSegment->getName() == 'Me') {
				$segment = $newListSegment;
				$draft->setSegment($segment);
			}
		}
		
		date_default_timezone_set('UTC');
		
		$deliveredOn = \DateTime::createFromFormat('d/m/Y', '23/05/2013');
		$draft->setDeliveredOn($deliveredOn);
		
		$scheduledFor = \DateTime::createFromFormat('d/m/Y', '23/05/2017');
		$draft->setScheduledFor($scheduledFor);
		
		$draft->setTimezone('timezone');
		$draft->setFormatType(2);
		
		$ABCampaignData = new ABCampaignData();
		
		$ABCampaignData->setABCampaignType(1); // 1: 'Content': Test two different versions of the campaign content and send the final campaign to the one performing better.
		$ABCampaignData->setABWinnerSelectionType(1); // 1: 'TotalUniqueClicks': Used to determine the winner of an AB campaign according to which version achieved more unique link clicks
		$ABCampaignData->setHoursToTest(1);
		$ABCampaignData->setListPercentage(25);
		$ABCampaignData->setWebLocationB('http://www.mycoupon.gr/newsletter/index');
		
		$draft->setABCampaignData($ABCampaignData);
		
		// update draft
		$moosendApi->campaigns->updateDraft($draft);
		// get updated draft
		$updatedDraft = $moosendApi->campaigns->getCampaign($draftID);
		
		$this->assertEquals($draft->getName(), $updatedDraft->getName());
		$this->assertEquals($draft->getSubject(), $updatedDraft->getSubject());
		$this->assertEquals($draft->getWebLocation(), $updatedDraft->getWebLocation());
		$this->assertEquals($draft->getConfirmationTo(), $updatedDraft->getConfirmationTo());
		$this->assertEquals($sender->getEmail(), $updatedDraft->getSender()->getEmail());
		$this->assertEquals($draft->getReplyToEmail()->getEmail(), $updatedDraft->getReplyToEmail()->getEmail());
		$this->assertEquals($newMailingList->getID(), $updatedDraft->getMailingList()->getID());
		$this->assertEquals($segment->getID(), $updatedDraft->getSegment()->getID());
		$this->assertEquals($ABCampaignData->getABCampaignType(), $updatedDraft->getABCampaignData()->getABCampaignType());
		$this->assertEquals($ABCampaignData->getABWinnerSelectionType(), $updatedDraft->getABCampaignData()->getABWinnerSelectionType());
		$this->assertEquals($ABCampaignData->getHoursToTest(), $updatedDraft->getABCampaignData()->getHoursToTest());
		$this->assertEquals($ABCampaignData->getListPercentage(), $updatedDraft->getABCampaignData()->getListPercentage());
		$this->assertEquals($ABCampaignData->getWebLocationB(), $updatedDraft->getABCampaignData()->getWebLocationB());
		
		// clone campaign
		$clonedDraft = $moosendApi->campaigns->cloneCampaign($draftID);
		$this->assertEquals($draft->getName(), $clonedDraft->getName());
		
		// get clone
		$moosendApi->campaigns->delete($clonedDraft->getID());
		
		// send draft
		$moosendApi->campaigns->send($draftID);
		// get campaign
		$campaign = $moosendApi->campaigns->getCampaign($draftID);
		$this->assertTrue($campaign->getStatus() == 1, 'Campaign sent');
		
		// delete campaign
		$moosendApi->campaigns->delete($draftID);
	}
}
