<?php
namespace moosend\Actions\UpdateMailingList;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\Models\MailingList;

class UpdateMailingListAction extends AbstractAction {
	public function __construct($client, $endpoint, /* string */ $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, '/lists/' . $mailingListID . '/update.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}