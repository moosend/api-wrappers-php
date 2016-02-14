<?php
namespace moosend\Models;

class CustomField {
	public $Name;
	public $Value;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\CustomField
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
			$instance->Name = $jsonData['Name'];
			$instance->Value = $jsonData['Value'];
		}
	
		return $instance;
	}
}