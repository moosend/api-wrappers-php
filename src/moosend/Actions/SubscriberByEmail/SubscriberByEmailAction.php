<?php
namespace moosend\Actions\SubscriberByEmail;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\Models\Subscriber;

class SubscriberByEmailAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, '/subscribers/' . $mailingListID . '/view.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return Subscriber::withJSON($jsonData);
	}
}