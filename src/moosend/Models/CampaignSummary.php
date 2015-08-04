<?php
namespace moosend\Models;

class CampaignSummary {
	private $ID;
	private $ABVersion;
	private $CampaignID;
	private $CampaignName;
	private $MailingListID;
	private $MailingListName;
	private $CampaignDeliveredOn;
	private $To;
	private $From;
	private $TotalOpens;
	private $UniqueOpens;
	private $TotalBounces;
	private $TotalForwards;
	private $UniqueForwards;
	private $TotalUnsubscribes;
	private $TotalLinkClicks;
	private $UniqueLinkClicks;
	private $Sent;
	private $CampaignIsArchived;
	private $TotalComplaints;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\CampaignSummary
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
	
		$instance->ID = $jsonData['ID'];
		$instance->ABVersion = $jsonData['ABVersion'];
		$instance->CampaignID = $jsonData['CampaignID'];
		$instance->CampaignName = $jsonData['CampaignName'];
		$instance->MailingListID = $jsonData['MailingListID'];
		$instance->MailingListName = $jsonData['MailingListName'];
		$instance->CampaignDeliveredOn = $jsonData['CampaignDeliveredOn'];
		$instance->To = $jsonData['To'];
		$instance->From = $jsonData['From'];
		$instance->TotalOpens = $jsonData['TotalOpens'];
		$instance->UniqueOpens = $jsonData['UniqueOpens'];
		$instance->TotalBounces = $jsonData['TotalBounces'];
		$instance->TotalForwards = $jsonData['TotalForwards'];
		$instance->UniqueForwards = $jsonData['UniqueForwards'];
		$instance->TotalUnsubscribes = $jsonData['TotalUnsubscribes'];
		$instance->TotalLinkClicks = $jsonData['TotalLinkClicks'];
		$instance->UniqueLinkClicks = $jsonData['UniqueLinkClicks'];
		$instance->Sent = $jsonData['Sent'];
		$instance->CampaignIsArchived = $jsonData['CampaignIsArchived'];
		$instance->TotalComplaints = $jsonData['TotalComplaints'];
	
		return $instance;
	}
	
	public function getID() {
		return $this->ID;
	}
	
	public function getABVersion() {
		return $this->ABVersion;
	}
	
	public function getCampaignID() {
		return $this->CampaignID;
	}
	
	public function getCampaignName() {
		return $this->CampaignName;
	}
	
	public function getMailingListID() {
		return $this->MailingListID;
	}
	
	public function getMailingListName() {
		return $this->MailingListName;
	}
	
	public function getCampaignDeliveredOn() {
		return $this->CampaignDeliveredOn;
	}
	
	public function getTo() {
		return $this->To;
	}

	public function getFrom() {
		return $this->From;
	}
	
	public function getTotalOpens() {
		return $this->TotalOpens;
	}
	

	public function getUniqueOpens() {
		return $this->UniqueOpens;
	}
	

	public function getTotalBounces() {
		return $this->TotalBounces;
	}
	

	public function getTotalForwards() {
		return $this->TotalForwards;
	}
	

	public function getUniqueForwards() {
		return $this->UniqueForwards;
	}
	

	public function getTotalUnsubscribes() {
		return $this->TotalUnsubscribes;
	}
	

	public function getTotalLinkClicks() {
		return $this->TotalLinkClicks;
	}
	
	public function getUniqueLinkClicks() {
		return $this->UniqueLinkClicks;
	}
	
	public function getSent() {
		return $this->Sent;
	}
	
	public function getCampaignIsArchived() {
		return $this->CampaignIsArchived;
	}
	
	public function getTotalComplaints() {
		return $this->TotalComplaints;
	}
}