<?php
namespace moosend\Actions\AddCriteria;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class AddCriteriaAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $segmentID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, "/lists/{$mailingListID}/segments/{$segmentID}/criteria/add.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}