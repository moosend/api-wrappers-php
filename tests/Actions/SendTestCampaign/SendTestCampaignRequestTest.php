<?php
namespace tests\Actions\SendTestCampaign;


use moosend\Actions\SendTestCampaign\SendTestCampaignRequest;

class SendTestCampaignRequestTest  extends \PHPUnit_Framework_TestCase {
	
	/**
	 * Test if SendTestCampaignRequest constructor.
	 * @group SendTestCampaignRequestTest
	 * @covers moosend\Actions\SendTestCampaign\SendTestCampaignRequest::__construct
	 */
	public function test_Can_Create_SendTestCampaignRequest_Instance() {
		$emails = array('example@example.com', 'email@example.com');
		$request = new SendTestCampaignRequest($emails);
		
		$this->assertInstanceOf('moosend\Actions\SendTestCampaign\SendTestCampaignRequest', $request);
		$this->assertEquals('example@example.com,email@example.com,', $request->TestEmails);
	}
}