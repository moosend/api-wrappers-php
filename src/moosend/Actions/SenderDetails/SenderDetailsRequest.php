<?php
namespace moosend\Actions\SenderDetails;

class SenderDetailsRequest {
	public $email;

	public function __construct($email) {
		$this->email = $email;
	}
}