<?php
namespace tests\Actions\Subscribers;

use moosend\Actions\Subscribers\SubscribersRequest;

class SubscribersRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test SubscribersRequest constructor.
	 * @group SubscribersRequestTest
	 * @covers moosend\Actions\Subscribers\SubscribersRequest::__construct
	 */
	public function test_Can_Create_SubscribersRequest_Instance() {
		$since = date_default_timezone_set('UTC');
		$since = new \DateTime('2020-01-15');	
		$subscribersRequest = new SubscribersRequest('Bounced', $since, 2, 5);
		$this->assertInstanceOf('moosend\Actions\Subscribers\SubscribersRequest', $subscribersRequest);
		$this->assertEquals($subscribersRequest->status, 'Bounced');
		$this->assertEquals($subscribersRequest->since, '2020-01-15');
		$this->assertEquals($subscribersRequest->page, 2);
		$this->assertEquals($subscribersRequest->pageSize, 5);
	}
}