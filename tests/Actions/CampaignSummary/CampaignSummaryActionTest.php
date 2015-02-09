<?php
namespace tests\Actions\CampaignSummary;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\CampaignSummary\CampaignSummaryAction;
use moosend\Models\CampaignSummary;

class CampaignSummaryActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_jsonData;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/CampaignSummaryJson.html'), true);
		$this->_httpClient = new HttpClient();
		$this->_action = new CampaignSummaryAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->campaignID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if CampaignSummary constructor calls its parent constructor with the right parameters and creates a CampaignSummary object.
	 * @group CampaignSummaryActionTest
	 * @covers moosend\Actions\CampaignSummary\CampaignSummaryAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_CampaignSummary_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->campaignID}/view_summary.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\CampaignSummary\CampaignSummaryAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if CampaignSummary returns a Campaign object when onParse is called.
	 * @group CampaignSummaryActionTest
	 * @covers moosend\Actions\CampaignSummary\CampaignSummaryAction::onParse
	 */
	public function test_Should_Return_Campaign_Object_When_CloneAction_Calls_onParse() {
		$returnedCampaignObject = $this->_action->onParse($this->_jsonData['Context']);
		$expectedCampaignObject = CampaignSummary::withJSON($this->_jsonData['Context']);
		
		$this->assertEquals($expectedCampaignObject, $returnedCampaignObject);
	}
}