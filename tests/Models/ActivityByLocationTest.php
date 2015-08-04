<?php
namespace tests\Models;

use moosend\Models\ActivityByLocation;
require_once __DIR__.'/../../src/moosend/Models/ActivityByLocation.php';

class ActivityByLocationTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_activityByLocation;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/ActivityByLocationJson.html'), true)['Context']['Analytics'][0];
		$this->_activityByLocation = ActivityByLocation::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_activityByLocation = null;
	}
	
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\ActivityByLocation::withJSON
		 * @group ActivityByLocationTest
		 */
		public function test_Can_Create_ActivityByLocation_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
			$this->assertEquals('Some Context', $this->_activityByLocation->getContext());			
			$this->assertEquals('Some ContextName', $this->_activityByLocation->getContextName());
			$this->assertEquals(0, $this->_activityByLocation->getTotalCount());
			$this->assertEquals(0, $this->_activityByLocation->getUniqueCount());
			$this->assertEquals('Some ContextDescription', $this->_activityByLocation->getContextDescription());
				
			$this->assertInstanceOf('moosend\Models\ActivityByLocation', $this->_activityByLocation);
		}
}