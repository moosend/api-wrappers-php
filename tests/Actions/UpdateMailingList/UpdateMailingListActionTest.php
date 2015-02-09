<?php
namespace tests\Actions\UpdateMailingList;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\UpdateMailingList\UpdateMailingListAction;

class UpdateMailingListActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new UpdateMailingListAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if UpdateMailingListAction constructor calls its parent constructor with the right parameters and creates a UpdateMailingListAction object.
	 * @group UpdateMailingListActionTest
	 * @covers moosend\Actions\UpdateMailingList\UpdateMailingListAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_UpdateMailingListAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/update.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\UpdateMailingList\UpdateMailingListAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if UpdateMailingListAction returns null when onParse is called.
	 * @group UpdateMailingListActionTest
	 * @covers moosend\Actions\UpdateMailingList\UpdateMailingListAction::onParse
	 */
	public function test_Should_Return_null_When_UpdateMailingListAction_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}