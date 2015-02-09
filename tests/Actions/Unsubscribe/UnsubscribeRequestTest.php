<?php
namespace tests\Actions\Unsubscribe;

use moosend\Actions\Unsubscribe\UnsubscribeRequest;

class UnsubscribeRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test UnsubscribeRequest constructor.
	 * @group UnsubscribeRequestTest
	 * @covers moosend\Actions\Unsubscribe\UnsubscribeRequest::__construct
	 */
	public function test_Can_Create_UnsubscribeRequest_Instance() {
		$UnsubscribeRequest = new UnsubscribeRequest('example@example.com');
		
		$this->assertInstanceOf('moosend\Actions\Unsubscribe\UnsubscribeRequest', $UnsubscribeRequest);
		$this->assertEquals('example@example.com', $UnsubscribeRequest->email);
	}
}