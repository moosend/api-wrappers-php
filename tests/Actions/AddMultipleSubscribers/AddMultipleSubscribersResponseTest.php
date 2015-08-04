<?php
namespace tests\Actions\AddMultipleSubscribers;

use moosend\Actions\AddMultipleSubscribers\AddMultipleSubscribersResponse;

class AddMultipleSubscribersResponseTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test AddMultipleSubscribersResponse constructor
	 * @group AddMultipleSubscribersResponseTest
	 * @covers moosend\Actions\AddMultipleSubscribers\AddMultipleSubscribersResponse::__construct
	 */
	public function test_Can_Create_AddMultipleSubscribersResponse_Instance() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/addMultipleSubscribersJsonResponse.html'), true)['Context'];	
		
		$response = new AddMultipleSubscribersResponse($jsonData);
	
		$this->assertInstanceOf('moosend\Actions\AddMultipleSubscribers\AddMultipleSubscribersResponse', $response);
	}
}