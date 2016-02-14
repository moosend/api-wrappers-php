<?php
namespace tests\IntegrationTests;

use moosend\MoosendApi;
use moosend\Models\CampaignParams;
use moosend\Models\ABCampaignData;
use moosend\ApiException;
use moosend\Models\Campaign;

require_once __DIR__.'/../../src/moosend/Models/CampaignMailingListForm.php';

class CampaignsWrapperIntergrationTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * @group CampaignsWrapperIntergrationTest
	 */
	public function test_CampaignsWrapperIntegrationTests() {
		$apiKey = 'a3ad8125-2a70-4868-ac05-29c75286810a';
		$moosendApi = new MoosendApi($apiKey);
		$mailingListID = 'c673e294-a68a-46de-bdbf-e2ead42679c5';
		$mailingList = $moosendApi->mailingLists->getDetails($mailingListID);
		
		// find segment ID
		$segments = $moosendApi->segments->getSegments($mailingListID);
		$segmentID = null;
		foreach ($segments as $segment) {
			if ($segment->Name() == 'Campaigns Wrapper Integration Tests Segment (under 30)') {
				$segmentID = $segment->ID();
			}
		}
		
		// draft parameters
		$draftParams = new CampaignParams();
		
		$campaignMailingList = new \CampaignMailingListForm();
		$campaignMailingList->MailingListId = $mailingListID;
		$draftParams->MailingLists = array($campaignMailingList);
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
				var_dump($e->Messages);
			} else {
				var_dump($e->Message);
			}
		}
		
		//  draft
		$campaigns = $moosendApi->campaigns->getCampaigns();
		
		$draft;
		foreach ($campaigns->Campaigns as $campaign) {
			if ($campaign->ID == $draftID) {
				$draft = $campaign;
			}
		}
			
		if (isset($draft)) {
			// commented out until get campaign works and can get campaign details - NOT summary (CampaignSummary has not a property called WebLocation for example)
					
			$this->assertEquals($draftParams->Name, $draft->Name);
			$this->assertEquals($draftParams->Subject, $draft->Subject);
			//$this->assertEquals($draftParams->SenderEmail, $draft->Sender->Email);
			//$this->assertEquals($draftParams->ReplyToEmail, $draft->ReplyToEmail->Email);
			$this->assertEquals($draftParams->ConfirmationToEmail, $draft->ConfirmationTo);
			//$this->assertEquals($draftParams->WebLocation, $draft->WebLocation);
			$this->assertEquals($draftParams->MailingLists[0]->ID, $draft->MailingLists[0]->ID);
			//$this->assertEquals($draftParams->SegmentID, $draft->Segment->ID);
			$this->assertEquals($draftParams->ABCampaignType, $draft->ABCampaignType);
			//$this->assertEquals($draftParams->WebLocationB, $draft->ABCampaignData->WebLocationB);
			//$this->assertEquals($draftParams->HoursToTest, $draft->ABCampaignData->HoursToTest);
			//$this->assertEquals($draftParams->ListPercentage, $draft->ABCampaignData->ListPercentage);
			$this->assertEquals($draftParams->ABWinnerSelectionType, $draft->ABWinnerSelectionType);
			$this->assertEquals($draftParams->MailingLists[0]->ID, $draft->MailingLists[0]->ID);
		} else {
			$this->AssertTrue(false, 'Draft not found');
		}
		
		// updateDraft
		$sender = $moosendApi->campaigns->SenderDetails = 'j_tg86@yahoo.com';
		
		$draft->Name = 'Campaigns Wrapper Integration Tests: Draft Name After Update';
		$draft->Subject ='Campaigns Wrapper Integration Tests: Subject After Update';
		$draft->WebLocation = 'http://www.mycoupon.gr/newsletter/index';
		$draft->ConfirmationTo ='example@example.com';
		$draft->Sender = $sender;
		$draft->ReplyToEmail = $sender;

		$newMailingList = $moosendApi->mailingLists->getDetails('c673e294-a68a-46de-bdbf-e2ead42679c5');
		$draft->MailingList = array($newListSegment);
		
		$segment = null;
		$segments = $moosendApi->segments->getSegments($newMailingList->ID);
		foreach ($segments as $newListSegment) {
			if ($newListSegment->Name() == 'Me') {
				$segment = $newListSegment;
				$draft->Segment = $segment;
			}
		}
		
		date_default_timezone_set('UTC');
		
		$deliveredOn = \DateTime::createFromFormat('d/m/Y', '23/05/2013');
		$draft->DeliveredOn = $deliveredOn;
		
		$scheduledFor = \DateTime::createFromFormat('d/m/Y', '23/05/2017');
		$draft->ScheduledFor = $scheduledFor;
		
		$draft->Timezone = 'timezone';
		$draft->FormatType = 2;
		
		$ABCampaignData = new ABCampaignData();
		
		$ABCampaignData->ABCampaignType = 1; // 1: 'Content': Test two different versions of the campaign content and send the final campaign to the one performing better.
		$ABCampaignData->ABWinnerSelectionType = 1; // 1: 'TotalUniqueClicks': Used to determine the winner of an AB campaign according to which version achieved more unique link clicks
		$ABCampaignData->HoursToTest = 1;
		$ABCampaignData->ListPercentage = 25;
		$ABCampaignData->WebLocationB = 'http://www.mycoupon.gr/newsletter/index';
		
		$draft->ABCampaignData = $ABCampaignData;
		
		// update draft
		$updatedCampaign = new Campaign();
		$updatedCampaign->Name = $draft->Name;
		$updatedCampaign->ID = $draft->ID;
		$updatedCampaign->Subject = $draft->Subject;
		$updatedCampaign->ConfirmationTo = $draft->ConfirmationTo;
		$updatedCampaign->Email = $draft->Email;
		$updatedCampaign->ABCampaignType = $draft->ABCampaignType;
		$updatedCampaign->ABWinnerSelectionType = $draft->ABWinnerSelectionType;
		
		$moosendApi->campaigns->updateDraft($updatedCampaign);
		//  updated draft
		$campaigns = $moosendApi->campaigns->getCampaigns();
		$updatedDraft;
		foreach ($campaigns->Campaigns as $campaign) {
			if ($campaign->ID == $draftID) {
				$updatedDraft = $campaign;
			}
		}
		
		$this->assertTrue($draft->Name == $updatedDraft->Name);
		$this->assertEquals($draft->Subject, $updatedDraft->Subject);
		//$this->assertEquals($draft->WebLocation, $updatedDraft->WebLocation);
		$this->assertEquals($draft->ConfirmationTo, $updatedDraft->ConfirmationTo);
		$this->assertEquals($sender->Email, $updatedDraft->Sender->Email);
		//$this->assertEquals($draft->ReplyToEmail->Email, $updatedDraft->ReplyToEmail->Email);
		$this->assertEquals($mailingListID, $updatedDraft->MailingLists[0]->MailingList->Id);
		//$this->assertEquals($segment->ID, $updatedDraft->Segment->ID);
		$this->assertEquals($ABCampaignData->ABCampaignType, $updatedDraft->ABCampaignType);
		$this->assertEquals($ABCampaignData->ABWinnerSelectionType, $updatedDraft->ABWinnerSelectionType);
		//$this->assertEquals($ABCampaignData->HoursToTest, $updatedDraft->ABCampaignData->HoursToTest);
		//$this->assertEquals($ABCampaignData->ListPercentage, $updatedDraft->ABCampaignData->ListPercentage);
		//$this->assertEquals($ABCampaignData->WebLocationB, $updatedDraft->ABCampaignData->WebLocationB);
		
 		// delete campaign
		$moosendApi->campaigns->delete($draftID);
	}
}
