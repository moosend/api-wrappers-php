<?php
namespace moosend\Actions\DeleteSegment;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;

class DeleteSegmentAction extends AbstractAction {
	public function __construct($client, $endpoint, $mailingListID, $segmentID, $apiKey) {
		$callContext = new CallContext($client, 'DELETE', $endpoint, "/lists/{$mailingListID}/segments/{$segmentID}/delete.json", $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}