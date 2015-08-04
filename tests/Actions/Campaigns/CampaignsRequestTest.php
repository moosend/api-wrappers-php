<?php
namespace tests\Actions\Campaigns;

use moosend\Actions\Campaigns\CampaignsRequest;

class CampaignsRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test CampaignsRequest constructor.
	 * @group CampaignsRequestTest
	 * @covers moosend\Actions\Campaigns\CampaignsRequest::__construct
	 */
	public function test_Can_Create_CampaignsRequest_Instance() {
		$campaignsRequest = new CampaignsRequest('Subject', 'DESC');
		$this->assertInstanceOf('moosend\Actions\Campaigns\CampaignsRequest', $campaignsRequest);
		$this->assertEquals($campaignsRequest->SortBy, 'Subject');
		$this->assertEquals($campaignsRequest->SortMethod, 'DESC');
	}
}