<?php
namespace moosend\Models;

require_once __DIR__.'/CustomFieldDefinition.php';

class MailingList {
	public $ID;
	public $Name;
	public $ActiveMemberCount;
	public $BouncedMemberCount;
	public $RemovedMemberCount;
	public $UnsubscribedMemberCount;
	
	/**
	 * @var int 
	 * 0: 'Created' 
	 * 1: 'Imported'
	 * 2: 'Importing'
	 * 3: 'Deleting'
	 */
	public $Status;
	
	public $CustomFieldsDefinition;
	public $CreatedBy;
	public $CreatedOn;
	public $UpdatedBy;
	public $UpdatedOn;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\MailingList
	 */
	public static function withJSON($jsonData) {
		$instance = new self();

		if (isset($jsonData)) {
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
		}
		
		return $instance;
	}
}