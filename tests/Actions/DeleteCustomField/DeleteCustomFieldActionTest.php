<?php
namespace tests\Actions\DeleteCustomField;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\DeleteCustomField\DeleteCustomFieldAction;
use moosend\Models\CustomFieldDefinition;

class DeleteCustomFieldActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_customFieldDefinitionID;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_customFieldDefinitionID = 'ID';
		$this->_action = new DeleteCustomFieldAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->_customFieldDefinitionID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
		$this->_customFieldDefinitionID = null;
	}	

	/**
	 * Test if DeleteCustomFieldAction constructor calls its parent constructor with the right parameters and creates a DeleteCustomFieldAction object.
	 * @group DeleteCustomFieldActionTest
	 * @covers moosend\Actions\DeleteCustomField\DeleteCustomFieldAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_DeleteCustomFieldAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/customfields/{$this->_customFieldDefinitionID}/delete.json";
		$expectedMethod = 'DELETE';
		
		$this->assertInstanceOf('moosend\Actions\DeleteCustomField\DeleteCustomFieldAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if DeleteCustomFieldAction returns NULL object when onParse is called.
	 * @group DeleteActionTest
	 * @covers moosend\Actions\DeleteCustomField\DeleteCustomFieldAction::onParse
	 */
	public function test_Should_Return_null_When_DeleteCustomFieldActionTest_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}