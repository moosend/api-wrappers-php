<?php
namespace tests\Actions\Campaigns;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use moosend\HttpClient;
use moosend\Actions\Campaigns\CampaignsAction;
use moosend\Models\Campaigns;
use tests\Actions\ActionTestBase;
use moosend\Actions\Campaigns\CampaignsResponse;

class CampaignsActionTest extends ActionTestBase  {
	private $_jsonData;
	private $_httpClient;
	private $_action;
	private $_page;
	private $_pageSize;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getCampaignsRawJsonResponse.html'), true)['Context'];	
		$this->_httpClient = new HttpClient();
		$this->_page = 1;
		$this->_pageSize = 10;
		$this->_action = new CampaignsAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->_page, $this->_pageSize, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_httpClient = null;
		$this->_action = null;
		$this->_page = null;
		$this->_pageSize = null;
	}	

	/**
	 * Test if CampaignsAction constructor calls its parent constructor with the right parameters and creates a CampaignsAction object.
	 * @group CampaignsActionTest
	 * @covers moosend\Actions\Campaigns\CampaignsAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_CampaignsAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->_page}/{$this->_pageSize}.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\Campaigns\CampaignsAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if CampaignsAction returns a CampaignsResponse object when onParse is called.
	 * @group CampaignsActionTest
	 * @covers moosend\Actions\Campaigns\CampaignsAction::onParse
	 */
	public function test_Should_Return_Campaign_Object_When_CampaignAction_Calls_onParse() {
		$returnedObject = $this->_action->onParse($this->_jsonData);
		
		$expectedCampaignsResponseObject = new CampaignsResponse($this->_jsonData);
		
		$this->assertEquals($expectedCampaignsResponseObject, $returnedObject);
	}
}