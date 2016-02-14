<?php
namespace moosend\Models;

require_once __DIR__.'/CustomField.php';

class Subscriber {
	public $ID;
	public $Name;
	public $Email;
	public $CreatedOn;
	public $UpdatedOn;
	public $UnsubscribedOn;
	public $UnsubscribedFromID;
	public $SubscribeMethod;
	public $RemovedOn;
	
	/**
	 * @var int $SubscribeType
	 * 1: 'Subscribed', Represents an active member.
	 * 2: Unsubscribed, Represents an unsubscribed member.
	 * 3: 'Bounced', Represents a member that has bounced on a previously sent campaign and is probably not valid.
	 * 4: 'Removed'Represents a removed member pending deletion from our database.
	 */
	public $SubscribeType;
	public $CustomFields;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\Subscriber
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
			$instance->ID = $jsonData['ID'];
			$instance->Name = $jsonData['Name'];
			$instance->Email = $jsonData['Email'];
			$instance->CreatedOn = $jsonData['CreatedOn'];
			$instance->UpdatedOn = $jsonData['UpdatedOn'];
			$instance->UnsubscribedOn = $jsonData['UnsubscribedOn'];
			$instance->UnsubscribedFromID = $jsonData['UnsubscribedFromID'];
			$instance->SubscribeType = $jsonData['SubscribeType'];
			
			$instance->CustomFields = array();
			foreach ($jsonData['CustomFields'] as $field) {
				$customField = CustomField::withJSON($field);
				array_push($instance->CustomFields, $customField);
			}
			
			$instance->SubscribeMethod = $jsonData['SubscribeMethod'];
			$instance->RemovedOn = $jsonData['RemovedOn'];
		}
		
		return $instance;
	}
}