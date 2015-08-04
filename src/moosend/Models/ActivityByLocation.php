<?php
namespace moosend\Models;

class ActivityByLocation {
	public $Context;
	public $ContextName;
	public $TotalCount;
	public $UniqueCount;
	public $ContextDescription;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\ActivityByLocation
	 */
	public static function withJSON($jsonData) {
		$instance = new self();
		
		$instance->Context = $jsonData['Context'];
		$instance->ContextName = $jsonData['ContextName'];
		$instance->TotalCount = $jsonData['TotalCount'];
		$instance->UniqueCount = $jsonData['UniqueCount'];
		$instance->ContextDescription = $jsonData['ContextDescription'];
	
		return $instance;
	}

	public function getContext() {
		return $this->Context;
	}
	
	public function getContextName() {
		return $this->ContextName;
	}
	
	public function getTotalCount() {
		return $this->TotalCount;
	}
	
	public function getUniqueCount() {
		return $this->UniqueCount;
	}
	
	public function getContextDescription() {
		return $this->ContextDescription;
	}
	
}