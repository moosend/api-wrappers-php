<?php
namespace tests\Actions\MailingListDetails;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Actions\MailingListDetails\MailingListDetailsAction;
use moosend\Models\MailingList;

class MailingListDetailsActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new MailingListDetailsAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if MailingListDetailsAction constructor calls its parent constructor with the right parameters and creates a MailingListDetailsAction object.
	 * @group MailingListDetailsActionTest
	 * @covers moosend\Actions\MailingListDetails\MailingListDetailsAction::__construct
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_MailingListDetailsAction_Object_Is_Created() {
		$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/lists/{$this->mailingListID}/details.json";
		$expectedMethod = 'GET';
		
		$this->assertInstanceOf('moosend\Actions\MailingListDetails\MailingListDetailsAction', $this->_action);
		$this->assertConstructorCall($this->_action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	/**
	 * Test if MailingListDetailsAction returns a MailingList object when onParse is called.
	 * @group MailingListDetailsActionTest
	 * @covers moosend\Actions\MailingListDetails\MailingListDetailsAction::onParse
	 */
	public function test_Should_Return_MailingList_Object_When_CreateMailingListAction_Calls_onParse_With_Success() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getMailingListDetailsJsonResponse.html'), true)['Context']; 
		
		$returnedObject = $this->_action->onParse($jsonData);
		
		$expectedMailingListObject = MailingList::withJSON($jsonData);
		
		$this->assertEquals($expectedMailingListObject, $returnedObject);
	}
}