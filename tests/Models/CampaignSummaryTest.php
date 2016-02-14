<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/CampaignSummary.php';

use moosend\Models\CampaignSummary;

class CampaignSummaryTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_campaignSummary;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/CampaignSummaryJson.html'), true);
		$this->_campaignSummary = CampaignSummary::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_campaignSummary = null;
	}
	
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\CampaignSummary::withJSON
		 * @group CampaignSummaryTest
		 */
		public function test_Can_Create_CampaignSummary_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
			$this->assertEquals($this->_jsonData['ID'], $this->_campaignSummary->ID);
			$this->assertEquals($this->_jsonData['Name'], $this->_campaignSummary->Name);
			$this->assertEquals($this->_jsonData['Subject'], $this->_campaignSummary->Subject);
			$this->assertEquals($this->_jsonData['SiteName'], $this->_campaignSummary->SiteName);
			$this->assertEquals($this->_jsonData['ConfirmationTo'], $this->_campaignSummary->ConfirmationTo);
			$this->assertEquals($this->_jsonData['CreatedOn'], $this->_campaignSummary->CreatedOn);
			$this->assertEquals($this->_jsonData['ABHoursToTest'], $this->_campaignSummary->ABHoursToTest);
			$this->assertEquals($this->_jsonData['ABCampaignType'], $this->_campaignSummary->ABCampaignType);
			$this->assertEquals($this->_jsonData['ABWinner'], $this->_campaignSummary->ABWinner);
			$this->assertEquals($this->_jsonData['ABWinnerSelectionType'], $this->_campaignSummary->ABWinnerSelectionType);
			$this->assertEquals($this->_jsonData['Status'], $this->_campaignSummary->Status);
			$this->assertEquals($this->_jsonData['DeliveredOn'], $this->_campaignSummary->DeliveredOn);
			$this->assertEquals($this->_jsonData['ScheduledFor'], $this->_campaignSummary->ScheduledFor);
			$this->assertEquals($this->_jsonData['ScheduledForTimezone'], $this->_campaignSummary->ScheduledForTimezone);
			
			$lists = $this->_jsonData['MailingLists'];
			$this->assertEquals(\CampaignSummaryMailingList::withJSON($lists[0])->Mailinglist->ID, $this->_campaignSummary->MailingLists[0]->ID);
			
			$this->assertEquals($this->_jsonData['TotalSent'], $this->_campaignSummary->TotalSent);
			
			$this->assertEquals($this->_jsonData['TotalSent'], $this->_campaignSummary->TotalSent);
			$this->assertEquals($this->_jsonData['TotalOpens'], $this->_campaignSummary->TotalOpens);
			$this->assertEquals($this->_jsonData['UniqueOpens'], $this->_campaignSummary->UniqueOpens);
			$this->assertEquals($this->_jsonData['TotalBounces'], $this->_campaignSummary->TotalBounces);
			$this->assertEquals($this->_jsonData['TotalForwards'], $this->_campaignSummary->TotalForwards);
			$this->assertEquals($this->_jsonData['UniqueForwards'], $this->_campaignSummary->UniqueForwards);
			$this->assertEquals($this->_jsonData['TotalLinkClicks'], $this->_campaignSummary->TotalLinkClicks);
			$this->assertEquals($this->_jsonData['UniqueLinkClicks'], $this->_campaignSummary->UniqueLinkClicks);
			$this->assertEquals($this->_jsonData['RecipientsCount'], $this->_campaignSummary->RecipientsCount);
			$this->assertEquals($this->_jsonData['IsTransactional'], $this->_campaignSummary->IsTransactional);
			$this->assertEquals($this->_jsonData['TotalComplaints'], $this->_campaignSummary->TotalComplaints);
			$this->assertEquals($this->_jsonData['TotalUnsubscribes'], $this->_campaignSummary->TotalUnsubscribes);
			
				
			$this->assertInstanceOf('moosend\Models\CampaignSummary', $this->_campaignSummary);
		}
}