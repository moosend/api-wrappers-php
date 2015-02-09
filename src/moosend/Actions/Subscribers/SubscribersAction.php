<?php
namespace moosend\Actions\Subscribers;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

require_once __DIR__.'/SubscribersResponse.php';

class SubscribersAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, '/lists/' . $mailingListID . '/subscribers.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return new SubscribersResponse($jsonData);
	}
}