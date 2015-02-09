<?php
namespace moosend\Actions\AddMultipleSubscribers;

require_once __DIR__.'/AddMultipleSubscribersResponse.php';

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\HttpClient;
use moosend\Models\Subscriber;

class AddMultipleSubscribersAction extends AbstractAction {
	public function __construct(HttpClient $client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/subscribers/' . $mailingListID . '/subscribe_many.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return new AddMultipleSubscribersResponse($jsonData);
	}
}