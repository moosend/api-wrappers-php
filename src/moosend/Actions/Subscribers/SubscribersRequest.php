<?php
namespace moosend\Actions\Subscribers;

use moosend\SubscribeType;

class SubscribersRequest {
	/**
	 * The status to filter the subscribers in the given mailing list. This must be one of the following values:
	 * 'Subscribed' : to fetch active subscribers only
	 * 'Unsubscribed' : to fetch unsubscribed subscribers only
	 * 'Bounced' : to fetch subscribers that have bounced on a previously sent campaign and are suspicious for not being valid
	 * 'Removed' : to fetch removed subscribers pending deletion from our database
	 * If ommitted, all subscribers will be returned, no matter what their status is.
	 * @var $status
	 */
	public $status;
	
	public $since;
	public $page;
	public $pageSize;

	public function __construct($status, \DateTime $since = null, /* int */ $page = 1, /* int */ $pageSize = 500) {
			$this->status = $status;
			if (isset($since)) {
				$this->since = $since->format('Y-m-d');
			}
			$this->page = $page;
			$this->pageSize = $pageSize;
	}
}