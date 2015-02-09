<?php
namespace moosend\Actions\AllSenders;

require_once __DIR__.'/../../Actions/AbstractAction.php';
require_once __DIR__.'/../../Models/CallContext.php'; 
require_once __DIR__.'/AllSendersResponse.php';

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;
use moosend\HttpClient;

class AllSendersAction extends AbstractAction {
	public function __construct(HttpClient $httpClient, $endpoint, $apiKey) {
		$callContext = new CallContext($httpClient, 'GET', $endpoint, '/senders/find_all.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return new AllSendersResponse($jsonData);
	}
}