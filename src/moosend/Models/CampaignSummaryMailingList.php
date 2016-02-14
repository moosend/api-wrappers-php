<?php
use moosend\Models\Campaign;
use moosend\Models\Segment;

require_once __DIR__.'/CampaignSummaryMailingListDetails.php';

class CampaignSummaryMailingList {
	public $Campaign;
	public $MailingList;
	public $Segment;
	
	public static function withJSON(array $jsonData) {
		$instance = new self ();
	
		if (isset($jsonData)) {
			$instance->Campaign = Campaign::withJSON($jsonData ['Campaign']);
			$instance->MailingList = CampaignSummaryMailingListDetails::withJSON($jsonData ['MailingList']);
			$instance->Segment = Segment::withJSON($jsonData ['Segment']);
		}
	
		return $instance;
	}
}