<?php
namespace moosend\Actions\Unsubscribe;

class UnsubscribeRequest {
	public $email;

	public function __construct($email) {
			$this->email = $email;
	}
}