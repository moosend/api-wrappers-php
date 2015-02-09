<?php
namespace moosend\Actions\LinkActivity;

use moosend\Models\ActivityByLocation;

class LinkActivityResponse  extends \ArrayObject{
	
	public function __construct($jsonData) {
		foreach ($jsonData['Analytics'] as $data) {
			$entry = ActivityByLocation::withJSON($data);
			$this->append($entry);
		}
	}
}
