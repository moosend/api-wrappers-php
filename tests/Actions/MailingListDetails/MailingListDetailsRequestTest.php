<?php
namespace tests\Actions\MailingListDetails;

use moosend\Actions\MailingListDetails\MailingListDetailsRequest;

class MailingListDetailsRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test MailingListDetailsRequest constructor.
	 * @group MailingListDetailsRequestTest
	 * @covers moosend\Actions\MailingListDetails\MailingListDetailsRequest::__construct
	 */
	public function test_Can_Create_MailingListDetailsRequest_Instance() {
		$mailingListDetailsRequest = new MailingListDetailsRequest(false);
		$this->assertInstanceOf('moosend\Actions\MailingListDetails\MailingListDetailsRequest', $mailingListDetailsRequest);
		$this->assertEquals($mailingListDetailsRequest->withStatistics, false);
	}
}