<?php
namespace tests\Actions\AddSubscriber;

require_once __DIR__.'/../../Actions/ActionTestBase.php';

use tests\Actions\ActionTestBase;
use moosend\HttpClient;
use moosend\Models\Subscriber;
use moosend\Actions\Unsubscribe\UnsubscribeAction;

class UnsubscribeActionTest extends ActionTestBase  {
	private $_httpClient;
	private $_action;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
		$this->_action = new UnsubscribeAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $this->campaignID, $this->mailingListID, $this->apiKey);
	}
	
	public function tearDown() {
		$this->_httpClient = null;
		$this->_action = null;
	}	

	/**
	 * Test if UnsubscribeAction constructor calls its parent constructor with the right parameters and creates an UnsubscribeAction object.
	 * @group UnsubscribeActionTest
	 * @covers moosend\Actions\Unsubscribe\UnsubscribeAction::__construct
	 * @dataProvider providerInvalidValuesForGetByEmail
	 */
	public function test_Can_Call_ActionTestBase_Constructor_When_UnsubscribeAction_Object_Is_Created($campaignID, $mailingListID) {
		$action = new UnsubscribeAction($this->_httpClient, self::C_MOOSEND_API_ENDPOINT, $campaignID, $mailingListID, $this->apiKey);
		if (!is_null($mailingListID) && is_null($campaignID)) {
			$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/subscribers/{$mailingListID}/unsubscribe.json";
		} elseif (is_null($mailingListID) && !is_null($campaignID)) {
			$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/subscribers/{$campaignID}/unsubscribe.json";
		} elseif (!is_null($mailingListID) && !is_null($campaignID)) {
			$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/subscribers/{$mailingListID}/{$campaignID}/unsubscribe.json";
		} else {
			$expectedUrl = self::C_MOOSEND_API_ENDPOINT . "/subscribers/unsubscribe.json";
		}

		$expectedMethod = 'POST';
		
		$this->assertInstanceOf('moosend\Actions\Unsubscribe\UnsubscribeAction', $action);
		$this->assertConstructorCall($action, $expectedUrl, $expectedMethod, $this->_httpClient, $this->apiKey);
	}
	
	public function providerInvalidValuesForGetByEmail() {
		return array (
				array(null, null),
				array($this->campaignID, null),
				array(null, $this->mailingListID),
				array($this->campaignID, $this->mailingListID)
		);
	}
	
	/**
	 * Test if UnsubscribeAction returns null when onParse is called.
	 * @group UnsubscribeActionTest
	 * @covers moosend\Actions\Unsubscribe\UnsubscribeAction::onParse
	 */
	public function test_Should_Return_null_When_AddSubscriberAction_Calls_onParse() {
		$json = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": {} }', true);
		
		$returnedValue = $this->_action->onParse($json['Context']);
		
		$this->assertTrue(($returnedValue == null));
	}
}