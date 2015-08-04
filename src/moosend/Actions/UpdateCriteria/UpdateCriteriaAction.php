<?php
namespace moosend\Actions\UpdateCriteria;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class UpdateCriteriaAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $segmentID, $criteriaID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, "/lists/{$mailingListID}/segments/{$segmentID}/criteria/{$criteriaID}/update.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}