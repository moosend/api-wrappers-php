<?php
class CampaignSummaryMailingListDetails {
	public $Id;
	public $Name;
	public $ActiveMemberCount;
	public $BouncedMemberCount;
	public $RemovedMemberCount;
	public $UnsubscribedMemberCount;
	public $Status;
	public $CustomFieldsDefinition;
	public $CreatedBy;
	public $CreatedOn;
	public $UpdatedBy;
	public $UpdatedOn;
	
	public static function withJSON(array $jsonData) {
		$instance = new self ();
		
		if (isset($jsonData)) {
			$instance->Id = $jsonData ['ID'];
			$instance->Name = $jsonData ['Name'];
			$instance->ActiveMemberCount = $jsonData ['ActiveMemberCount'];
			$instance->BouncedMemberCount = $jsonData ['BouncedMemberCount'];
			$instance->RemovedMemberCount = $jsonData ['RemovedMemberCount'];
			$instance->UnsubscribedMemberCount = $jsonData ['UnsubscribedMemberCount'];
			$instance->Status = $jsonData ['Status'];
			
			$instance->CustomFieldsDefinition = array();
			foreach ($jsonData['CustomFieldsDefinition'] as $customFieldDefinition) {
				$entry = CustomFieldDefinition::withJSON($customFieldDefinition);
				array_push($instance->CustomFieldsDefinition, $entry);
			}
			
			$instance->CreatedBy = $jsonData ['CreatedBy'];
			$instance->CreatedOn = $jsonData ['CreatedOn'];
			$instance->UpdatedBy = $jsonData ['UpdatedBy'];
			$instance->UpdatedOn = $jsonData ['UpdatedOn'];
		}
	
		return $instance;
	}
}