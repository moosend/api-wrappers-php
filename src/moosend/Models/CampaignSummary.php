<?php

namespace moosend\Models;

require_once __DIR__.'/CampaignSummaryMailingList.php';

class CampaignSummary {
	public $ID;
	public $Name;
	public $Subject;
	public $SiteName;
	public $ConfirmationTo;
	public $CreatedOn;
	public $ABHoursToTest;
	
	/**
	 * @var int Defines the way to split an AB campaign. If omitted, a regular campaign will be sent.
	 * 0: 'Sender': Test two different versions of the sender name and send the final campaign to the one performing better.
	 * 1: 'Content': Test two different versions of the campaign content and send the final campaign to the one performing better.
	 * 2: 'SubjectLine': Test two different versions of the subject line and send the final campaign to the one performing better.
	 */
	public $ABCampaignType;
	
	/**
	 * @var int Specifies the method to determine the winning version of an AB campaign after the the test has ended.
	 * 0: 'OpenRate': Used to determine the winner of an AB campaign according to which version achieved more open.
	 * 1: 'TotalUniqueClicks': Used to determine the winner of an AB campaign according to which version achieved more unique link clicks
	 * If not set, OpenRate will be assumed. If specified in a regural campaign, it will be ignored.
	 */
	public $ABWinnerSelectionType;
	
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
	
	public $DeliveredOn;
	public $ScheduledFor;
	public $ScheduledForTimezone;
	public $MailingLists;
	public $TotalSent;
	public $TotalOpens;
	public $UniqueOpens;
	public $TotalBounces;
	public $TotalForwards;
	public $TotalLinkClicks;
	public $UniqueLinkClicks;
	
	/**
	 * @var int $ABWinner
	 * A = 0,
	 * B = 1,
	 */
	public $ABWinner;
	
	public $UniqueForwards;
	public $TotalComplaints;
	public $TotalUnsubscribes;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 *
	 * @param array $jsonData        	
	 * @return \moosend\Models\CampaignSummary
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self ();
		
		if (isset($jsonData)) {
			$instance->ID = $jsonData ['ID'];
			$instance->Name = $jsonData ['Name'];
			$instance->Subject = $jsonData ['Subject'];
			$instance->SiteName = $jsonData ['SiteName'];
			$instance->ConfirmationTo = $jsonData ['ConfirmationTo'];
			$instance->CreatedOn = $jsonData ['CreatedOn'];
			$instance->ABHoursToTest = $jsonData ['ABHoursToTest'];
			$instance->ABCampaignType = $jsonData ['ABCampaignType'];
			$instance->ABWinnerSelectionType = $jsonData ['ABWinnerSelectionType'];
			$instance->Status = $jsonData ['Status'];
			$instance->DeliveredOn = $jsonData ['DeliveredOn'];
			$instance->ScheduledFor = $jsonData ['ScheduledFor'];
			$instance->ScheduledForTimezone = $jsonData ['ScheduledForTimezone'];
			
			$instance->MailingLists = array();
			foreach ($jsonData ['MailingLists'] as $list) {
				$entry = \CampaignSummaryMailingList::withJSON($list);
				array_push($instance->MailingLists, $entry);
			}
			
			$instance->TotalSent = $jsonData ['TotalSent'];
			$instance->TotalOpens = $jsonData ['TotalOpens'];
			$instance->UniqueOpens = $jsonData ['UniqueOpens'];
			$instance->TotalBounces = $jsonData ['TotalBounces'];
			$instance->TotalForwards = $jsonData ['TotalForwards'];
			$instance->TotalLinkClicks = $jsonData ['TotalLinkClicks'];
			$instance->UniqueLinkClicks = $jsonData ['UniqueLinkClicks'];
			$instance->ABWinner = $jsonData ['ABWinner'];
			$instance->UniqueForwards = $jsonData ['UniqueForwards'];
			$instance->TotalComplaints = $jsonData ['TotalComplaints'];
			$instance->TotalUnsubscribes = $jsonData ['TotalUnsubscribes'];
		}
		
		return $instance;
	}
}