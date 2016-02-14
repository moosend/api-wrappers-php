<?php
namespace moosend\Actions\ActiveMailingLists;

require_once __DIR__.'/../../Models/MailingList.php';

use moosend\Models\MailingList;

class ActiveMailingListsResponse  extends \ArrayObject {
	public $Paging;
	public $MailingLists;
	
	public function __construct(array $jsonData) {
		$this->Paging = \Paging::withJSON($jsonData['Paging']);;
		
		$this->MailingLists = array();
		foreach ($jsonData['MailingLists'] as $list) {
 			$entry = MailingList::withJSON($list);
 			array_push($this->MailingLists, $entry);
		}
	}
}
