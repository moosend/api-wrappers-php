<?php
namespace moosend\Actions\UpdateDraft;

use moosend\Models\Campaign;
use moosend\Models\CampaignParams;

class UpdateDraftRequest  extends CampaignParams {
	
	function __construct(Campaign $campaign) {				
		$this->Name = $campaign->Name;
		$this->Subject = $campaign->Subject;
		$this->WebLocation = $campaign->WebLocation;
		$this->ConfirmationToEmail = $campaign->ConfirmationTo;
		
		if (!is_null($campaign->Sender)) {
			$this->SenderEmail = $campaign->Sender->Email;
		} else {
			$this->SenderEmail = null;
		}
		
		if (!is_null($campaign->ReplyToEmail)) {
			$this->ReplyToEmail = $campaign->ReplyToEmail->Email;
		} else {
			$this->ReplyToEmail = null;
		}
		
		if (!is_null($campaign->MailingLists)) {
			$this->MailingLists = $campaign->MailingLists;
		} else {
			$this->MailingLists = null;
		}
		
		if (!is_null($campaign->ABCampaignData)) {
			$this->ABCampaignType = $campaign->ABCampaignData->ABCampaignType;
			$this->ABWinnerSelectionType = $campaign->ABCampaignData->ABWinnerSelectionType;
			$this->HoursToTest = $campaign->ABCampaignData->HoursToTest;
			$this->ListPercentage = $campaign->ABCampaignData->ListPercentage;
			$this->SubjectB = $campaign->ABCampaignData->SubjectB;
			$this->WebLocationB = $campaign->ABCampaignData->WebLocationB;
				
			if (!is_null($campaign->ABCampaignData->SenderB)) {
				$this->SenderEmailB = $campaign->ABCampaignData->SenderB->Email;
			} else  {
				$this->SenderEmailB = null;
			}
		}
	}
}
