<?php
namespace tests\Actions\LinkActivity;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\LinkActivity\LinkActivityAction;
use moosend\Actions\LinkActivity\LinkActivityResponse;

class ActivityByLocationActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_jsonData;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/ActivityByLocationJson.html'), true)['Context'];
		$this->_httpClient = new HttpClient();
		$this->_action = new LinkActivityAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->campaignID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
		$this->_jsonData = null;
	}	

	/**
	 * Test if LinkActivityAction constructor calls its parent constructor with the right parameters and creates a LinkActivityAction object.
	 * @group LinkActivityActionTest
	 * @covers moosend\Actions\LinkActivity\LinkActivityAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_LinkActivityAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->campaignID}/stats/links.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\LinkActivity\LinkActivityAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if LinkActivityAction returns LinkActivityResponse object when onParse is called.
	 * @group LinkActivityActionTest
	 * @covers moosend\Actions\LinkActivity\LinkActivityAction::onParse
	 */
	public function test_Should_Return_LinkActivityResponse_Object_When_LinkActivityAction_Calls_onParse_With_Success() {
		$returnedObject = $this->_action->onParse($this->_jsonData);
		$expectedObject = new LinkActivityResponse($this->_jsonData);
		
		$this->assertEquals($expectedObject, $returnedObject);
	}
}