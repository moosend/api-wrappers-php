<?php
namespace moosend\Actions\UpdateDraft;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\Models\CampaignParams;
use moosend\Models\Campaign;

class UpdateDraftAction extends AbstractAction {
	public function __construct($client, $endpoint, Campaign $campaign, $apiKey) {
		$campaignID = $campaign->ID;
		$callContext = new CallContext($client, 'POST', $endpoint, '/campaigns/' . $campaignID . '/update.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}