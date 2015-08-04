<?php
namespace moosend\Actions\ActiveMailingLists;

require_once __DIR__.'/../../Models/MailingList.php';

use moosend\Models\MailingList;

class ActiveMailingListsResponse  extends \ArrayObject {
	public function __construct(array $jsonData) {
		foreach ($jsonData['MailingLists'] as $mailingList) {
			$entry = MailingList::withJSON($mailingList);
			$this->append($entry);
		}
	}
}
