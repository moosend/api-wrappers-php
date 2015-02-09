<?php
namespace tests\Actions\CreateCustomField;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use moosend\Actions\CreateCustomField\CreateCustomFieldAction;
use moosend\HttpClient;
use tests\Actions\ActionTestBase;

class CreateCustomFieldActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new CreateCustomFieldAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if CreateCustomFieldAction constructor calls its parent constructor with the right parameters and creates a CreateCustomFieldAction object.
	 * @group CreateCustomFieldActionTest
	 * @covers moosend\Actions\CreateCustomField\CreateCustomFieldAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_CreateCustomFieldAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/customfields/create.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\CreateCustomField\CreateCustomFieldAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if CreateCustomFieldAction returns a Custom Field' s ID when onParse is called.
	 * @group CreateCustomFieldActionTest
	 * @covers moosend\Actions\CreateCustomField\CreateCustomFieldAction::onParse
	 */
	public function test_Should_Return_Campaign_Object_When_CreateCustomFieldAction_Calls_onParse() {
		$returnedJson = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": "00000000-0000-0000-0000-000000000000" }', true);
		$returnedObject = $this->_action->onParse($returnedJson['Context']);
		
		$this->assertEquals('00000000-0000-0000-0000-000000000000', $returnedObject);
	}
}