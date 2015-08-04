<?php
namespace moosend\Actions\UpdateCustomField;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class UpdateCustomFieldAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $customFieldID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, "/lists/{$mailingListID}/customfields/{$customFieldID}/update.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}