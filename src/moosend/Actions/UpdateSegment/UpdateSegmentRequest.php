<?php
namespace moosend\Actions\UpdateSegment;

class UpdateSegmentRequest {
	public $name;
	public $matchType;

	public function __construct($name, $matchType) {
		$this->name = $name;
		$this->matchType = $matchType;
	}
}