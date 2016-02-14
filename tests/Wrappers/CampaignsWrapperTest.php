<?php

require_once __DIR__.'/../../src/moosend/MoosendApi.php';

use moosend\MoosendApi;
use moosend\StubHttpClient;
use moosend\Models\Campaign;
use moosend\Wrappers\CampaignsWrapper;

class CampaignsWrapperTest extends \PHPUnit_Framework_TestCase {
	private $_moosendApi;
	private $_stubHttpClient;
	private $_apiKey = 'myApiKey';
	private $_campaignID = 'myCampaignID';
	
	public function setUp() {
		$this->_moosendApi = new MoosendApi($this->_apiKey);
		$this->_stubHttpClient = new StubHttpClient();
	}
	
	function tearDown() {
		$this->_moosendApi = null;
		$this->_stubHttpClient = null;
	}
	
	/**
	 * Test CampaignsWrapper constructor when API key is valid.
	 * @covers moosend\Wrappers\CampaignsWrapper::__construct
	 * @group CampaignsWrapperTest
	 */
	public function test_Can_Create_CampaignsWrapper_Instance() {
		$campaignsWrapper = new CampaignsWrapper($this->_stubHttpClient, $this->_moosendApi->getApiEndpoint(), $this->_apiKey);
		$this->assertInstanceOf('moosend\Wrappers\CampaignsWrapper', $campaignsWrapper);
	}
	
// 	//================================================================================
// 	// CampaignsWrapper::cloneCampaign
// 	//================================================================================
	
// 	/**
// 	 * Test error handling when calling cloneCampaign with an invalid campaignID.
// 	 * @group CampaignsWrapperTest
// 	 * @covers moosend\Wrappers\CampaignsWrapper::cloneCampaign
// 	 * @expectedException InvalidArgumentException
// 	 * @dataProvider providerInvalidValues
// 	 */
// 	public function test_Throws_InvalidArgumentException_When_Calling_CloneCampaign_With_Invalid_CampaignID($campaignID) {
// 		$this->_moosendApi->campaigns->cloneCampaign($campaignID);
// 	}
	
	//================================================================================
	// CampaignsWrapper::send
	//================================================================================
	
	/**
	 * Test error handling when calling send with an invalid campaignID.
	 * @group CampaignsWrapperTest
	 * @covers moosend\Wrappers\CampaignsWrapper::send
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_Send_With_Invalid_CampaignID($campaignID) {
		$this->_moosendApi->campaigns->send($campaignID);
	}
	
	//================================================================================
	// CampaignsWrapper::delete
	//================================================================================
	
	/**
	 * Test error handling when calling delete with an invalid campaignID.
	 * @group CampaignsWrapperTest
	 * @covers moosend\Wrappers\CampaignsWrapper::delete
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_Delete_With_Invalid_CampaignID($campaignID) {
		$this->_moosendApi->campaigns->delete($campaignID);
	}
	
// 	//================================================================================
// 	// CampaignsWrapper::getCampaignSummary
// 	//================================================================================
	
// 	/**
// 	 * Test error handling when calling getCampaignSummary with an invalid campaignID.
// 	 * @group CampaignsWrapperTest
// 	 * @covers moosend\Wrappers\CampaignsWrapper::getCampaignSummary
// 	 * @expectedException InvalidArgumentException
// 	 * @dataProvider providerInvalidValues
// 	 */
// 	public function test_Throws_InvalidArgumentException_When_Calling_GetCampaignSummary_With_Invalid_CampaignID($campaignID) {
// 		$this->_moosendApi->campaigns->getCampaignSummary($campaignID);
// 	}
	
	//================================================================================
	// CampaignsWrapper::getActivityByLocation
	//================================================================================
	
	/**
	 * Test error handling when calling getActivityByLocation with an invalid campaignID.
	 * @group CampaignsWrapperTest
	 * @covers moosend\Wrappers\CampaignsWrapper::getActivityByLocation
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_GetActivityByLocation_With_Invalid_CampaignID($campaignID) {
		$this->_moosendApi->campaigns->getActivityByLocation($campaignID);
	}
	
	//================================================================================
	// CampaignsWrapper::getLinkActivity
	//================================================================================
	
	/**
	 * Test error handling when calling getLinkActivity with an invalid campaignID.
	 * @group CampaignsWrapperTest
	 * @covers moosend\Wrappers\CampaignsWrapper::getLinkActivity
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_GetLinkActivity_With_Invalid_CampaignID($campaignID) {
		$this->_moosendApi->campaigns->getLinkActivity($campaignID);
	}
	
	//================================================================================
	// CampaignsWrapper::sendCampaignTest
	//================================================================================
	
	/**
	 * Test error handling when calling sendCampaignTest with an invalid campaignID.
	 * @group CampaignsWrapperTest
	 * @covers moosend\Wrappers\CampaignsWrapper::sendCampaignTest
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_SendCampaignTest_With_Invalid_CampaignID($campaignID) {
		$emails = array('example@example.com');
		$this->_moosendApi->campaigns->sendCampaignTest($campaignID, $emails);
	}
	
	/**
	 * Test error handling when calling sendCampaignTest with empty array of emails.
	 * @group CampaignsWrapperTest
	 * @covers moosend\Wrappers\CampaignsWrapper::sendCampaignTest
	 * @expectedException InvalidArgumentException
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_SendCampaignTest_With_Empty_Array_Of_Emails() {
		$emails = array();
		$this->_moosendApi->campaigns->sendCampaignTest('myCampaignID', $emails);
	}
	
	//================================================================================
	// CampaignsWrapper::getSenderDetails
	//================================================================================
	
	/**
	 * Test error handling when calling getSenderDetails with an invalid email address.
	 * @group CampaignsWrapperTest
	 * @covers moosend\Wrappers\CampaignsWrapper::getSenderDetails
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_GetSenderDetails_With_Invalid_Email($email) {
		$this->_moosendApi->campaigns->getSenderDetails($email);
	}
	
	//================================================================================
	// Invalid values provider
	//================================================================================
	
	public function providerInvalidValues() {
		return array (
				array(''),
				array(123),
				array(123.4),
				array(null)
		);
	}
}