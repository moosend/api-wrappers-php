<?php
namespace moosend\Actions\CampaignSummary;

require_once __DIR__.'/../../Models/CampaignSummary.php';

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;
use moosend\Models\CampaignSummary;

class CampaignSummaryAction extends AbstractAction {
	public function __construct($client, $endpoint, $campaignID, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, '/campaigns/' . $campaignID . '/view_summary.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return CampaignSummary::withJSON($jsonData);
	}
}