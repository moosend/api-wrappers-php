<?php
namespace tests\Actions\AddSubscriber;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Models\Subscriber;
use moosend\Actions\AddSubscriber\AddSubscriberAction;

class AddSubscriberTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new AddSubscriberAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if AddSubscriberAction constructor calls its parent constructor with the right parameters and creates an AddSubscriberAction object.
	 * @group AddSubscriberTest
	 * @covers moosend\Actions\AddSubscriber\AddSubscriberAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_AddSubscriberAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/subscribers/{$this->mailingListID}/subscribe.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\AddSubscriber\AddSubscriberAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if AddSubscriberAction returns a Subscriber object when onParse is called.
	 * @group AddSubscriberTest
	 * @covers moosend\Actions\AddSubscriber\AddSubscriberAction::onParse
	 */
	public function test_Should_Return_Subscriber_Object_When_AddSubscriberAction_Calls_onParse() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSubscriberByEmailJsonResponse.html'), true)['Context'];
		
		$returnedObject = $this->_action->onParse($jsonData);
		
		$expectedSubscriberObject = Subscriber::withJSON($jsonData);
		
		$this->assertEquals($expectedSubscriberObject, $returnedObject);
	}
}