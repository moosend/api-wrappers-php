<?php
namespace tests\Actions\RemoveMultipleSubscribers;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersAction;
use moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersResponse;

class RemoveMultipleSubscribersActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new RemoveMultipleSubscribersAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if RemoveMultipleSubscribersAction constructor calls its parent constructor with the right parameters and creates a RemoveSubscriberAction object.
	 * @group RemoveMultipleSubscribersActionTest
	 * @covers moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_RemoveMultipleSubscribersAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/subscribers/{$this->mailingListID}/remove_many.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if RemoveMultipleSubscribersAction returns RemoveMultipleSubscribersResponse object when onParse is called.
	 * @group RemoveMultipleSubscribersActionTest
	 * @covers moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersAction::onParse
	 */
	public function test_Should_Return_RemoveMultipleSubscribersResponse_Object_When_RemoveMultipleSubscribersActionTest_Calls_onParse_With_Success() {
		$jsonData =  json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": { "EmailsIgnored": 0,
        														"EmailsProcessed": 0
															} }', true);
		$returnedObject = $this->_action->onParse($jsonData['Context']);
		$expectedObject = RemoveMultipleSubscribersResponse::withJSON($jsonData['Context']);
		
		$this->assertEquals($expectedObject, $returnedObject);
	}
}