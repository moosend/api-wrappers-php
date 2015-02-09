<?php
namespace tests\Actions\CreateMailingList;

use moosend\Actions\CreateMailingList\CreateMailingListRequest;

class CreateMailingListRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test CreateMailingListRequest constructor.
	 * @group CreateMailingListRequestTest
	 * @covers moosend\Actions\CreateMailingList\CreateMailingListRequest::__construct
	 */
	public function test_Can_Create_CreateMailingListRequest_Instance() {
		$createMailingListRequest = new CreateMailingListRequest('Name', 'http://confirmation-page.com', 'http://redirect-after-unsubscribe-page.com');
		$this->assertInstanceOf('moosend\Actions\CreateMailingList\CreateMailingListRequest', $createMailingListRequest);
		$this->assertEquals($createMailingListRequest->Name, 'Name');
		$this->assertEquals($createMailingListRequest->ConfirmationPage, 'http://confirmation-page.com');
		$this->assertEquals($createMailingListRequest->RedirectAfterUnsubscribePage, 'http://redirect-after-unsubscribe-page.com');
	}
}