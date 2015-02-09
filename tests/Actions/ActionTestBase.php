<?php
namespace tests\Actions;

use moosend\HttpClient;
use moosend\Models\AbstractAction;
use moosend\MoosendApi;

class ActionTestBase extends \PHPUnit_Framework_TestCase {
	const 	C_MOOSEND_API_ENDPOINT = 'http://api.moosend.com/v2';
	
	public $apiKey = 'apiKey';
	public $campaignID = 'campaignID';
	public $mailingListID = 'mailingListID';
	
	public function assertConstructorCall(AbstractAction $action, $expectedUrl, $expectedMethod, $expectedHttpClient, $expectedApiKey) {
		$this->assertEquals($expectedUrl, $action->getUrl());
		$this->assertEquals($expectedMethod, $action->getMethod());
		$this->assertEquals($expectedHttpClient, $expectedHttpClient);
		$this->assertEquals($expectedApiKey, $action->getApiKey());
	}
}