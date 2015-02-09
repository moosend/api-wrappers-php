<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/Campaign.php';

use moosend\Models\Campaign;
use moosend\Models\Sender;
use moosend\Models\ABCampaignData;
use moosend\Models\MailingList;
use moosend\Models\Segment;

class CampaignTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_campaign;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getCampaignRawJsonResponse.html'), true)['Context'];
		$this->_campaign = Campaign::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_campaign = null;
	}
	
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\Campaign::withJSON
		 * @group CampaignTest
		 */
		public function test_Can_Create_Campaign_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
			$this->assertEquals('4824c0fb-c41c-4b09-a35d-03d4e6177630', $this->_campaign->getID());
			$this->assertEquals('Your Campaign Name', $this->_campaign->getName());
			$this->assertEquals('Your Campaign Subject', $this->_campaign->getSubject());
			$this->assertEquals('http://www.your-domain.com/newsletter', $this->_campaign->getWebLocation());
			$this->assertEquals('SOME HTML BODY', $this->_campaign->getHTMLContent());
			$this->assertEquals('Some plain text body', $this->_campaign->getPlainContent());
			$this->assertEquals(Sender::withJSON($this->_jsonData['Sender']), $this->_campaign->getSender());
			$this->assertEquals(null, $this->_campaign->getDeliveredOn());
			$this->assertEquals(Sender::withJSON($this->_jsonData['ReplyToEmail']), $this->_campaign->getReplyToEmail());
			$this->assertEquals('/Date(1368710321000+0300)/', $this->_campaign->getCreatedOn());
			$this->assertEquals('/Date(1368839678000+0300)/', $this->_campaign->getUpdatedOn());
			$this->assertEquals('/Date(1369017000000+0300)/', $this->_campaign->getScheduledFor());
			$this->assertEquals('GTB Standard Time', $this->_campaign->getTimezone());
			$this->assertEquals(0, $this->_campaign->getFormatType());
			$this->assertEquals(ABCampaignData::withJSON($this->_jsonData['ABCampaignData']), $this->_campaign->getABCampaignData());
			$this->assertEquals(MailingList::withJSON($this->_jsonData['MailingList']), $this->_campaign->getMailingList());
			$this->assertEquals('someone@example.com', $this->_campaign->getConfirmationTo());
			$this->assertEquals(0, $this->_campaign->getStatus());
			$this->assertEquals(Segment::withJSON($this->_jsonData['Segment']), $this->_campaign->getSegment());
			$this->assertEquals(false, $this->_campaign->getIsTransactional());		

			$this->assertInstanceOf('moosend\Models\Campaign', $this->_campaign);
		}
}