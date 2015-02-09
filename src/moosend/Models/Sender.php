<?php
namespace moosend\Models;

class Sender {
	private $ID;
	private $Name;
	private $Email;
	private $CreatedOn;
	private $IsEnabled;
	private $SpfVerified;
	private $DkimVerified;
	private $DkimPublic;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\Sender
	 */
	public static function withJSON($jsonData) {
		$instance = new self();
		
		$instance->ID = $jsonData['ID'];
		$instance->Name = $jsonData['Name'];
		$instance->Email = $jsonData['Email'];
		$instance->CreatedOn = $jsonData['CreatedOn'];
		$instance->IsEnabled = $jsonData['IsEnabled'];
		$instance->SpfVerified = $jsonData['SpfVerified'];
		$instance->DkimVerified = $jsonData['DkimVerified'];
		$instance->DkimPublic = $jsonData['DkimPublic'];
		
		return $instance;
	}

	public function getID() {
		return $this->ID;
	}
	
	public function setID($ID) {
		$this->ID = $ID;
		return $this;
	}
	
	public function getName() {
		return $this->Name;
	}
	
	public function setName($name) {
		$this->Name = $name;
		return $this;
	}
	
	public function getEmail() {
		return $this->Email;
	}
	
	public function setEmail($email) {
		$this->Email = $email;
		return $this;
	}
	
	public function getCreatedOn() {
		return $this->CreatedOn;
	}
	
	public function setCreatedOn($createdOn) {
		$this->CreatedOn = $createdOn;
		return $this;
	}
	
	public function getIsEnabled() {
		return $this->IsEnabled;
	}
	
	public function  setIsEnabled($isEnabled) {
		$this->IsEnabled = $isEnabled;
		return $this;
	}
	
	public function getSpfVerified() {
		return $this->SpfVerified;
	}
	
	public function  setSpfVerified($spfVerified) {
		$this->SpfVerified = $spfVerified;
		return $this;
	}
	
	public function getDkimVerified() {
		return $this->DkimVerified;
	}
	
	public function getDkimPublic() {
		return $this->DkimPublic;
	}
}