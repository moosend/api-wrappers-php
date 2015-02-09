<?php
namespace moosend\Actions\CreateSegment;

class CreateSegmentRequest {
	public $name;
	
	/**
	 * 
	 * @var string $matchType Specifies how the segment's criteria will match together. This must be one of the following values:
	 * 'All' : only subscribers that match all given criteria will be returned by the segment
	 * 'Any' : subscribers that match any of the given criteria will be returned by the segment
	 * If not specified, All will be assumed
	 */
	public $matchType;

	public function __construct(/* string */ $name, /* string */ $matchType) {
		$this->name = $name;
		$this->matchType = $matchType;
	}
}