<?php
namespace moosend\Models;

require_once __DIR__.'/CustomFieldDefinition.php';

class MailingList {
	private $ID;
	private $Name;
	private $ActiveMemberCount;
	private $BouncedMemberCount;
	private $RemovedMemberCount;
	private $UnsubscribedMemberCount;
	private $Status;
	private $CustomFieldsDefinition;
	private $CreatedBy;
	private $CreatedOn;
	private $UpdatedBy;
	private $UpdatedOn;
	private $ImportOperation;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\MailingList
	 */
	public static function withJSON($jsonData) {
		$instance = new self();

		if (!is_null($jsonData)) {
			$instance->ID = $jsonData['ID'];
			$instance->Name= $jsonData['Name'];
			$instance->ActiveMemberCount = $jsonData['ActiveMemberCount'];
			$instance->BouncedMemberCount = $jsonData['BouncedMemberCount'];
			$instance->RemovedMemberCount = $jsonData['RemovedMemberCount'];
			$instance->UnsubscribedMemberCount = $jsonData['UnsubscribedMemberCount'];
			$instance->Status = $jsonData['Status'];
			
			$instance->CustomFieldsDefinition = array();
			foreach ($jsonData['CustomFieldsDefinition'] as $customFieldDefinition) {
				$entry = CustomFieldDefinition::withJSON($customFieldDefinition);
				array_push($instance->CustomFieldsDefinition, $entry);
			}
			
			$instance->CreatedBy = $jsonData['CreatedBy'];
			$instance->CreatedOn = $jsonData['CreatedOn'];
			$instance->UpdatedBy = $jsonData['UpdatedBy'];
			$instance->UpdatedOn = $jsonData['UpdatedOn'];
			$instance->ImportOperation = $jsonData['ImportOperation'];
		}
		
		return $instance;
	}
	
	public function getID() {
		return $this->ID;
	}

	public function getName() {
		return $this->Name;
	}
	
	public function getActiveMemberCount() {
		return $this->ActiveMemberCount;
	}
	
	public function getBouncedMemberCount() {
		return $this->BouncedMemberCount;
	}
	
	public function getRemovedMemberCount() {
		return $this->RemovedMemberCount;
	}
	
	public function getUnsubscribedMemberCount() {
		return $this->UnsubscribedMemberCount;
	}
	
	public function getStatus() {
		return $this->Status;
	}
	
	public function getCustomFieldsDefinition() {
		return $this->CustomFieldsDefinition;
	}
	
	public function getCreatedBy() {
		return $this->CreatedBy;
	}
	
	public function getCreatedOn() {
		return $this->CreatedOn;
	}
	
	public function getUpdatedBy() {
		return $this->UpdatedBy;
	}
	
	public function getUpdatedOn() {
		return $this->UpdatedOn;
	}
	
	public function getImportOperation() {
		return $this->ImportOperation;
	}
}