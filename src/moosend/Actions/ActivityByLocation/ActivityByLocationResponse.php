<?php
namespace moosend\Actions\ActivityByLocation;

require_once __DIR__.'/../../Models/ActivityByLocation.php';

use moosend\Models\ActivityByLocation;

class ActivityByLocationResponse  extends \ArrayObject{
	
	public function __construct($jsonData) {
		foreach ($jsonData['Analytics'] as $data) {
			$entry = ActivityByLocation::withJSON($data);
			$this->append($entry);
		}
	}
}
