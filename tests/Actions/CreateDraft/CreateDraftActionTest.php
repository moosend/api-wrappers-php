<?php
namespace tests\Actions\CreateDraft;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\CreateDraft\CreateDraftAction;
use moosend\Actions\CreateDraft\CreateDraftResponse;

class CreateDraftActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new CreateDraftAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if CreateDraftAction constructor calls its parent constructor with the right parameters and creates a CreateDraftAction object.
	 * @group CreateDraftActionTest
	 * @covers moosend\Actions\CreateDraft\CreateDraftAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_CreateDraftAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/create.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\CreateDraft\CreateDraftAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if CreateDraftAction returns Campaign's ID when onParse is called.
	 * @group CreateDraftActionTest
	 * @covers moosend\Actions\CreateDraft\CreateDraftAction::onParse
	 */
	public function test_Should_Return_CampaignID_When_CreateDraftAction_Calls_onParse_With_Success() {
		$returnedJson = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": "00000000-0000-0000-0000-000000000000" }', true);
		$returnedObject = $this->_action->onParse($returnedJson['Context']);
		
		$this->assertEquals('00000000-0000-0000-0000-000000000000', $returnedObject);
	}
}