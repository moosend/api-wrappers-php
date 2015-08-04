<?php
namespace tests\Actions\AllSenders;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\AllSenders\AllSendersAction;
use moosend\Actions\AllSenders\AllSendersResponse;

class AllSendersActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new AllSendersAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if AllSendersAction constructor calls its parent constructor with the right parameters and creates a AllSendersAction object.
	 * @group AllSendersActionTest
	 * @covers moosend\Actions\AllSenders\AllSendersAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_AllSendersAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/senders/find_all.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\AllSenders\AllSendersAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if AllSendersAction returns AllSendersResponse object when onParse is called.
	 * @group AllSendersActionTest
	 * @covers moosend\Actions\AllSenders\AllSendersAction::onParse
	 */
	public function test_Should_Return_Sender_Object_When_AllSendersAction_Calls_onParse_With_Success() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getAllSendersJsonResponse.html'), true)['Context'];
		$returnedObject = $this->_action->onParse($jsonData);
		$expectedObject = new AllSendersResponse($jsonData);
		
		$this->assertEquals($expectedObject, $returnedObject);
	}
}