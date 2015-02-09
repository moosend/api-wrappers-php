<?php
namespace tests\Actions\UpdateSegment;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\UpdateSegment\UpdateSegmentAction;

class UpdateSegmentActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_segmentID = 'segment\'s ID';
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new UpdateSegmentAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->_segmentID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if UpdateSegmentAction constructor calls its parent constructor with the right parameters and creates a UpdateSegmentAction object.
	 * @group UpdateSegmentActionTest
	 * @covers moosend\Actions\UpdateSegment\UpdateSegmentAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_UpdateSegmentAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/segments/{$this->_segmentID}/update.json";
		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\UpdateSegment\UpdateSegmentAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if UpdateSegmentAction returns null when onParse is called.
	 * @group UpdateSegmentActionTest
	 * @covers moosend\Actions\UpdateSegment\UpdateSegmentAction::onParse
	 */
	public function test_Should_Return_NULL_When_UpdateSegmentAction_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}