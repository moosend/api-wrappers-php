<?php
namespace moosend\Actions\AddSubscriber;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\HttpClient;
use moosend\Models\Subscriber;

class AddSubscriberAction extends AbstractAction {
	public function __construct(HttpClient $client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/subscribers/' . $mailingListID . '/subscribe.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return Subscriber::withJSON($jsonData);
	}
}