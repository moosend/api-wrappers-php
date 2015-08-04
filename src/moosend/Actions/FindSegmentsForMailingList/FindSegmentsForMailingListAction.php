<?php
namespace moosend\Actions\FindSegmentsForMailingList;

require_once __DIR__.'/FindSegmentsForMailingListResponse.php';

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class FindSegmentsForMailingListAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, "/lists/{$mailingListID}/segments.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return new FindSegmentsForMailingListResponse($jsonData);
	}
}