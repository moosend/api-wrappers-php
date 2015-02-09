<?php
namespace moosend\Models;

require_once __DIR__.'/SegmentCriteria.php';

class Segment {
	private $ID;
	private $Name;
	
	/**
	 * Specifies how the segment's criteria will match together. This must be one of the following values:
	 * 'All' : only subscribers that match all given criteria will be returned by the segment
	 * 'Any' : subscribers that match any of the given criteria will be returned by the segment
	 * If not specified, All will be assumed.
	 * @var $MatchType
	 */
	private $MatchType;
	
	private $Criteria;
	private $CreatedBy;
	private $CreatedOn;
	private $UpdatedBy;
	private $UpdatedOn;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\Segment
	 */
	public static function withJSON($jsonData) {
		$instance = new self();
		
		$instance->ID = $jsonData['ID'];
		$instance->Name = $jsonData['Name'];
		$instance->MatchType = $jsonData['MatchType'];
		
		$instance->Criteria = array();
		foreach ($jsonData['Criteria'] as $SegmentCriteria) {
			$entry = SegmentCriteria::withJSON($SegmentCriteria);
			array_push($instance->Criteria, $entry);
		}
		
		$instance->CreatedBy = $jsonData['CreatedBy'];
		$instance->CreatedOn = $jsonData['CreatedOn'];
		$instance->UpdatedBy = $jsonData['UpdatedBy'];
		$instance->UpdatedOn = $jsonData['UpdatedOn'];
		
		return $instance;	
	}
	
	public function getID() {
		return $this->ID;
	}
	
	public function getName() {
		return $this->Name;
	}
	
	public function setName(/* string */ $name) {
		$this->Name = $name;
		return $this;
	}
	
	public function getMatchType() {
		return $this->MatchType;
	}
	
	// matchType values
	// Used in a segment to return the members in a mailing list that match all the given criteria: All = 0
	// Used in a segment to return the members in a mailing list that match any of the given criteria: Any = 1
	public function setMatchType(/* int */ $matchType) {
		$this->MatchType = $matchType;
		return $this->MatchType;
	}
	
	public function getCriteria() {
		return $this->Criteria;
	}
	
	public function getCreatedBy() {
		return $this->CreatedBy;
	}
	
	public function getCreatedOn() {
		return $this->CreatedOn;
	}
	
	public function getUpdatedBy() {
		return $this->UpdatedBy;
	}
	
	public function getUpdatedOn() {
		return $this->UpdatedOn;
	}
}