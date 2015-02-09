<?php
namespace moosend\Actions\CreateSegment;

require_once __DIR__.'/../../Actions/AbstractAction.php';

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;
use moosend\HttpClient;

class CreateSegmentAction extends AbstractAction {
	public function __construct(HttpClient $httpClient, $endpoint ,$mailingListID, $apiKey) {
		$callContext = new CallContext($httpClient, 'POST', $endpoint, "/lists/{$mailingListID}/segments/create.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}