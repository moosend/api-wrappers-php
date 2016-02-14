<?php
class AnalyticsDetails {
	public $Context;
	public $ContextName;
	public $TotalCount;
	public $UniqueCount;
	public $ContextDescription;
	
	public static function withJSON($jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
			$instance->Context = $jsonData['Context'];
			$instance->ContextName = $jsonData['ContextName'];
			$instance->TotalCount = $jsonData['TotalCount'];
			$instance->UniqueCount = $jsonData['UniqueCount'];
			$instance->ContextDescription = $jsonData['ContextDescription'];
		}
		
		return $instance;
	}
}