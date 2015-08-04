<?php
namespace moosend\Actions\RemoveMultipleSubscribers;

require_once __DIR__.'/RemoveMultipleSubscribersResponse.php';

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\HttpClient;

class RemoveMultipleSubscribersAction extends AbstractAction {
	public function __construct(HttpClient $client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/subscribers/' . $mailingListID . '/remove_many.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return RemoveMultipleSubscribersResponse::withJSON($jsonData);
	}
}