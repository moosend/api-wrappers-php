<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/CustomFieldDefinition.php';

use moosend\Models\CustomFieldDefinition;
use moosend\Models\Sender;

class CustomFieldDefinitionTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_customFieldDefinition;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getCampaignRawJsonResponse.html'), true)['Context']['MailingList']['CustomFieldsDefinition'][0];
		$this->_customFieldDefinition = CustomFieldDefinition::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_customFieldDefinition = null;
	}
	
	/**
	 * Test CustomFieldDefinition constructor.
	 * @covers moosend\Models\CustomFieldDefinition::withJSON
	 * @group CustomFieldDefinitionTest
	 */
	public function test_Can_Create_CustomFieldDefinition_Instance() {
		$this->assertInstanceOf('moosend\Models\CustomFieldDefinition', $this->_customFieldDefinition);
		}
		
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\CustomFieldDefinition::withJSON
		 * @group CustomFieldDefinitionTest
		 */
	public function test_Can_Create_CustomFieldDefinition_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
		$this->assertEquals('dd4fb545-ba00-4afe-bc39-5ed2462fd1d3', $this->_customFieldDefinition->ID);
		$this->assertEquals('City', $this->_customFieldDefinition->Name);
		$this->assertEquals(null, $this->_customFieldDefinition->Context);
		$this->assertEquals(false, $this->_customFieldDefinition->IsRequired);
		$this->assertEquals(0, $this->_customFieldDefinition->Type);
	}
}