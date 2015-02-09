<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/ABCampaignData.php';

use moosend\Models\ABCampaignData;
use moosend\Models\Sender;

class ABCampaignDataTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_ABCampaignData;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getCampaignRawJsonResponse.html'), true)['Context']['ABCampaignData'];
		$this->_ABCampaignData = ABCampaignData::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_ABCampaignData = null;
	}
	
	/**
	 * Test ABCampaignData constructor.
	 * @covers moosend\Models\ABCampaignData::withJSON
	 * @group ABCampaignDataTest
	 */
	public function test_Can_Create_ABCampaignData_Instance() {
		$this->assertInstanceOf('moosend\Models\ABCampaignData', $this->_ABCampaignData);
		}
		
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\ABCampaignData::withJSON
		 * @group ABCampaignDataTest
		 */
	public function test_Can_Create_ABCampaignData_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
		$this->assertEquals(128, $this->_ABCampaignData->getID());
		$this->assertEquals('Alternate Subject', $this->_ABCampaignData->getSubjectB());
		$this->assertEquals(null, $this->_ABCampaignData->getPlainContentB());
		$this->assertEquals(null, $this->_ABCampaignData->getHTMLContentB());
		$this->assertEquals(null, $this->_ABCampaignData->getWebLocationB());
		$this->assertEquals(Sender::withJSON($this->_jsonData['SenderB']), $this->_ABCampaignData->getSenderB());
		$this->assertEquals(1, $this->_ABCampaignData->getHoursToTest());
		$this->assertEquals(25, $this->_ABCampaignData->getListPercentage());
		$this->assertEquals(2, $this->_ABCampaignData->getABCampaignType());
		$this->assertEquals(0, $this->_ABCampaignData->getABWinnerSelectionType());
		$this->assertEquals(null, $this->_ABCampaignData->getDeliveredOnA());
		$this->assertEquals(null, $this->_ABCampaignData->getDeliveredOnB());
	}
}