<?php
namespace tests\Actions\SendTestCampaign;

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\SendTestCampaign\SendTestCampaignAction;

class SendTestCampaignActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new SendTestCampaignAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->campaignID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if SendTestCampaignAction constructor calls its parent constructor with the right parameters and creates a SendTestCampaignAction object.
	 * @group SendTestCampaignActionTest
	 * @covers moosend\Actions\SendTestCampaign\SendTestCampaignAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_SendTestCampaignAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->campaignID}/send_test.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\SendTestCampaign\SendTestCampaignAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test SendTestCampaignAction returned value when onParse is called.
	 * @group SendTestCampaignActionTest
	 * @covers moosend\Actions\SendTestCampaign\SendTestCampaignAction::onParse
	 */
	public function test_Should_Return_NULL_When_SendTestCampaignAction_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}