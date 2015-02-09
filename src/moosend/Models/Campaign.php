<?php
namespace moosend\Models;

require_once __DIR__.'/Sender.php';
require_once __DIR__.'/ABCampaignData.php';
require_once __DIR__.'/MailingList.php';
require_once __DIR__.'/Segment.php';

class Campaign {
	private $ID;
	private $Name;
	private $Subject;
	private $WebLocation;
	private $HTMLContent;
	private $PlainContent;
	private $Sender;
	private $DeliveredOn;
	private $ReplyToEmail;
	private $CreatedOn;
	private $UpdatedOn;
	private $ScheduledFor;
	private $Timezone;
	private $FormatType;
	private $ABCampaignData;
	private $MailingList;
	private $ConfirmationTo;
	
	/**
	 * @var int $Status
	 * Draft = 0,
	 * ReadyToSend = 1,      
	 * Sent = 3,
	 * SMTPReadyToSend = 5,
	 * NotEnoughCredits = 4,
	 * Sending = 6,
	 * SelectingWinner = 11,
	 * Archived = 12,
	 */
	private $Status;
	private $Segment;
	private $IsTransactional;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\Campaign
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
		
		$instance->ID = $jsonData['ID'];
		$instance->Name = $jsonData['Name'];
		$instance->Subject = $jsonData['Subject'];
		$instance->WebLocation = $jsonData['WebLocation'];
		$instance->HTMLContent = $jsonData['HTMLContent'];
		$instance->PlainContent = $jsonData['PlainContent'];
		$instance->Sender =  Sender::withJSON($jsonData['Sender']);
		$instance->DeliveredOn = $jsonData['DeliveredOn'];
		$instance->ReplyToEmail = Sender::withJSON($jsonData['ReplyToEmail']);
		$instance->CreatedOn = $jsonData['CreatedOn'];
		$instance->UpdatedOn = $jsonData['UpdatedOn'];
		$instance->ScheduledFor = $jsonData['ScheduledFor'];
		$instance->Timezone = $jsonData['Timezone'];
		$instance->FormatType = $jsonData['FormatType'];
		$instance->ABCampaignData = ABCampaignData::withJSON($jsonData['ABCampaignData']);
		$instance->MailingList = MailingList::withJSON($jsonData['MailingList']);
		$instance->ConfirmationTo = $jsonData['ConfirmationTo'];
		$instance->Status = $jsonData['Status'];
		if (isset($jsonData['Segment'])) {
			$instance->Segment = Segment::withJSON($jsonData['Segment']);
		}
		$instance->IsTransactional = $jsonData['IsTransactional'];
		
		return $instance;
	}
	
	public function getID() {
		return $this->ID;
	}
	
	public function getName() {
		return $this->Name;
	}
	
	public function setName($name) {
		$this->Name = $name;
		return $this;
	}
	
	public function getSubject() {
		return $this->Subject;
	}
	
	public function setSubject($subject) {
		$this->Subject = $subject;
		return $this;
	}
	
	public function getWebLocation() {
		return $this->WebLocation;
	}
	
	public function setWebLocation($webLocation) {
		$this->WebLocation = $webLocation;
		return $this;
	}
	
	public function getHTMLContent() {
		return $this->HTMLContent;
	}
	
	public function setHTMLContent($htmlContent) {
		$this->HTMLContent = $htmlContent;
		return $this;
	}
	
	public function getPlainContent() {
		return $this->PlainContent;
	}
	
	public function setPlainContent($plainContent) {
		$this->PlainContent = $plainContent;
		return $this;
	}
	
	public function getSender() {
		return $this->Sender;
	}
	
	public function setSender(Sender $sender) {
		$this->Sender = $sender;
		return $this;
	}
	
	public function getDeliveredOn() {
		return $this->DeliveredOn;
	}
	
	public function setDeliveredOn(\DateTime $deliveredOn) {
		$this->DeliveredOn = $deliveredOn;
		return $this;
	}
	
	public function getReplyToEmail() {
		return $this->ReplyToEmail;
	}
	
	public function setReplyToEmail(Sender $sender) {
		$this->ReplyToEmail = $sender;
		return $this;
	}
	
	public function getCreatedOn() {
		return $this->CreatedOn;
	}
	
	public function getUpdatedOn() {
		return $this->UpdatedOn;
	}
	
	
	public function getScheduledFor() {
		return $this->ScheduledFor;
	}
	
	public function setScheduledFor(\DateTime $scheduledFor) {
		$this->ScheduledFor = $scheduledFor;
		return $this;
	}
	
	public function getTimezone() {
		return $this->Timezone;
	}
	
	public function setTimezone($timezone) {
		$this->Timezone = $timezone;
		return $this;
	}
	
	public function getFormatType() {
		return $this->FormatType;
	}
	
	// formatType values
	// Html = 0, Template = 1, PlainText = 2
	public function setFormatType(/* int */ $formatType) {
		$this->FormatType = $formatType;
		return $this;
	}
	
	public function getABCampaignData() {
		return $this->ABCampaignData;
	}
	
	public function setABCampaignData(ABCampaignData $ABCampaignData) {
		$this->ABCampaignData = $ABCampaignData;
		return $this;
	}
	
	public function getMailingList() {
		return $this->MailingList;
	}
	
	public function setMailingList(MailingList $mailingList) {
		$this->MailingList = $mailingList;
		return $this;
	}
	
	public function getConfirmationTo() {
		return $this->ConfirmationTo;
	}
	
	public function setConfirmationTo($confirmationTo) {
		$this->ConfirmationTo = $confirmationTo;
		return $this;
	}
	
	public function getStatus() {
		return $this->Status;
	}
	
	// Draft = 0
	// ReadyToSend = 1      
	// Sent = 3
	// SMTPReadyToSend = 5
	// NotEnoughCredits = 4
	// Sending = 6
	// SelectingWinner = 11
	// Archived = 12
	public function setStatus(/* int */ $status) { 
		$this->Status = $status;
		return $this;
	}
	
	public function getSegment() {
		return $this->Segment;
	}
	
	public function setSegment(Segment $segment) {
		$this->Segment = $segment;
		return $this;
	}
	
	public function getIsTransactional() {
		return $this->IsTransactional;
	}
	
	public function setIsTransactional($isTransactional) {
		$this->IsTransactional = $isTransactional;
		return $this;
	}
}