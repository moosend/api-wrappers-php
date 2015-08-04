<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/Segment.php';

use moosend\Models\Segment;
use moosend\Models\SegmentCriteria;

class SegmentTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_segment;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getCampaignRawJsonResponse.html'), true)['Context']['Segment'];		
		$this->_segment = Segment::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_segment = null;
	}
	
	/**
	 * Test Segment constructor.
	 * @covers moosend\Models\Segment::withJSON
	 * @group SegmentTest	
	 */
	public function test_Can_Create_Segment_Instance() {
		$this->assertInstanceOf('moosend\Models\Segment', $this->_segment);
		}
		
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\Segment::withJSON
		 * @group SegmentTest
		 */
	public function test_Can_Create_Segment_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
		$this->assertEquals(163, $this->_segment->getID());
		$this->assertEquals('People in London above 40', $this->_segment->getName());
		$this->assertEquals(0, $this->_segment->getMatchType());
		$this->assertEquals(SegmentCriteria::withJSON($this->_jsonData['Criteria'][0]), $this->_segment->getCriteria()[0]);
		$this->assertEquals('127.0.0.1', $this->_segment->getCreatedBy());
		$this->assertEquals('/Date(1368841040000+0300)/', $this->_segment->getCreatedOn());
		$this->assertEquals('127.0.0.1', $this->_segment->getUpdatedBy());
		$this->assertEquals('/Date(1368841040000+0300)/', $this->_segment->getUpdatedOn());
	}
}