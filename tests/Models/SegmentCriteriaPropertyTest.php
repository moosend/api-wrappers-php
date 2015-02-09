<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/SegmentCriteriaProperty.php';

use moosend\Models\SegmentCriteriaProperty;

class SegmentCriteriaPropertyTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_segmentCriteriaProperty;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getCampaignRawJsonResponse.html'), true)['Context']['Segment']['Criteria'][0]['Properties'][0];
		$this->_segmentCriteriaProperty = SegmentCriteriaProperty::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_segmentCriteriaProperty = null;
	}
	
	/**
	 * Test SegmentCriteriaProperty constructor.
	 * @covers moosend\Models\SegmentCriteriaProperty::withJSON
	 * @group SegmentCriteriaPropertyTest
	 */
	public function test_Can_Create_SegmentCriteriaProperty_Instance() {
		$this->assertInstanceOf('moosend\Models\SegmentCriteriaProperty', $this->_segmentCriteriaProperty);
		}
		
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\SegmentCriteriaProperty::withJSON
		 * @group SegmentCriteriaPropertyTest
		 */
	public function test_Can_Create_SegmentCriteriaProperty_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
		$this->assertEquals(0, $this->_segmentCriteriaProperty->getID());
		$this->assertEquals('Some Name', $this->_segmentCriteriaProperty->getName());
		$this->assertEquals(0, $this->_segmentCriteriaProperty->getComparer());
		$this->assertEquals('Some Value', $this->_segmentCriteriaProperty->getValue());
	}
}