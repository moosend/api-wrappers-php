<?php
namespace moosend\Actions\CreateCustomField;

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;

class CreateCustomFieldAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/lists/' . $mailingListID . '/customfields/create.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return  $jsonData;
	}
}