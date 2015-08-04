<?php
namespace moosend\Actions\DeleteMailingList;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class DeleteMailingListAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'DELETE', $endpoint, '/lists/' . $mailingListID . '/delete.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}