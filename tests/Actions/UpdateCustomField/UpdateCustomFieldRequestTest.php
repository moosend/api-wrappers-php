<?php
namespace tests\Actions\UpdateMailingList;

use moosend\Actions\UpdateMailingList\UpdateMailingListRequest;

class UpdateMailingListRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test UpdateMailingListRequest constructor.
	 * @group UpdateMailingListRequestTest
	 * @covers moosend\Actions\UpdateMailingList\UpdateMailingListRequest::__construct
	 */
	public function test_Can_Create_UpdateMailingListRequest_Instance() {
		$createMailingListRequest = new UpdateMailingListRequest('Name', 'http://confirmation-page.com', 'http://redirect-after-unsubscribe-page.com');
		$this->assertInstanceOf('moosend\Actions\UpdateMailingList\UpdateMailingListRequest', $createMailingListRequest);
		$this->assertEquals($createMailingListRequest->Name, 'Name');
		$this->assertEquals($createMailingListRequest->ConfirmationPage, 'http://confirmation-page.com');
		$this->assertEquals($createMailingListRequest->RedirectAfterUnsubscribePage, 'http://redirect-after-unsubscribe-page.com');
	}
}