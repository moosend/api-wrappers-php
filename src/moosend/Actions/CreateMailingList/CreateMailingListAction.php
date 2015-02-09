<?php
namespace moosend\Actions\CreateMailingList;

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;

class CreateMailingListAction extends AbstractAction {
	public function __construct($client, $endpoint, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/lists/create.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}