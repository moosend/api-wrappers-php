<?php
require_once __DIR__.'/../src/moosend/MoosendApi.php';
require_once __DIR__.'/../src/moosend/Wrappers/CampaignsWrapper.php';
require_once __DIR__.'/../src/moosend/Wrappers/MailingListsWrapper.php';
require_once __DIR__.'/../src/moosend/Wrappers/SegmentsWrapper.php';
require_once __DIR__.'/../src/moosend/Wrappers/SubscribersWrapper.php';

use moosend\MoosendApi;
use moosend\StubHttpClient;
use moosend\Models\Campaign;

class MoosendApiTest extends \PHPUnit_Framework_TestCase {
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
	 * Test MoosendApi constructor when API key is valid.
	 * @covers moosend\MoosendApi::__construct
	 * @group MoosendApiTest
	 */
	public function test_Can_Create_MoosendApi_Instance_When_Api_Key_Is_Valid() {
		$moosendApi = new MoosendApi($this->_apiKey);
		$this->assertInstanceOf( 'moosend\MoosendApi', $moosendApi);
		$this->assertInstanceOf( 'moosend\Wrappers\CampaignsWrapper', $moosendApi->campaigns);
		$this->assertInstanceOf( 'moosend\Wrappers\MailingListsWrapper', $moosendApi->mailingLists);
		$this->assertInstanceOf( 'moosend\Wrappers\SegmentsWrapper', $moosendApi->segments);
		$this->assertInstanceOf( 'moosend\Wrappers\SubscribersWrapper', $moosendApi->subscribers);
	}
	
	/**
	 * Test if MoosendApi constructor throws an exception when an invalid API key is provided.
	 * @covers moosend\MoosendApi::__construct
	 * @group MoosendApiTest
	 * @dataProvider providerInvalidApiKeys
	 * @expectedException InvalidArgumentException
	 */
	public function test_Throws_InvalidArgumentException_When_Creating_MoosendApi_With_Invalid_CampaignID($apiKey) {
		$moosend = new MoosendApi($apiKey);
	}
	
	public function providerInvalidApiKeys() {
		return array (
			array(''),
			array(123),
			array(123.4),
			array(null)
		);
	}
}








