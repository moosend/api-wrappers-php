<?php
namespace moosend\Actions\SenderDetails;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\HttpClient;
use moosend\Models\Sender;

class SenderDetailsAction extends AbstractAction {
	public function __construct(HttpClient $client, $endpoint, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, '/senders/find_one.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return Sender::withJSON($jsonData);
	}
}