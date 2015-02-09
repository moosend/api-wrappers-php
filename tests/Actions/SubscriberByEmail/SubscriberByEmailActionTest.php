<?php
namespace tests\Actions\SubscriberByEmail;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Models\Subscriber;
use moosend\Actions\SubscriberByEmail\SubscriberByEmailAction;

class SubscriberByEmailTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new SubscriberByEmailAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if SubscriberByEmailAction constructor calls its parent constructor with the right parameters and creates a SubscriberByEmailAction object.
	 * @group SubscriberByEmailTest
	 * @covers moosend\Actions\SubscriberByEmail\SubscriberByEmailAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_SubscriberByEmailAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/subscribers/{$this->mailingListID}/view.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\SubscriberByEmail\SubscriberByEmailAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if SubscriberByEmailAction returns a Subscriber object when onParse is called.
	 * @group SubscriberByEmailTest
	 * @covers moosend\Actions\SubscriberByEmail\SubscriberByEmailAction::onParse
	 */
	public function test_Should_Return_Subscriber_Object_When_SubscriberByEmailAction_Calls_onParse() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSubscriberByEmailJsonResponse.html'), true)['Context'];
		
		$returnedObject = $this->_action->onParse($jsonData);
		
		$expectedSubscriberObject = Subscriber::withJSON($jsonData);
		
		$this->assertEquals($expectedSubscriberObject, $returnedObject);
	}
}