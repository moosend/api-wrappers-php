<?php
namespace moosend\Actions\RemoveMultipleSubscribers;

class RemoveMultipleSubscribersRequest {
	public $emails;

	public function __construct($emails) {
			$this->emails = $emails;
	}
}