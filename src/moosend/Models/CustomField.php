<?php
namespace moosend\Models;

class CustomField {
	private $name;
	private $value;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\CustomField
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
		$instance->name = $jsonData['Name'];
		$instance->value = $jsonData['Value'];
	
		return $instance;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->Name = $name;
		return $this;
	}
	
	public function getValue() {
		return $this->value;
	}
	
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
}