<?php

namespace moosend\Models;

class CampaignDetails {
		private $ID;
		private $Name;
		private $Subject;
		private $SiteName;
		private $ConfirmationTo;
		private $CreatedOn;
		private $ABHoursToTest;
		private $ABCampaignType;
		private $ABWinnerSelectionType;
		private $Status;
		private $DeliveredOn;
		private $ScheduledFor;
		private $ScheduledForTimezone;
		private $MailingListID;
		private $MailingListName;
		private $SegmentID;
		private $SegmentName;
		private $MailingListStatus;
		private $TotalSent;
		private $TotalOpens;
		private $UniqueOpens;
		private $TotalBounces;
		private $TotalForwards;
		private $UniqueForwards;
		private $TotalLinkClicks;
		private $UniqueLinkClicks;
		private $RecipientsCount;
		private $IsTransactional;
		private $TotalComplaints;
		private $TotalUnsubscribes;
	
        /**
         * Create a new instance and populate its properties with JSON data
         * @param array $jsonData
         * @return \moosend\Models\CampaignDetails
         */
	public static function withJSON($jsonData) {
		$instance = new self();
		
		$instance->ID = $jsonData['ID'];
		$instance->Name = $jsonData['Name'];
		$instance->Subject = $jsonData['Subject'];
		$instance->SiteName = $jsonData['SiteName'];
		$instance->ConfirmationTo = $jsonData['ConfirmationTo'];
		$instance->CreatedOn = $jsonData['CreatedOn'];		
		$instance->ABHoursToTest = $jsonData['ABHoursToTest'];
		$instance->ABCampaignType = $jsonData['ABCampaignType'];
		$instance->ABWinnerSelectionType = $jsonData['ABWinnerSelectionType'];
		$instance->Status = $jsonData['Status'];
		$instance->DeliveredOn = $jsonData['DeliveredOn'];
		$instance->ScheduledFor = $jsonData['ScheduledFor'];
		$instance->ScheduledForTimezone = $jsonData['ScheduledForTimezone'];
		$instance->MailingListID = $jsonData['MailingListID'];
		$instance->MailingListName = $jsonData['MailingListName'];
		$instance->SegmentID = $jsonData['SegmentID'];
		$instance->SegmentName = $jsonData['SegmentName'];
		$instance->MailingListStatus = $jsonData['MailingListStatus'];
		$instance->TotalSent = $jsonData['TotalSent'];
		$instance->TotalOpens = $jsonData['TotalOpens'];
		$instance->UniqueOpens = $jsonData['UniqueOpens'];
		$instance->TotalBounces = $jsonData['TotalBounces'];
		$instance->TotalForwards = $jsonData['TotalForwards'];
		$instance->UniqueForwards = $jsonData['UniqueForwards'];
		$instance->TotalLinkClicks = $jsonData['TotalLinkClicks'];
		$instance->UniqueLinkClicks = $jsonData['UniqueLinkClicks'];
		$instance->RecipientsCount = $jsonData['RecipientsCount'];
		$instance->IsTransactional = $jsonData['IsTransactional'];
		$instance->TotalComplaints = $jsonData['TotalComplaints'];
		$instance->TotalUnsubscribes= $jsonData['TotalUnsubscribes'];
		
		return $instance;
	}
	
	public function getID() {
		return $this->ID;
	}
	
	public function getName() {
		return $this->Name;
	}
	
	public function getSubject() {
		return $this->Subject;
	}
	
	public function getSiteName() {
		return $this->SiteName;
	}
	
	public function getConfirmationTo() {
		return $this->ConfirmationTo;
	}
	
	public function getCreatedOn() {
		return $this->CreatedOn;
	}
	
	public function getABHoursToTest() {
		return $this->ABHoursToTest;
	}
	
	public function getABCampaignType() {
		return $this->ABCampaignType;
	}
	
	public function getABWinnerSelectionType() {
		return $this->ABWinnerSelectionType;
	}
	
	public function getStatus() {
		return $this->Status;
	}
	
	public function getDeliveredOn() {
		return $this->DeliveredOn;
	}
	
	public function getScheduledFor() {
		return $this->ScheduledFor;
	}
	
	public function getScheduledForTimezone() {
		return $this->ScheduledForTimezone;
	}
	
	public function getMailingListID() {
		return $this->MailingListID;
	}
	
	public function getMailingListName() {
		return $this->MailingListName;
	}
	
	public function getSegmentID() {
		return $this->SegmentID;
	}
	
	public function getSegmentName() {
		return $this->SegmentName;
	}
	
	public function getMailingListStatus() {
		return $this->MailingListStatus;
	}
	
	public function getTotalSent() {
		return $this->TotalSent;
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
	
	public function getTotalLinkClicks() {
		return $this->TotalLinkClicks;
	}
	
	public function getUniqueLinkClicks() {
		return $this->UniqueLinkClicks;
	}
	
	public function getRecipientsCount() {
		return $this->RecipientsCount;
	}
	
	public function getIsTransactional() {
		return $this->IsTransactional;
	}
	
	public function getTotalComplaints() {
		return $this->TotalComplaints;
	}
	
	public function getTotalUnsubscribes() {
		return $this->TotalUnsubscribes;
	}
}