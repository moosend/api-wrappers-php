<?php
namespace moosend\Actions\SendTestCampaign;

use moosend\HttpClient;
use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class SendTestCampaignAction extends AbstractAction {
	function __construct(HttpClient $client, $endpoint, $campaignID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/campaigns/' . $campaignID .'/send_test.json', $apiKey);
		parent::__construct($callContext);
	}
	
	public function onParse($jsonData) {
		return $jsonData;
	}
}
