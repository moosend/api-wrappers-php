<?php
namespace moosend\Actions\FindSegmentsForMailingList;

require_once __DIR__.'/../../Models/Segment.php';

use moosend\Models\Segment;

class FindSegmentsForMailingListResponse  extends \ArrayObject {
	public $Paging;
	public $Segments;
	
	public function __construct(array $jsonData, $mailingListId) {
		$this->Paging = \Paging::withJSON($jsonData['Paging']);;
		
		$this->Segments = array();
		foreach ($jsonData['Segments'] as $segment) {
 			$entry = Segment::withJSON($segment);
 			$entry->MailingListId = $mailingListId;
 			array_push($this->Segments, $entry);
		}		
	}
}
