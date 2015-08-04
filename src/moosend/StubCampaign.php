<?php
 namespace moosend;
 
use moosend\Models\Campaign;

class StubCampaign extends Campaign{
	public $campaignID;
	
	public function __construct(){
		$this->campaignID = 'aCampaignID';
	}
}