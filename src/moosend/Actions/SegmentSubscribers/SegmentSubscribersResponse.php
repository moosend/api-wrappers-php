<?php
namespace moosend\Actions\SegmentSubscribers;

require_once __DIR__.'/../../Models/Subscriber.php';

use moosend\Models\Subscriber;

class SegmentSubscribersResponse  extends \ArrayObject {
	public function __construct(array $jsonData) {
		foreach ($jsonData['Subscribers'] as $subscriber) {
			$entry = Subscriber::withJSON($subscriber);
			$this->append($entry);
		}
	}
}
