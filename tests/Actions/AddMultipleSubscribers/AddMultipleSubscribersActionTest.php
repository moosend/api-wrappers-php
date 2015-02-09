<?php
namespace tests\Actions\AddMultipleSubscribers;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\AddMulipleSubscribers\AddMulipleSubscribersAction;
use moosend\Actions\AddMultipleSubscribers\AddMultipleSubscribersAction;
use moosend\Actions\AddMultipleSubscribers\AddMultipleSubscribersResponse;

class AddMultipleSubscribersTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new AddMultipleSubscribersAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if AddMultipleSubscribersAction constructor calls its parent constructor with the right parameters and creates an AddMultipleSubscribersAction object.
	 * @group AddMultipleSubscribersTest
	 * @covers moosend\Actions\AddMultipleSubscribers\AddMultipleSubscribersAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_AddMultipleSubscribersAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/subscribers/{$this->mailingListID}/subscribe_many.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\AddMultipleSubscribers\AddMultipleSubscribersAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if AddMultipleSubscribersAction returns a AddMultipleSubscribersResponse object when onParse is called.
	 * @group AddMultipleSubscribersTest
	 * @covers moosend\Actions\AddMultipleSubscribers\AddMultipleSubscribersAction::onParse
	 */
	public function test_Should_Return_AddMultipleSubscribersResponse_Object_When_AddMultipleSubscribersAction_Calls_onParse() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/addMultipleSubscribersJsonResponse.html'), true)['Context'];
		
		$returnedObject = $this->_action->onParse($jsonData);
		
		$expectedResponseObject = new AddMultipleSubscribersResponse($jsonData);
		
		$this->assertEquals($expectedResponseObject, $returnedObject);
	}
}