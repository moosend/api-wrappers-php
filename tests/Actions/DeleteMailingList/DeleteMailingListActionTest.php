<?php
namespace tests\Actions\DeleteMailingList;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\DeleteMailingList\DeleteMailingListAction;


class DeleteMailingListTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new DeleteMailingListAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if DeleteMailingListAction constructor calls its parent constructor with the right parameters and creates a DeleteMailingListAction object.
	 * @group DeleteMailingListActionTest
	 * @covers moosend\Actions\DeleteMailingList\DeleteMailingListAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_DeleteMailingListAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/delete.json";
		$expectedMethod = 'DELETE';
		
		$this->assertInstanceOf('moosend\Actions\DeleteMailingList\DeleteMailingListAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if DeleteMailingListAction returns NULL object when onParse is called.
	 * @group DeleteMailingListActionTest
	 * @covers moosend\Actions\DeleteMailingList\DeleteMailingListAction::onParse
	 */
	public function test_Should_Return_null_When_DeleteActionTest_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}