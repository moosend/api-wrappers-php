<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/CampaignDetails.php';

use moosend\Models\CampaignDetails;

class CampaignDetailsTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_campaignDetails;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getCampaignsRawJsonResponse.html'), true)['Context']['Campaigns'][0];
		$this->_campaignDetails = CampaignDetails::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_campaignDetails = null;
	}
	
	/**
	 * Test CampaignDetails constructor.
	 * @covers moosend\Models\CampaignDetails::withJSON
	 * @group CampaignDetailsTest
	 */
	public function test_Can_Create_CampaignDeatails_Instance() {
		$this->assertInstanceOf('moosend\Models\CampaignDetails', $this->_campaignDetails);
	}
	
	/**
	 * Test custom "constructor" when providing valid JSON data.
	 * @covers moosend\Models\CampaignDetails::withJSON
	 * @group CampaignDetailsTest
	 */
	public function test_Can_Create_CampaignDetails_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
		$this->assertEquals('88364e4e-1eae-48f9-ae1e-c896d025184e', $this->_campaignDetails->getID());
		$this->assertEquals('Some Name', $this->_campaignDetails->getName());
		$this->assertEquals('Some Subject', $this->_campaignDetails->getSubject());
		$this->assertEquals('Some SiteName', $this->_campaignDetails->getSiteName());
		$this->assertEquals('Some ConfirmationTo', $this->_campaignDetails->getConfirmationTo());
		$this->assertEquals("/Date(1400765227871)/", $this->_campaignDetails->getCreatedOn());
		$this->assertEquals(null, $this->_campaignDetails->getABHoursToTest());
		$this->assertEquals(0, $this->_campaignDetails->getABCampaignType());
		$this->assertEquals(0, $this->_campaignDetails->getABWinnerSelectionType());
		$this->assertEquals(0, $this->_campaignDetails->getStatus());
		$this->assertEquals('/Date(1400765227871)/', $this->_campaignDetails->getDeliveredOn());
		$this->assertEquals('/Date(1400765227871)/', $this->_campaignDetails->getScheduledFor());
		$this->assertEquals('Some ScheduledForTimezone', $this->_campaignDetails->getScheduledForTimezone());
		$this->assertEquals('ee070e5f-b473-466d-822c-b50403383590', $this->_campaignDetails->getMailingListID());
		$this->assertEquals('Some MailingListName', $this->_campaignDetails->getMailingListName());
		$this->assertEquals(0, $this->_campaignDetails->getSegmentID());
		$this->assertEquals('Some SegmentName', $this->_campaignDetails->getSegmentName());
		$this->assertEquals(0, $this->_campaignDetails->getMailingListStatus());
		$this->assertEquals(0, $this->_campaignDetails->getTotalSent());
		$this->assertEquals(0, $this->_campaignDetails->getTotalOpens());
		$this->assertEquals(0, $this->_campaignDetails->getUniqueOpens());
		$this->assertEquals(0, $this->_campaignDetails->getTotalBounces());
		$this->assertEquals(0, $this->_campaignDetails->getTotalForwards());
		$this->assertEquals(0, $this->_campaignDetails->getUniqueForwards());
		$this->assertEquals(0, $this->_campaignDetails->getTotalLinkClicks());
		$this->assertEquals(0, $this->_campaignDetails->getUniqueLinkClicks());
		$this->assertEquals(0, $this->_campaignDetails->getRecipientsCount());
		$this->assertEquals(false, $this->_campaignDetails->getIsTransactional());
		$this->assertEquals(0, $this->_campaignDetails->getTotalComplaints());
		$this->assertEquals(0, $this->_campaignDetails->getTotalUnsubscribes());
	}
}