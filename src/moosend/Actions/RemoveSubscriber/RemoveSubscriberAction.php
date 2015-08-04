<?php
namespace moosend\Actions\RemoveSubscriber;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\HttpClient;

class RemoveSubscriberAction extends AbstractAction {
	public function __construct(HttpClient $client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/subscribers/' . $mailingListID . '/remove.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}