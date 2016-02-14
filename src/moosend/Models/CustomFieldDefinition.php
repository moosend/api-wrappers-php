<?php
namespace moosend\Models;

class CustomFieldDefinition implements \JsonSerializable{
	public $ID;
	public $Name;
	public $Context;
	
	/**
	 * @var bool $isRequired 
	 * Specify whether this is field will be mandatory on not, when being used in a subscription form.
	 * You should specify a value of either truetrue or false. If ommitted, false will be assumed.
	 */
	public $IsRequired;
	
	/**
	 * Type values
	 * Text = 0, Number = 1, DateTime = 2, SingleSelectDropdown = 3, CheckBox = 5
	 * @var int $Type
	 */
	public $Type;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\CustomFieldDefinition
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
			$instance->ID = $jsonData['ID'];
			$instance->Name = $jsonData['Name'];
			$instance->Context = $jsonData['Context'];
			$instance->IsRequired = $jsonData['IsRequired'];
			$instance->Type = $jsonData['Type'];
		}
	
		return $instance;
	}
	
	public function JsonSerialize() {
		$vars = get_object_vars($this);
	
		return $vars;
	}
}