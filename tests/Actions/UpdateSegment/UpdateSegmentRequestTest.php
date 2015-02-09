<?php
namespace tests\Actions\UpdateSegment;

use moosend\Actions\UpdateSegment\UpdateSegmentRequest;

class UpdateSegmentRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test UpdateSegmentRequest constructor.
	 * @group UpdateSegmentRequestTest
	 * @covers moosend\Actions\UpdateSegment\UpdateSegmentRequest::__construct
	 */
	public function test_Can_Create_UpdateSegmentRequest_Instance() {
		$updateMailingListRequest = new UpdateSegmentRequest('segment\'s name', 'segment\'s type');
		$this->assertInstanceOf('moosend\Actions\UpdateSegment\UpdateSegmentRequest', $updateMailingListRequest);
		$this->assertEquals($updateMailingListRequest->name, 'segment\'s name');
		$this->assertEquals($updateMailingListRequest->matchType, 'segment\'s type');
	}
}