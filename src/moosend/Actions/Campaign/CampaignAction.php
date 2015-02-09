<?php
namespace moosend\Actions\Campaign;

require_once __DIR__.'/../../Actions/AbstractAction.php';
require_once __DIR__.'/../../Models/CallContext.php'; 
require_once __DIR__.'/../../Models/Campaign.php';

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;
use moosend\Models\Campaign;
use moosend\HttpClient;

class CampaignAction extends AbstractAction {
	public function __construct(HttpClient $httpClient, $endpoint, $campaignID, $apiKey) {
		$callContext = new CallContext($httpClient, 'GET', $endpoint, '/campaigns/' . $campaignID . '/view.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return Campaign::withJSON($jsonData);
	}
}