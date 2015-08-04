<?php
namespace moosend\Actions\CloneCampaign;

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;
use moosend\Models\Campaign;

class CloneAction extends AbstractAction {
	public function __construct($client, $endpoint, $campaignID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/campaigns/' . $campaignID . '/clone.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return  Campaign::withJSON($jsonData);
	}
}