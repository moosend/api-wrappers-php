<?php
namespace tests\Actions\SegmentSubscribers;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\SegmentSubscribers\SegmentSubscribersAction;
use moosend\Actions\SegmentSubscribers\SegmentSubscribersResponse;

class SegmentSubscribersActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_segmentID = 'segment\'s ID';
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new SegmentSubscribersAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->_segmentID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if SegmentSubscribersAction constructor calls its parent constructor with the right parameters and creates a SegmentSubscribersAction object.
	 * @group SegmentSubscribersActionTest
	 * @covers moosend\Actions\SegmentSubscribers\SegmentSubscribersAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_SegmentSubscribersAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/segments/{$this->_segmentID}/members.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\SegmentSubscribers\SegmentSubscribersAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if SegmentSubscribersAction returns SegmentSubscribersResponse object when onParse is called.
	 * @group SegmentSubscribersActionTest
	 * @covers moosend\Actions\SegmentSubscribers\SegmentSubscribersAction::onParse
	 */
	public function test_Should_Return_SegmentSubscribersResponse_Object_When_SegmentSubscribersActionTest_Calls_onParse_With_Success() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSegmentSubscribersJsonResponse.html'), true)['Context']; 
		$returnedObject = $this->_action->onParse($jsonData);
		
		$expectedSegmentSubscribersResponseObject = new SegmentSubscribersResponse($jsonData);
		
		$this->assertEquals($expectedSegmentSubscribersResponseObject, $returnedObject);
	}
}