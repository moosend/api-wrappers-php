<?php
namespace moosend\Actions\Campaigns;

use moosend\Models\CampaignSummary;

require_once __DIR__.'/../../Models/Paging.php';
require_once __DIR__.'/../../Models/CampaignSummary.php';

class CampaignsResponse  extends \ArrayObject {
	public $Paging;
	public $Campaigns;
	
	public function __construct(array $jsonData) {
		$this->Paging = \Paging::withJSON($jsonData['Paging']);;
		
		$this->Campaigns = array();
		foreach ($jsonData['Campaigns'] as $campaign) {
 			$entry = CampaignSummary::withJSON($campaign);
 			array_push($this->Campaigns, $entry);
		}
	}
}
