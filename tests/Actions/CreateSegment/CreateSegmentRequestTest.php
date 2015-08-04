<?php
namespace tests\Actions\CreateSegment;

use moosend\Actions\CreateSegment\CreateSegmentRequest;

class CreateSegmentRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test CreateSegmentRequest constructor.
	 * @group CreateSegmentRequestTest
	 * @covers moosend\Actions\CreateSegment\CreateSegmentRequest::__construct
	 */
	public function test_Can_Create_CreateSegmentRequest_Instance() {
		$createSegmentRequest = new CreateSegmentRequest('Segment\'s name', 'Any');
		$this->assertInstanceOf('moosend\Actions\CreateSegment\CreateSegmentRequest', $createSegmentRequest);
		$this->assertEquals($createSegmentRequest->name, 'Segment\'s name');
		$this->assertEquals($createSegmentRequest->matchType, 'Any');
	}
}