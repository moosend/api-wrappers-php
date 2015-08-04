<?php
namespace tests\Actions\Campaign;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use moosend\HttpClient;
use moosend\Actions\Campaign\CampaignAction;
use moosend\Models\Campaign;
use tests\Actions\ActionTestBase;

class CampaignActionTest extends ActionTestBase  {
	private $_jsonData;
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getCampaignRawJsonResponse.html'), true)['Context'];	
		$this->_httpClient = new HttpClient();
		$this->_action = new CampaignAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->campaignID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if CampaignAction constructor calls its parent constructor with the right parameters and creates a CampaignAction object.
	 * @group CampaignActionTest
	 * @covers moosend\Actions\Campaign\CampaignAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_CampaignAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->campaignID}/view.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\Campaign\CampaignAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if CampaignAction returns a Campaign object when onParse is called.
	 * @group CampaignActionTest
	 * @covers moosend\Actions\Campaign\CampaignAction::onParse
	 */
	public function test_Should_Return_Campaign_Object_When_CampaignAction_Calls_onParse() {
		$returnedObject = $this->_action->onParse($this->_jsonData);
		
		$expectedCampaignObject = Campaign::withJSON($this->_jsonData);
		
		$this->assertEquals($expectedCampaignObject, $returnedObject);
	}
}