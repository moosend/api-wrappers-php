<?php
namespace tests\Actions\UpdateDraft;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\UpdateDraft\UpdateDraftAction;
use moosend\Models\Campaign;

class UpdateDraftActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_campaign;
	
	public function setUp() {
		$this->_campaign = Campaign::withJSON(json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getCampaignRawJsonResponse.html'), true)['Context']);
		$this->_httpClient = new HttpClient();
		$this->_action = new UpdateDraftAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->_campaign, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_campaign = null;
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if UpdateDraftAction constructor calls its parent constructor with the right parameters and creates a UpdateDraftAction object.
	 * @group UpdateDraftActionTest
	 * @covers moosend\Actions\UpdateDraft\UpdateDraftAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_UpdateDraftAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/campaigns/{$this->_campaign->getID()}/update.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\UpdateDraft\UpdateDraftAction', $this->_action);
		$this->assertEquals($expectedUrl, $this->_action->getUrl());
		$this->assertEquals($expectedMethod, $this->_action->getMethod());	
	}
	
	/**
	 * Test if UpdateDraftAction returns NULL  when onParse is called.
	 * @group UpdateDraftActionTest
	 * @covers moosend\Actions\UpdateDraft\UpdateDraftAction::onParse
	 */
	public function test_Should_Return_NULL_When_UpdateDraftAction_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}