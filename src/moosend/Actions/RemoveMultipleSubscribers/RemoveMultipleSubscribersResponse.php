<?php
namespace moosend\Actions\RemoveMultipleSubscribers;

class RemoveMultipleSubscribersResponse  {
	private $EmailsIgnored;
	private $EmailsProcessed;
	
	public static function withJSON(array $jsonData) {
		$instance = new self();
		
		$instance->EmailsIgnored = $jsonData['EmailsIgnored'];
		$instance->EmailsProcessed = $jsonData['EmailsProcessed'];
		
		return $instance;
	}
	
	// @codeCoverageIgnoreStart
	public function getEmailsIgnored() {
		return $this->EmailsIgnored;
	}
	
	public function getEmailsProcessed() {
		return $this->EmailsProcessed;
	}
	// @codeCoverageIgnoreStop
}
