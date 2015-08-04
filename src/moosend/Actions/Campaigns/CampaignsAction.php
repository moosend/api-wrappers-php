<?php
namespace moosend\Actions\Campaigns;

require_once __DIR__.'/CampaignsResponse.php';

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;
use moosend\HttpClient;

class CampaignsAction extends AbstractAction {
	public function __construct(HttpClient $httpClient, $endpoint, $page, $pageSize, $apiKey) {
		$callContext = new CallContext($httpClient, 'GET', $endpoint, "/campaigns/{$page}/{$pageSize}.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {	
		return new CampaignsResponse($jsonData);
	}
}