<?php
namespace moosend\Actions\Campaigns;

require_once __DIR__.'/../../Models/Campaign.php';

use moosend\Models\CampaignDetails;

class CampaignsResponse  extends \ArrayObject {
	public function __construct(array $jsonData) {
		foreach ($jsonData['Campaigns'] as $campaign) {
			$entry = CampaignDetails::withJSON($campaign);
			$this->append($entry);
		}
	}
}
