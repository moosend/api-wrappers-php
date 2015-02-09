<?php
namespace tests\Actions\CloneCampaign;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use moosend\Actions\CloneCampaign\CloneAction;
use moosend\HttpClient;
use tests\Actions\ActionTestBase;
use moosend\Models\Campaign;

class CloneActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_jsonData;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getCampaignRawJsonResponse.html'), true)['Context'];
		$this->_httpClient = new HttpClient();
		$this->_action = new CloneAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->campaignID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if CloneAction constructor calls its parent constructor with the right parameters and creates a CloneAction object.
	 * @group CloneActionTest
	 * @covers moosend\Actions\CloneCampaign\CloneAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_CloneAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->campaignID}/clone.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\CloneCampaign\CloneAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if CloneAction returns a Campaign object when onParse is called.
	 * @group CloneActionTest
	 * @covers moosend\Actions\CloneCampaign\CloneAction::onParse
	 */
	public function test_Should_Return_Campaign_Object_When_CloneAction_Calls_onParse() {
		$returnedObject = $this->_action->onParse($this->_jsonData);
		$expectedObject = Campaign::withJSON($this->_jsonData);
		
		$this->assertEquals($expectedObject, $returnedObject);
	}
}