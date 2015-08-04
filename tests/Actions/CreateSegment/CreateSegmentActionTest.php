<?php
namespace tests\Actions\CreateSegment;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\CreateSegment\CreateSegmentAction;

class CreateSegmentActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new CreateSegmentAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if CreateSegmentAction constructor calls its parent constructor with the right parameters and creates a CreateSegmentAction object.
	 * @group CreateSegmentActionTest
	 * @covers moosend\Actions\CreateSegment\CreateSegmentAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_CreateSegmentAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/segments/create.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\CreateSegment\CreateSegmentAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if CreateSegmentAction returns segment's ID when onParse is called.
	 * @group CreateSegmentActionTest
	 * @covers moosend\Actions\CreateSegment\CreateSegmentAction::onParse
	 */
	public function test_Should_Return_SegmentID_When_CreateSegmentAction_Calls_onParse_With_Success() {
		$returnedJson = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": 3535 }', true);
		$returnedObject = $this->_action->onParse($returnedJson['Context']);
		
		$this->assertEquals('3535', $returnedObject);
	}
}