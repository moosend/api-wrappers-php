<?php
namespace tests\Actions\ActivityByLocation;

use moosend\Actions\ActivityByLocation\ActivityByLocationResponse;

class ActivityByLocationResponseTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test ActivityByLocationResponse constructor
	 * @group ActivityByLocationResponseTest
	 * @covers moosend\Actions\ActivityByLocation\ActivityByLocationResponse::__construct
	 */
	public function test_Can_Create_ActivityByLocationResponse_Instance() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/ActivityByLocationJson.html'), true)['Context'];	
		$activityByLocationResponse = new ActivityByLocationResponse($jsonData);
	
		$this->assertInstanceOf('moosend\Actions\ActivityByLocation\ActivityByLocationResponse', $activityByLocationResponse);
	}
}