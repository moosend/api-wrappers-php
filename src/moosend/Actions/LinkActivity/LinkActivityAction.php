<?php
namespace moosend\Actions\LinkActivity;

require_once __DIR__.'/LinkActivityResponse.php';

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;

class LinkActivityAction extends AbstractAction {
	public function __construct($client, $endpoint, $campaignID, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, '/campaigns/' . $campaignID . '/stats/links.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return new LinkActivityResponse($jsonData);
	}
}