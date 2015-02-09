<?php
namespace tests\Actions\SegmentDetails;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\SegmentDetails\SegmentDetailsAction;
use moosend\Models\Segment;

class SegmentDetailsActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	private $_segmentID = 'segment\'s ID';
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new SegmentDetailsAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->_segmentID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if SegmentDetailsAction constructor calls its parent constructor with the right parameters and creates a SegmentDetailsAction object.
	 * @group SegmentDetailsActionTest
	 * @covers moosend\Actions\SegmentDetails\SegmentDetailsAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_SegmentDetailsAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/segments/{$this->_segmentID}/details.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\SegmentDetails\SegmentDetailsAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if SegmentDetailsAction returns Segment object when onParse is called.
	 * @group SegmentDetailsActionTest
	 * @covers moosend\Actions\SegmentDetails\SegmentDetailsAction::onParse
	 */
	public function test_Should_Return_Segment_Object_When_SegmentDetailsActionTest_Calls_onParse_With_Success() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSegmentsJsonResponse.html'), true)['Context']['Segments'][0]; 
		$returnedObject = $this->_action->onParse($jsonData);
		
		$expectedSegmentObject = Segment::withJSON($jsonData);
		
		$this->assertEquals($expectedSegmentObject, $returnedObject);
	}
}