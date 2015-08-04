<?php
namespace moosend\Actions\MailingListDetails;

class MailingListDetailsRequest {
	public $withStatistics;

	public function __construct($withStatistics) {
		$this->withStatistics = $withStatistics;
	}
}