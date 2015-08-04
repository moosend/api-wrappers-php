<?php
namespace tests\Actions\Subscribers;

use moosend\Actions\Subscribers\SubscribersResponse;

class SubscribersResponseTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test SubscribersResponse constructor
	 * @group SubscribersResponseTest
	 * @covers moosend\Actions\Subscribers\SubscribersResponse::__construct
	 */
	public function test_Can_Create_SubscribersResponse_Instance() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSubscribersJsonResponse.html'), true)['Context'];	
		$subscribersResponse = new SubscribersResponse($jsonData);
	
		$this->assertInstanceOf('moosend\Actions\Subscribers\SubscribersResponse', $subscribersResponse);
		$this->assertEquals($jsonData['Subscribers'][0]['Name'], $subscribersResponse[0]->getName());
		$this->assertEquals($jsonData['Subscribers'][1]['Name'], $subscribersResponse[1]->getName());
		$this->assertEquals($jsonData['Subscribers'][0]['CustomFields'][0]['Name'], $subscribersResponse[0]->getCustomFields()[0]->getName());
	}
}
