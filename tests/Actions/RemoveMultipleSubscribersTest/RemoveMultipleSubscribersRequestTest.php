<?php
namespace tests\Actions\RemoveMultipleSubscribers;


use moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersRequest;

class RemoveMultipleSubscribersRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test RemoveMultipleSubscribersRequest constructor.
	 * @group RemoveMultipleSubscribersRequestTest
	 * @covers moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersRequest::__construct
	 */
	public function test_Can_Create_RemoveMultipleSubscribersRequest_Instance() {
		$removeMultipleSubscribersRequest = new RemoveMultipleSubscribersRequest('example1@example.com', 'example1@example.com');
		
		$this->assertInstanceOf('moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersRequest', $removeMultipleSubscribersRequest);
		$this->assertEquals('example1@example.com', 'example1@example.com', $removeMultipleSubscribersRequest->emails);
	}
}