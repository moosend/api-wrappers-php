<?php
namespace moosend\Actions\Campaigns;

class CampaignsRequest {
	public $SortBy;
	public $SortMethod;

	public function __construct($sortBy, $sortMethod) {
		$this->SortBy = $sortBy;
		$this->SortMethod = $sortMethod;	
	}
}