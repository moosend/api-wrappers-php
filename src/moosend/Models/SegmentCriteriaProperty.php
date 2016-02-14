<?php
namespace moosend\Models;

class SegmentCriteriaProperty {
	public $ID;
	public $Name;
	public $Comparer;
	public $Value;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\SegmentCriteriaProperty
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
	
		if (isset($jsonData)) {
			$instance->ID = $jsonData['ID'];
			$instance->Name = $jsonData['Name'];
			$instance->Comparer = $jsonData['Comparer'];
			$instance->Value = $jsonData['Value'];
		}
	
		return $instance;
	}
}