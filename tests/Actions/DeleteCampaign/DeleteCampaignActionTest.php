<?php
namespace tests\Actions\Delete;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\DeleteCampaign\DeleteCampaignAction;

class DeleteActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new DeleteCampaignAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->campaignID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if DeleteAction constructor calls its parent constructor with the right parameters and creates a DeleteAction object.
	 * @group DeleteActionTest
	 * @covers moosend\Actions\DeleteCampaign\DeleteCampaignAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_DeleteAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->campaignID}/delete.json";
		$expectedMethod = 'DELETE';
		
		$this->assertInstanceOf('moosend\Actions\DeleteCampaign\DeleteCampaignAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if DeleteAction returns NULL object when onParse is called.
	 * @group DeleteActionTest
	 * @covers moosend\Actions\DeleteCampaign\DeleteCampaignAction::onParse
	 */
	public function test_Should_Return_null_When_DeleteActionTest_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}