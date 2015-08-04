<?php
namespace tests\Actions\UpdateCustomField;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\UpdateCustomField\UpdateCustomFieldAction;
use moosend\Models\CustomFieldDefinition;

class UpdateCustomFieldActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_customFieldDefinition;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_customFieldDefinition = new CustomFieldDefinition();
		$this->_customFieldDefinition->ID = 'customFieldDefinitionID';
		$this->_action = new UpdateCustomFieldAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->_customFieldDefinition->ID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if UpdateCustomFieldAction constructor calls its parent constructor with the right parameters and creates a UpdateCustomFieldAction object.
	 * @group UpdateCustomFieldActionTest
	 * @covers moosend\Actions\UpdateCustomField\UpdateCustomFieldAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_UpdateCustomFieldAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/customfields/{$this->_customFieldDefinition->ID}/update.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\UpdateCustomField\UpdateCustomFieldAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if UpdateCustomFieldAction returns null when onParse is called.
	 * @group UpdateCustomFieldActionTest
	 * @covers moosend\Actions\UpdateCustomField\UpdateCustomFieldAction::onParse
	 */
	public function test_Should_Return_null_When_UpdateCustomFieldAction_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}