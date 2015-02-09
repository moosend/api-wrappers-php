<?php
namespace tests\Actions\CreateMailingList;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\CreateMailingList\CreateMailingListAction;

class CreateMailingListActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new CreateMailingListAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if CreateMailingListAction constructor calls its parent constructor with the right parameters and creates a CreateMailingListAction object.
	 * @group CreateMailingListActionTest
	 * @covers moosend\Actions\CreateMailingList\CreateMailingListAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_CreateMailingListAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/create.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\CreateMailingList\CreateMailingListAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if CreateMailingListAction returns mailing list's ID when onParse is called.
	 * @group CreateMailingListActionTest
	 * @covers moosend\Actions\CreateMailingList\CreateMailingListAction::onParse
	 */
	public function test_Should_Return_MailingListID_When_CreateMailingListAction_Calls_onParse_With_Success() {
		$returnedJson = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": "00000000-0000-0000-0000-000000000000" }', true);
		$returnedObject = $this->_action->onParse($returnedJson['Context']);
		
		$this->assertEquals('00000000-0000-0000-0000-000000000000', $returnedObject);
	}
}