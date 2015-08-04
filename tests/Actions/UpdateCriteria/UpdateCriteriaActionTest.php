<?php
namespace tests\Actions\UpdateCriteria;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\UpdateCriteria\UpdateCriteriaAction;


class UpdateCriteriaActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_segmentID = 'A_segment_ID';
	private $_cretiriaID = 'A_cretiria_ID';
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new UpdateCriteriaAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->_segmentID, $this->_cretiriaID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if UpdateCriteriaAction constructor calls its parent constructor with the right parameters and creates a UpdateCriteriaAction object.
	 * @group UpdateCriteriaActionTest
	 * @covers moosend\Actions\UpdateCriteria\UpdateCriteriaAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_UpdateCriteriaAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/segments/{$this->_segmentID}/criteria/{$this->_cretiriaID}/update.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\UpdateCriteria\UpdateCriteriaAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if UpdateCriteriaAction returns null when onParse is called.
	 * @group UpdateCriteriaActionTest
	 * @covers moosend\Actions\UpdateCriteria\UpdateCriteriaAction::onParse
	 */
	public function test_Should_Return_Null_When_UpdateCriteriaAction_Calls_onParse_With_Success() {
		$returnedJson = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": "00000000-0000-0000-0000-000000000000" }', true);
		$returnedObject = $this->_action->onParse($returnedJson['Context']);
		
		$this->assertEquals('00000000-0000-0000-0000-000000000000', $returnedObject);
	}
}