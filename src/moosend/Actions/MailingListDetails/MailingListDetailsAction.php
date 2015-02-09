<?php
namespace moosend\Actions\MailingListDetails;

require_once __DIR__.'/../../Models/MailingList.php';

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;
use moosend\Models\MailingList;

class MailingListDetailsAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, '/lists/' . $mailingListID . '/details.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return MailingList::withJSON($jsonData);
	}
}