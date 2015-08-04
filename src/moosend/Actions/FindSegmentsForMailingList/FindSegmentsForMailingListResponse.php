<?php
namespace moosend\Actions\FindSegmentsForMailingList;

require_once __DIR__.'/../../Models/Segment.php';

use moosend\Models\Segment;

class FindSegmentsForMailingListResponse  extends \ArrayObject {
	public function __construct(array $jsonData) {
		foreach ($jsonData['Segments'] as $segment) {
			$entry = Segment::withJSON($segment);
			$this->append($entry);
		}
	}
}
