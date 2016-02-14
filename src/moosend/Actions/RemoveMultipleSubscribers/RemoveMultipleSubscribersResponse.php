<?php
namespace moosend\Actions\RemoveMultipleSubscribers;

class RemoveMultipleSubscribersResponse  {
	public $EmailsIgnored;
	public $EmailsProcessed;
	
	public static function withJSON(array $jsonData) {
		$instance = new self();
		
		$instance->EmailsIgnored = $jsonData['EmailsIgnored'];
		$instance->EmailsProcessed = $jsonData['EmailsProcessed'];
		
		return $instance;
	}
}
