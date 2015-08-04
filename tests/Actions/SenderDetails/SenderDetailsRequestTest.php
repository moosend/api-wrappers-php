<?php
namespace tests\Actions\SenderDetails;

use moosend\Actions\SenderDetails\SenderDetailsRequest;

class SenderDetailsRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test SenderDetailsRequest constructor.
	 * @group SenderDetailsRequestTest
	 * @covers moosend\Actions\SenderDetails\SenderDetailsRequest::__construct
	 */
	public function test_Can_Create_SenderDetailsRequest_Instance() {
		$senderDetailsRequest = new SenderDetailsRequest('example@example.com');
		
		$this->assertInstanceOf('moosend\Actions\SenderDetails\SenderDetailsRequest', $senderDetailsRequest);
		$this->assertEquals('example@example.com', $senderDetailsRequest->email);
	}
}