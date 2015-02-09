<?php
namespace moosend\Actions\SubscriberByEmail;

class SubscriberByEmailRequest {
	public $email;

	public function __construct($email) {
			$this->email = $email;
	}
}