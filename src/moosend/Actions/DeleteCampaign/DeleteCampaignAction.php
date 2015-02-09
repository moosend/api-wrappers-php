<?php
namespace moosend\Actions\DeleteCampaign;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class DeleteCampaignAction extends AbstractAction {
	public function __construct($client, $endpoint, $campaignID, $apiKey) {
		$callContext = new CallContext($client, 'DELETE', $endpoint, '/campaigns/' . $campaignID . '/delete.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}