<?php
namespace tests\Actions\UpdateDraft;

use moosend\Actions\UpdateDraft\UpdateDraftRequest;
use moosend\Models\Campaign;
use moosend\StubCampaign;
use moosend\Models\Sender;
use moosend\Models\MailingList;
use moosend\Models\Segment;
use moosend\Models\ABCampaignData;

class UpdateDraftRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test UpdateDraftRequest constructor when all properties are set.
	 * @group UpdateDraftRequestTest
	 * @covers moosend\Actions\UpdateDraft\UpdateDraftRequest::__construct
	 */
	public function test_Can_Create_UpdateDraftRequest_Instance() {
		$campaign = Campaign::withJSON(json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getCampaignRawJsonResponse.html'), true)['Context']);			
		
		$updateDraftRequest = new UpdateDraftRequest($campaign);
		
		$this->assertInstanceOf('moosend\Actions\UpdateDraft\UpdateDraftRequest', $updateDraftRequest);
		
		$this->assertEquals($campaign->Name, $updateDraftRequest->Name);
		$this->assertEquals($campaign->Subject, $updateDraftRequest->Subject);
		$this->assertEquals($campaign->WebLocation, $updateDraftRequest->WebLocation);
		$this->assertEquals($campaign->ConfirmationTo, $updateDraftRequest->ConfirmationToEmail);
		
		$this->assertEquals($campaign->Sender->Email, $updateDraftRequest->SenderEmail);
		$this->assertEquals($campaign->ReplyToEmail->Email, $updateDraftRequest->ReplyToEmail);
		$this->assertEquals($campaign->MailingList->ID, $updateDraftRequest->MailingListID);
		
		$this->assertEquals($campaign->ABCampaignData->ABCampaignType, $updateDraftRequest->ABCampaignType);
		$this->assertEquals($campaign->ABCampaignData->ABWinnerSelectionType, $updateDraftRequest->ABWinnerSelectionType);
		$this->assertEquals($campaign->ABCampaignData->HoursToTest, $updateDraftRequest->HoursToTest);
		$this->assertEquals($campaign->ABCampaignData->ListPercentage, $updateDraftRequest->ListPercentage);
		$this->assertEquals($campaign->ABCampaignData->SubjectB, $updateDraftRequest->SubjectB);
		$this->assertEquals($campaign->ABCampaignData->WebLocationB, $updateDraftRequest->WebLocationB);
		
		$this->assertEquals($campaign->ABCampaignData->SenderB->Email, $updateDraftRequest->SenderEmailB);
		
	}
	
	/**
	 * Test UpdateDraftRequest constructor when Sender, ReplyToEmail, MailingList, Segment, ABCampaignData are null.
	 * @group UpdateDraftRequestTest
	 * @covers moosend\Actions\UpdateDraft\UpdateDraftRequest::__construct
	 */
	public function test_Can_Create_UpdateDraftRequest_Instance_When_Properties_Are_Null() {
		$campaign = new Campaign();
		$ABCampaignData = new ABCampaignData;
		$campaign->ABCampaignData = $ABCampaignData;
		$updateDraftRequest = new UpdateDraftRequest($campaign);
	
		$this->assertInstanceOf('moosend\Actions\UpdateDraft\UpdateDraftRequest', $updateDraftRequest);
	
		$this->assertEquals($campaign->Name, $updateDraftRequest->Name);
		$this->assertEquals($campaign->Subject, $updateDraftRequest->Subject);
		$this->assertEquals($campaign->WebLocation, $updateDraftRequest->WebLocation);
		$this->assertEquals($campaign->ConfirmationTo, $updateDraftRequest->ConfirmationToEmail);
	
		$this->assertEquals(null, $updateDraftRequest->SenderEmail);
		$this->assertEquals(null, $updateDraftRequest->ReplyToEmail);
		$this->assertEquals(null, $updateDraftRequest->MailingListID);
		$this->assertEquals(null, $updateDraftRequest->SegmentID);
	
		$this->assertEquals(null, $updateDraftRequest->ABCampaignType);
		$this->assertEquals(null, $updateDraftRequest->ABWinnerSelectionType);
		$this->assertEquals(null, $updateDraftRequest->HoursToTest);
		$this->assertEquals(null, $updateDraftRequest->ListPercentage);
		$this->assertEquals(null, $updateDraftRequest->SubjectB);
		$this->assertEquals(null, $updateDraftRequest->WebLocationB);
	
		$this->assertEquals(null, $updateDraftRequest->SenderEmailB);
	}
}