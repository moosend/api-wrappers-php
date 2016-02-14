<?php
namespace moosend\Models;

require_once __DIR__.'/Sender.php';
require_once __DIR__.'/ABCampaignData.php';
require_once __DIR__.'/MailingList.php';
require_once __DIR__.'/Segment.php';

class Campaign {
	public $ID;
	public $Name;
	public $Subject;
	public $WebLocation;
	public $HTMLContent;
	public $PlainContent;
	public $Sender;
	public $DeliveredOn;
	public $ReplyToEmail;
	public $CreatedOn;
	public $UpdatedOn;
	public $ScheduledFor;
	public $Timezone;
	public $MailingLists;
	
	/**
	 * @var int $Status
	 * Html = 0,
	 * Template = 1,
	 * PlainText = 2,
	 */
	public $FormatType;
	
	public $ABCampaignData;
	public $ConfirmationTo;
	
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
	public $Status;
	
	public $Segment;
	public $IsTransactional;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\Campaign
	 */
	public static function withJSON($jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
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
			$instance->ConfirmationTo = $jsonData['ConfirmationTo'];
			$instance->Status = $jsonData['Status'];
			
			if (isset($jsonData['Segment'])) {
				$instance->Segment = Segment::withJSON($jsonData['Segment']);
			}
			$instance->IsTransactional = $jsonData['IsTransactional'];
		}
		
		return $instance;
	}
	
	public function JsonSerialize() {
		$vars = get_object_vars($this);
	
		return $vars;
	}
}