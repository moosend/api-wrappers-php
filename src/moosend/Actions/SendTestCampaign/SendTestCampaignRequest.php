<?php
namespace moosend\Actions\SendTestCampaign;

class SendTestCampaignRequest {
	public  $TestEmails;
	
	function __construct(array $emails) {	
		foreach ($emails as $email) {
			$this->TestEmails .= $email . ',';
		}
	}
}