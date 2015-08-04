<?php
namespace moosend\Actions\AllSenders;

//require_once __DIR__.'/../../Models/Sender.php';

use moosend\Models\Sender;

class AllSendersResponse  extends \ArrayObject {
	public function __construct(array $jsonData) {
		foreach ($jsonData as $sender) {
			$entry = Sender::withJSON($sender);
			$this->append($entry);
		}
	}
}