<?php
namespace tests\Actions\ActivityByLocation;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\ActivityByLocation\ActivityByLocationAction;
use moosend\Actions\ActivityByLocation\ActivityByLocationResponse;


class ActivityByLocationActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_jsonData;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/ActivityByLocationJson.html'), true)['Context'];
		$this->_httpClient = new HttpClient();
		$this->_action = new ActivityByLocationAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->campaignID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
		$this->_jsonData = null;
	}	

	/**
	 * Test if ActivityByLocationAction constructor calls its parent constructor with the right parameters and creates a ActivityByLocationAction object.
	 * @group ActivityByLocationActionTest
	 * @covers moosend\Actions\ActivityByLocation\ActivityByLocationAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_ActivityByLocationAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->campaignID}/stats/countries.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\ActivityByLocation\ActivityByLocationAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if ActivityByLocationAction returns ActivityByLocationResponse object when onParse is called.
	 * @group ActivityByLocationActionTest
	 * @covers moosend\Actions\ActivityByLocation\ActivityByLocationAction::onParse
	 */
	public function test_Should_Return_ActivityByLocationResponse_Object_When_ActivityByLocationAction_Calls_onParse_With_Success() {
		$returnedObject = $this->_action->onParse($this->_jsonData);
		$expectedObject = new ActivityByLocationResponse($this->_jsonData);
		
		$this->assertEquals($expectedObject, $returnedObject);
	}
}