<?php
namespace moosend\Actions\UpdateDraft;

use moosend\Models\Campaign;
use moosend\Models\CampaignParams;

class UpdateDraftRequest  extends CampaignParams {
	
	function __construct(Campaign $campaign) {				
		$this->Name = $campaign->getName();
		$this->Subject = $campaign->getSubject();
		$this->WebLocation = $campaign->getWebLocation();
		$this->ConfirmationToEmail = $campaign->getConfirmationTo();
		
		if (!is_null($campaign->getSender())) {
			$this->SenderEmail = $campaign->getSender()->getEmail();
		} else {
			$this->SenderEmail = null;
		}
		
		if (!is_null($campaign->getReplyToEmail())) {
			$this->ReplyToEmail = $campaign->getReplyToEmail()->getEmail();
		} else {
			$this->ReplyToEmail = null;
		}
		
		if (!is_null($campaign->getMailingList())) {
			$this->MailingListID = $campaign->getMailingList()->getID();
		} else {
			$this->MailingListID = null;
		}
		
		if (!is_null($campaign->getSegment())) {
			$this->SegmentID = $campaign->getSegment()->getID();
		} else {
			$this->SegmentID = 0;
		}
		
		if (!is_null($campaign->getABCampaignData())) {
			$this->ABCampaignType = $campaign->getABCampaignData()->getABCampaignType();
			$this->ABWinnerSelectionType = $campaign->getABCampaignData()->getABWinnerSelectionType();
			$this->HoursToTest = $campaign->getABCampaignData()->getHoursToTest();
			$this->ListPercentage = $campaign->getABCampaignData()->getListPercentage();
			$this->SubjectB = $campaign->getABCampaignData()->getSubjectB();
			$this->WebLocationB = $campaign->getABCampaignData()->getWebLocationB();
				
			if (!is_null($campaign->getABCampaignData()->getSenderB())) {
				$this->SenderEmailB = $campaign->getABCampaignData()->getSenderB()->getEmail();
			} else  {
				$this->SenderEmailB = null;
			}
		}
	}
}
