<?php
namespace moosend\Actions\RemoveCriteria;

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;

class RemoveCriteriaAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $segmentID, $criteriaID, $apiKey) {
		$callContext = new CallContext($client, 'DELETE', $endpoint, "/lists/{$mailingListID}/segments/{$segmentID}/criteria/{$criteriaID}/delete.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}