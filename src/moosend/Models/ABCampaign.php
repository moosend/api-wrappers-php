<?php
class ABCampaign {
		public $CampaignID;
        public $ABVersion;
        public $CampaignName;
        public $CampaignSubject;
        public $MailingLists;
        public $CampaignDeliveredOn;
        public $To;
        public $From;
        public $TotalOpens;
        public $UniqueOpens;
        public $TotalBounces;
        public $TotalComplaints;
        public $TotalForwards;
        public $UniqueForwards;
        public $TotalUnsubscribes;
        public $TotalLinkClicks;
        public $UniqueLinkClicks;
        public $Sent;
        public $CampaignIsArchived;
        
        public static function withJSON($jsonData) {
        	$instance = new self();
        	
        	if (isset($jsonData)) {
        		$instance->CampaignID = $jsonData['CampaignID'];
        		$instance->ABVersion = $jsonData['ABVersion'];
        		$instance->CampaignName = $jsonData['CampaignName'];
        		$instance->CampaignSubject = $jsonData['CampaignSubject'];
        		 
        		$instance->MailingLists = array();
        		foreach ($jsonData['MailingLists'] as $list) {
        			$entry = CampaignSummaryMailingList::withJSON($list);
        			array_push($instance->MailingLists, $entry);
        		}
        		 
        		$instance->CampaignDeliveredOn = $jsonData['CampaignDeliveredOn'];
        		$instance->To = $jsonData['To'];
        		$instance->From = $jsonData['From'];
        		$instance->TotalOpens = $jsonData['TotalOpens'];
        		$instance->UniqueOpens = $jsonData['UniqueOpens'];
        		$instance->TotalBounces = $jsonData['TotalBounces'];
        		$instance->TotalComplaints = $jsonData['TotalComplaints'];
        		$instance->TotalForwards = $jsonData['TotalForwards'];
        		$instance->UniqueForwards = $jsonData['UniqueForwards'];
        		$instance->TotalUnsubscribes = $jsonData['TotalUnsubscribes'];
        		$instance->TotalLinkClicks = $jsonData['TotalLinkClicks'];
        		$instance->UniqueLinkClicks = $jsonData['UniqueLinkClicks'];
        		$instance->Sent = $jsonData['Sent'];
        		$instance->CampaignIsArchived = $jsonData['CampaignIsArchived'];
        	}
        
        	return $instance;
        }
}