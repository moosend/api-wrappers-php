<?php
namespace tests\Actions\AllSenders;

use moosend\Actions\AllSenders\AllSendersResponse;

class AllSendersResponseTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test AllSendersResponse constructor
	 * @group AllSendersResponseTest
	 * @covers moosend\Actions\AllSenders\AllSendersResponse::__construct
	 */
	public function test_Can_Create_AllSendersResponse_Instance() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getAllSendersJsonResponse.html'), true)['Context'];	
		$allSendersResponse = new AllSendersResponse($jsonData);
	
		$this->assertInstanceOf('moosend\Actions\AllSenders\AllSendersResponse', $allSendersResponse);
	}
}