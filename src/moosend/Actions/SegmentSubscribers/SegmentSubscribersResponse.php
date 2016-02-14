<?php
namespace moosend\Actions\SegmentSubscribers;

require_once __DIR__.'/../../Models/Subscriber.php';

use moosend\Models\Subscriber;

class SegmentSubscribersResponse  extends \ArrayObject {
	public $Paging;
	public $Subscribers;
	
	public function __construct(array $jsonData) {
		$this->Paging = \Paging::withJSON($jsonData['Subscribers']);;
	
		$this->Subscribers = array();
		foreach ($jsonData['Subscribers'] as $subscriber) {
			$entry = Subscriber::withJSON($subscriber);
			array_push($this->Subscribers, $entry);
		}
	}
}
