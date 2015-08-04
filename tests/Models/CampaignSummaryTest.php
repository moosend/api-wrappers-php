<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/CampaignSummary.php';

use moosend\Models\CampaignSummary;

class CampaignSummaryTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_campaignSummary;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/CampaignSummaryJson.html'), true)['Context'];
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
			$this->assertEquals(123456, $this->_campaignSummary->getID());
			$this->assertEquals(0, $this->_campaignSummary->getABVersion());
			$this->assertEquals('01234567-89ab-cdef-0123-456789abcdef', $this->_campaignSummary->getCampaignID());
			$this->assertEquals('Some CampaignName', $this->_campaignSummary->getCampaignName());
			$this->assertEquals('ef234567-89ab-cdef-0123-456789abcd01', $this->_campaignSummary->getMailingListID());
			$this->assertEquals('Some MailingListName', $this->_campaignSummary->getMailingListName());
			$this->assertEquals('/Date(1400765198602)/', $this->_campaignSummary->getCampaignDeliveredOn());
			$this->assertEquals('/Date(1400765198602)/', $this->_campaignSummary->getTo());
			$this->assertEquals('/Date(1400765198602)/', $this->_campaignSummary->getFrom());
			$this->assertEquals(0, $this->_campaignSummary->getTotalOpens());
			$this->assertEquals(0, $this->_campaignSummary->getUniqueOpens());
			$this->assertEquals(0, $this->_campaignSummary->getUniqueOpens());
			$this->assertEquals(0, $this->_campaignSummary->getTotalForwards());
			$this->assertEquals(0, $this->_campaignSummary->getUniqueForwards());
			$this->assertEquals(0, $this->_campaignSummary->getTotalUnsubscribes());
			$this->assertEquals(0, $this->_campaignSummary->getTotalLinkClicks());
			$this->assertEquals(0, $this->_campaignSummary->getUniqueLinkClicks());
			$this->assertEquals(0, $this->_campaignSummary->getSent());
			$this->assertEquals(0, $this->_campaignSummary->getCampaignIsArchived());
			$this->assertEquals(0, $this->_campaignSummary->getTotalComplaints());
				
			$this->assertInstanceOf('moosend\Models\CampaignSummary', $this->_campaignSummary);
		}
}