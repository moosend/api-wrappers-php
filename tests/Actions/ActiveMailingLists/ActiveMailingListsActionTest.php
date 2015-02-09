<?php
namespace tests\Actions\ActiveMailingLists;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use moosend\HttpClient;
use tests\Actions\ActionTestBase;
use moosend\Actions\ActiveMailingLists\ActiveMailingListsResponse;
use moosend\Actions\ActiveMailingLists\ActiveMailingListsAction;

class ActiveMailingListsActionTest extends ActionTestBase  {
	private $_jsonData;
	private $_httpClient;
	private $_action;
	private $_page;
	private $_pageSize;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_page = 1;
		$this->_pageSize = 5;
		$this->_action = new ActiveMailingListsAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->_page, $this->_pageSize, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if ActiveMailingListsAction constructor calls its parent constructor with the right parameters and creates a ActiveMailingListsAction object.
	 * @group ActiveMailingListsActionTest
	 * @covers moosend\Actions\ActiveMailingLists\ActiveMailingListsAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_ActiveMailingListsAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->_page}/{$this->_pageSize}.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\ActiveMailingLists\ActiveMailingListsAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if ActiveMailingListsAction returns a ActiveMailingListsResponse object when onParse is called.
	 * @group ActiveMailingListsActionTest
	 * @covers moosend\Actions\ActiveMailingLists\ActiveMailingListsAction::onParse
	 */
	public function test_Should_Return_ActiveMailingLists_Object_When_ActiveMailingListsAction_Calls_onParse() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getActiveMailingListsJsonResponse.html'), true)['Context'];
		$returnedObject = $this->_action->onParse($jsonData);
		
		$expectedActiveMailingListsResponseObject = new ActiveMailingListsResponse($jsonData);
		
		$this->assertEquals($expectedActiveMailingListsResponseObject, $returnedObject);
	}
}