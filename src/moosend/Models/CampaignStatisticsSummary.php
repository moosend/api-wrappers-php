<?php
class CampaignStatisticsSummary {
	public $Id;
	public $AbVersion;
	public $CampaignId;
	public $CampaignName;
	public $MailingListId;
	public $MailingListName;
	public $CampaignDeliveredOn;
	public $To;
	public $From;
	public $TotalOpens;
	public $UniqueOpens;
	public $TotalBounces;
	public $TotalForwards;
	public $UniqueForwards;
	public $TotalUnsubscribes;
	public $TotalLinkClicks;
	public $UniqueLinkClicks;
	public $Sent;
	
	public static function withJSON(array $jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
			$instance->Id = $jsonData['ID'];
			$instance->AbVersion = $jsonData['ABVersion'];
			$instance->CampaignId = $jsonData['CampaignID'];
			$instance->CampaignName = $jsonData['CampaignName'];
			$instance->MailingListId = $jsonData['MailingListID'];
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
		}
	
		return $instance;
	}
}