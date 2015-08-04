<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/CustomField.php';

use moosend\Models\CustomField;
use moosend\Models\Sender;

class CustomFieldTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_customField;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getSubscribersJsonResponse.html'), true)['Context']['Subscribers'][0]['CustomFields'][0];
		$this->_customField = CustomField::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_customField = null;
	}
	
	/**
	 * Test CustomField constructor.
	 * @covers moosend\Models\CustomField::withJSON
	 * @group CustomFieldTest
	 */
	public function test_Can_Create_CustomField_Instance() {
		$this->assertInstanceOf('moosend\Models\CustomField', $this->_customField);
		}
		
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\CustomField::withJSON
		 * @group CustomFieldTest
		 */
	public function test_Can_Create_CustomField_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
		$this->assertEquals($this->_jsonData['Name'], $this->_customField->getName());
		$this->assertEquals($this->_jsonData['Value'], $this->_customField->getValue());
	}
}