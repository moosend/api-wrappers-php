<?php
namespace moosend\Models;

class SegmentCriteriaProperty {
	private $ID;
	private $Name;
	private $Comparer;
	private $Value;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\SegmentCriteriaProperty
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
	
		$instance->ID = $jsonData['ID'];
		$instance->Name = $jsonData['Name'];
		$instance->Comparer = $jsonData['Comparer'];
		$instance->Value = $jsonData['Value'];
	
		return $instance;
	}
	
	public function getID() {
		return $this->ID;
	}
	
	public function getName() {
		return $this->Name;
	}
	
	public function getComparer() {
		return $this->Comparer;
	}
	
	public function getValue() {
		return $this->Value;
	}
}