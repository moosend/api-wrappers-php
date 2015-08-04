<?php
namespace moosend\Actions\ActiveMailingLists;

require_once __DIR__.'/../../Actions/ActiveMailingLists/ActiveMailingListsResponse.php';

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class ActiveMailingListsAction extends AbstractAction {
	public function __construct($client, $endpoint, $page, $pageSize, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, "/lists/{$page}/{$pageSize}.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return new ActiveMailingListsResponse($jsonData);
	}
}