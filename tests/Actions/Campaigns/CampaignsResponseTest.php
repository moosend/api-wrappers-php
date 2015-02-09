<?php
namespace tests\Actions\Campaigns;

use moosend\Actions\Campaigns\CampaignsResponse;
class CampaignsResponseTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test CampaignsResponse constructor
	 * @group CampaignsResponseTest
	 * @covers moosend\Actions\Campaigns\CampaignsResponse::__construct
	 */
	public function test_Can_Create_CampaignsResponse_Instance() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getCampaignsRawJsonResponse.html'), true)['Context'];	
		$campaignResponse = new CampaignsResponse($jsonData);
	
		$this->assertInstanceOf('moosend\Actions\Campaigns\CampaignsResponse', $campaignResponse);
	}
}