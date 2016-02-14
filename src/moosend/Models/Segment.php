<?php
namespace moosend\Models;

require_once __DIR__.'/SegmentCriteria.php';

class Segment {
	public $ID;
	public $Name;
	
	/**
	 * Specifies how the segment's criteria will match together. This must be one of the following values:
	 * 'All' : only subscribers that match all given criteria will be returned by the segment
	 * 'Any' : subscribers that match any of the given criteria will be returned by the segment
	 * If not specified, All will be assumed.
	 * @var $MatchType
	 */
	public $MatchType;
	
	public $Criteria;
	public $CreatedBy;
	public $CreatedOn;
	public $UpdatedBy;
	public $UpdatedOn;
	public $FetchType;
	public $FetchValue;
	public $Description;
	public $MailingListId;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\Segment
	 */
	public static function withJSON($jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
			$instance->ID = $jsonData['ID'];
			$instance->Name = $jsonData['Name'];
			$instance->MatchType = $jsonData['MatchType'];
			
			if (isset($jsonData['Criteria'])) {
				$instance->Criteria = array();
				foreach ($jsonData['Criteria'] as $segmentCriteria) {
					$entry = SegmentCriteria::withJSON($segmentCriteria);
					array_push($instance->Criteria, $entry);
				}
			}
			
			$instance->CreatedBy = $jsonData['CreatedBy'];
			$instance->CreatedOn = $jsonData['CreatedOn'];
			$instance->UpdatedBy = $jsonData['UpdatedBy'];
			$instance->UpdatedOn = $jsonData['UpdatedOn'];
			$instance->FetchType = $jsonData['FetchType'];
			$instance->FetchValue = $jsonData['FetchValue'];
			$instance->Description = $jsonData['Description'];
		}
		
		return $instance;	
	}
}