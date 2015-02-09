<?php
namespace tests\Actions\AddCriteria;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\AddCriteria\AddCriteriaAction;


class AddCriteriaActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_segmentID = 'A_segment_ID';
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new AddCriteriaAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->_segmentID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if AddCriteriaAction constructor calls its parent constructor with the right parameters and creates a AddCriteriaAction object.
	 * @group AddCriteriaActionTest
	 * @covers moosend\Actions\AddCriteria\AddCriteriaAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_AddCriteriaAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/segments/{$this->_segmentID}/criteria/add.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\AddCriteria\AddCriteriaAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if AddCriteriaAction returns AddCriteriaResponse object when onParse is called.
	 * @group AddCriteriaActionTest
	 * @covers moosend\Actions\AddCriteria\AddCriteriaAction::onParse
	 */
	public function test_Should_Return_SegmentCriteriaID_When_AddCriteriaAction_Calls_onParse_With_Success() {
		$returnedJson = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": "00000000-0000-0000-0000-000000000000" }', true);
		$returnedObject = $this->_action->onParse($returnedJson['Context']);
		
		$this->assertEquals('00000000-0000-0000-0000-000000000000', $returnedObject);
	}
}