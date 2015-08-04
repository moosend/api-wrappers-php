<?php
namespace tests\Actions\FindSegmentsForMailingList;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListAction;
use moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListResponse;

class FindSegmentsForMailingListTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new FindSegmentsForMailingListAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if FindSegmentsForMailingListAction constructor calls its parent constructor with the right parameters and creates a FindSegmentsForMailingListAction object.
	 * @group FindSegmentsForMailingListActionTest
	 * @covers moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_FindSegmentsForMailingListAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/segments.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if FindSegmentsForMailingListAction returns FindSegmentsForMailingListResponse when onParse is called.
	 * @group FindSegmentsForMailingListActionTest
	 * @covers moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListAction::onParse
	 */
	public function test_Should_Return_FindSegmentsForMailingListRepsonse_Object_When_FindSegmentsForMailingListActionTest_Calls_onParse_With_Success() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSegmentsJsonResponse.html'), true)['Context'];
		$returnedObject = $this->_action->onParse($jsonData);
		
		$expectedSegmentsResponseObject = new FindSegmentsForMailingListResponse($jsonData);
		
		$this->assertEquals($expectedSegmentsResponseObject, $returnedObject);
	}
}