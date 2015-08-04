<?php
namespace tests\Actions\SubscriberByEmail;

use moosend\Actions\SubscriberByEmail\SubscriberByEmailRequest;

class SubscriberByEmailRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test SubscriberByEmailRequest constructor.
	 * @group SubscriberByEmailRequestTest
	 * @covers moosend\Actions\SubscriberByEmail\SubscriberByEmailRequest::__construct
	 */
	public function test_Can_Create_SubscriberByEmailRequest_Instance() {
		$subscriberByEmailRequest = new SubscriberByEmailRequest('yourMailingListID');
		
		$this->assertInstanceOf('moosend\Actions\SubscriberByEmail\SubscriberByEmailRequest', $subscriberByEmailRequest);
		$this->assertEquals('yourMailingListID', $subscriberByEmailRequest->email);
	}
}