<?php
namespace moosend\Actions\SegmentSubscribers;

require_once __DIR__.'/SegmentSubscribersResponse.php';

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class SegmentSubscribersAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $segmentID, $apiKey) {
		$callContext = new CallContext($client, 'GET', $endpoint, "/lists/{$mailingListID}/segments/{$segmentID}/members.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return new SegmentSubscribersResponse($jsonData);
	}
}