<?php
class CampaignMailingListForm {
        public $MailingListId;
        public $SegmentId;
        
        public static function withJSON($jsonData) {
        	$instance = new self();
        
        	if (isset($jsonData)) {
        		$instance->MailingListId = $jsonData['MailingListID'];
        		$instance->SegmentId = $jsonData['SegmentID'];
        	}
        
        	return $instance;
        }
    }