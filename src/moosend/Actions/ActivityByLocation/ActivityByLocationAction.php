<?php
namespace moosend\Actions\ActivityByLocation;

require_once __DIR__.'/ActivityByLocationResponse.php';

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;

class ActivityByLocationAction extends AbstractAction {
	public function __construct($client, $endpoint, $campaignID, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, '/campaigns/' . $campaignID . '/stats/countries.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return new ActivityByLocationResponse($jsonData);
	}
}