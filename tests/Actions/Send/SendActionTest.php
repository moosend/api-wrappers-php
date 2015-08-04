<?php
namespace tests\Actions\Send;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\Send\SendAction;

class SendActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new SendAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->campaignID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if SendAction constructor calls its parent constructor with the right parameters and creates a SendAction object.
	 * @group SendActionTest
	 * @covers moosend\Actions\Send\SendAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_SendAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->campaignID}/send.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\Send\SendAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if SendAction returns NULL when onParse is called.
	 * @group SendActionTest
	 * @covers moosend\Actions\Send\SendAction::onParse
	 */
	public function test_Should_Return_NULL_When_SendAction_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}