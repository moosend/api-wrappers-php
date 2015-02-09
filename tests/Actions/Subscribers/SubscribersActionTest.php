<?php
namespace tests\Actions\Subscribers;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use moosend\HttpClient;
use moosend\Actions\Subscribers\SubscribersAction;
use tests\Actions\ActionTestBase;
use moosend\Actions\Subscribers\SubscribersResponse;

class SubscribersActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSubscribersJsonResponse.html'), true)['Context'];	
		$this->_httpClient = new HttpClient();
		$this->_action = new SubscribersAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if SubscribersAction constructor calls its parent constructor with the right parameters and creates a SubscribersAction object.
	 * @group SubscribersActionTest
	 * @covers moosend\Actions\Subscribers\SubscribersAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_SubscribersAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/subscribers.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\Subscribers\SubscribersAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if SubscribersAction returns a SubscribersResponse object when onParse is called.
	 * @group SubscribersActionTest
	 * @covers moosend\Actions\Subscribers\SubscribersAction::onParse
	 */
	public function test_Should_Return_SubscribersResponse_Object_When_SubscribersAction_Calls_onParse() {
		$returnedObject = $this->_action->onParse($this->_jsonData);
		
		$expectedSubscribersResponseObject = new SubscribersResponse($this->_jsonData);
		
		$this->assertEquals($expectedSubscribersResponseObject, $returnedObject);
	}
}