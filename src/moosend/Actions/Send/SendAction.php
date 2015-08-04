<?php
namespace moosend\Actions\Send;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\HttpClient;

class SendAction extends AbstractAction {
	public function __construct(HttpClient $client, $endpoint, $campaignID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/campaigns/' . $campaignID .'/send.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}