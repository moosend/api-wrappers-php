<?php
namespace tests\Actions\RemoveSubscriber;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\RemoveSubscriber\RemoveSubscriberAction;

class RemoveSubscriberActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new RemoveSubscriberAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if RemoveSubscriberAction constructor calls its parent constructor with the right parameters and creates a RemoveSubscriberAction object.
	 * @group RemoveSubscriberActionTest
	 * @covers moosend\Actions\RemoveSubscriber\RemoveSubscriberAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_RemoveSubscriberAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/subscribers/{$this->mailingListID}/remove.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\RemoveSubscriber\RemoveSubscriberAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if RemoveSubscriberAction returns NULL object when onParse is called.
	 * @group RemoveSubscriberActionTest
	 * @covers moosend\Actions\RemoveSubscriber\RemoveSubscriberAction::onParse
	 */
	public function test_Should_Return_0_When_RemoveSubscriberActionTest_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}