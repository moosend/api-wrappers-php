<?php
namespace moosend\Models;

class SegmentCriteria {
	public $ID;
	public $SegmentID;
	public $Field;
	public $CustomFieldID;
	public $Comparer;
	public $Value;
	public $DateFrom;
	public $DateTo;
	public $Properties;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\SegmentCriteria
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
			$instance->ID = $jsonData['ID'];
			$instance->SegmentID = $jsonData['SegmentID'];
			$instance->Field = $jsonData['Field'];
			$instance->CustomFieldID = $jsonData['CustomFieldID'];
			$instance->Comparer = $jsonData['Comparer'];
			$instance->Value = $jsonData['Value'];
			$instance->DateFrom = $jsonData['DateFrom'];
			$instance->DateTo = $jsonData['DateTo'];
			
			if (isset($jsonData['Properties'])) {
				$instance->Properties = array();
				foreach ($jsonData['Properties'] as $property) {
					$entry = SegmentCriteriaProperty::withJSON($property);
					array_push($instance->Properties, $entry);
				}
			}
		}
	
		return $instance;
	}
}