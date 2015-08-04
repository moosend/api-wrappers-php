<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/SegmentCriteria.php';

use moosend\Models\SegmentCriteria;
use moosend\Models\SegmentCriteriaProperty;

class SegmentCriteriaTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_segmentCriteria;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getCampaignRawJsonResponse.html'), true)['Context']['Segment']['Criteria'][0];
		$this->_segmentCriteria = SegmentCriteria::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_segmentCriteria = null;
	}
	
	/**
	 * Test SegmentCriteria constructor.
	 * @covers moosend\Models\SegmentCriteria::withJSON
	 * @group SegmentCriteriaTest	
	 */
	public function test_Can_Create_SegmentCriteria_Instance() {
		$this->assertInstanceOf('moosend\Models\SegmentCriteria', $this->_segmentCriteria);
		}
		
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\SegmentCriteria::withJSON
		 * @group SegmentCriteriaTest
		 */
	public function test_Can_Create_SegmentCriteria_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
		$this->assertEquals(201, $this->_segmentCriteria->getID());
		$this->assertEquals(163, $this->_segmentCriteria->getSegmentID());
		$this->assertEquals(99, $this->_segmentCriteria->getField());
		$this->assertEquals('dd4fb545-ba00-4afe-bc39-5ed2462fd1d3', $this->_segmentCriteria->getCustomFieldID());
		$this->assertEquals(0, $this->_segmentCriteria->getComparer());
		$this->assertEquals('London', $this->_segmentCriteria->getValue());
		$this->assertEquals(null, $this->_segmentCriteria->getDateFrom());
		$this->assertEquals(null, $this->_segmentCriteria->getDateTo());		
		$this->assertEquals(SegmentCriteriaProperty::withJSON($this->_jsonData['Properties'][0]), $this->_segmentCriteria->getProperties()[0]);
		}
}