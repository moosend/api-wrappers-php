<?php
namespace tests\Actions\RemoveSubscriber;


use moosend\Actions\RemoveSubscriber\RemoveSubscriberRequest;

class RemoveSubscriberRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test RemoveSubscriberRequest constructor.
	 * @group RemoveSubscriberRequestTest
	 * @covers moosend\Actions\RemoveSubscriber\RemoveSubscriberRequest::__construct
	 */
	public function test_Can_Create_RemoveSubscriberRequest_Instance() {
		$RemoveSubscriberRequest = new RemoveSubscriberRequest('example@example.com');
		
		$this->assertInstanceOf('moosend\Actions\RemoveSubscriber\RemoveSubscriberRequest', $RemoveSubscriberRequest);
		$this->assertEquals('example@example.com', $RemoveSubscriberRequest->email);
	}
}