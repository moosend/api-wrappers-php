<?php
namespace moosend\Models;

class Sender {
	public $ID;
	public $Name;
	public $Email;
	public $CreatedOn;
	public $IsEnabled;
	public $SpfVerified;
	public $DkimVerified;
	public $DkimPublic;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\Sender
	 */
	public static function withJSON($jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
			$instance->ID = $jsonData['ID'];
			$instance->Name = $jsonData['Name'];
			$instance->Email = $jsonData['Email'];
			$instance->CreatedOn = $jsonData['CreatedOn'];
			$instance->IsEnabled = $jsonData['IsEnabled'];
			$instance->SpfVerified = $jsonData['SpfVerified'];
			$instance->DkimVerified = $jsonData['DkimVerified'];
			$instance->DkimPublic = $jsonData['DkimPublic'];
		}
		
		return $instance;
	}
}