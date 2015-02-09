<?php
namespace moosend\Actions\SegmentDetails;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\Models\Segment;

class SegmentDetailsAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $segmentID, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, "/lists/{$mailingListID}/segments/{$segmentID}/details.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return Segment::withJSON($jsonData);
	}
}