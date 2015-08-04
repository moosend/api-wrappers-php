<?php
namespace moosend\Actions\RemoveSubscriber;

class RemoveSubscriberRequest {
	public $email;

	public function __construct($email) {
			$this->email = $email;
	}
}