<?php
namespace tests\Actions\SenderDetails;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Models\Sender;
use moosend\Actions\SenderDetails\SenderDetailsAction;

class SenderDetailsActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new SenderDetailsAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if SenderDetailsAction constructor calls its parent constructor with the right parameters and creates a SenderDetailsAction object.
	 * @group SenderDetailsActionTest
	 * @covers moosend\Actions\SenderDetails\SenderDetailsAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_SenderDetailsAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/senders/find_one.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\SenderDetails\SenderDetailsAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if SenderDetailsAction returns Sender object when onParse is called.
	 * @group SenderDetailsActionTest
	 * @covers moosend\Actions\SenderDetails\SenderDetailsAction::onParse
	 */
	public function test_Should_Return_Sender_Object_When_SenderDetailsAction_Calls_onParse_With_Success() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSenderDetailsJsonResponse.html'), true)['Context'];
		$returnedObject = $this->_action->onParse($jsonData);
		$expectedObject = Sender::withJSON($jsonData);
		
		$this->assertEquals($expectedObject, $returnedObject);
	}
}