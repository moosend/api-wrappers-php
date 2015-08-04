<?php
namespace moosend\Actions\CreateDraft;

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;

class CreateDraftAction extends AbstractAction {
	public function __construct($client, $endpoint, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/campaigns/create.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}