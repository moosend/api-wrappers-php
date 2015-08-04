<?php
namespace tests\Actions\DeleteSegment;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\DeleteSegment\DeleteSegmentAction;

class DeleteSegmentTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_segmentID = 'segment\'s ID';
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new DeleteSegmentAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->_segmentID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if DeleteSegmentAction constructor calls its parent constructor with the right parameters and creates a DeleteSegmentAction object.
	 * @group DeleteSegmentActionTest
	 * @covers moosend\Actions\DeleteSegment\DeleteSegmentAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_DeleteSegmentAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/segments/{$this->_segmentID}/delete.json";
		$expectedMethod = 'DELETE';
		
		$this->assertInstanceOf('moosend\Actions\DeleteSegment\DeleteSegmentAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if DeleteSegmentAction returns NULL when onParse is called.
	 * @group DeleteSegmentActionTest
	 * @covers moosend\Actions\DeleteSegment\DeleteSegmentAction::onParse
	 */
	public function test_Should_Return_NULL_When_DeleteSegmentActionTest_Calls_onParse_With_Success() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}