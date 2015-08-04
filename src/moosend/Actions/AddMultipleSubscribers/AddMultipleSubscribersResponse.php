<?php
namespace moosend\Actions\AddMultipleSubscribers;

use moosend\Models\Subscriber;

require_once __DIR__.'/../../Models/Subscriber.php';

class AddMultipleSubscribersResponse  extends \ArrayObject {
	public function __construct(array $jsonData) {
		foreach ($jsonData as $subscriber) {
			$entry = Subscriber::withJSON($subscriber);
			$this->append($entry);
		}
	}
}
