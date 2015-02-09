<?php
namespace tests\Actions\SegmentSubscribers;

use moosend\Actions\SegmentSubscribers\SegmentSubscribersRequest;

class SegmentSubscribersRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test SegmentSubscribersRequest constructor.
	 * @group SegmentSubscribersRequestTest
	 * @covers moosend\Actions\SegmentSubscribers\SegmentSubscribersRequest::__construct
	 */
	public function test_Can_Create_SegmentSubscribersRequest_Instance() {
		$subscribedRequest = new SegmentSubscribersRequest('Subscribed', 1, 500);
		$this->assertInstanceOf('moosend\Actions\SegmentSubscribers\SegmentSubscribersRequest', $subscribedRequest);
		$this->assertEquals('Subscribed', $subscribedRequest->status);
		$this->assertEquals(1, $subscribedRequest->page);
		$this->assertEquals(500, $subscribedRequest->pageSize);
	}
}