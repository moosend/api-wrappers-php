<?php
namespace moosend\Actions\UpdateSegment;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\Models\MailingList;

class UpdateSegmentAction extends AbstractAction {
	public function __construct($client, $endpoint, /* string */ $mailingListID, /* string */ $segmentID, $apiKey) {
		$callContext = new CallContext($client, 'POST', $endpoint, "/lists/{$mailingListID}/segments/{$segmentID}/update.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}