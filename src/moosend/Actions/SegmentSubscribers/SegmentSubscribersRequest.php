<?php
namespace moosend\Actions\SegmentSubscribers;

class SegmentSubscribersRequest {
	/**
	 * Specifies which subscribers to fetch, according to their status. This must be one of the following values:
	 * 'Subscribed' : to fetch active subscribers only
	 * 'Unsubscribed' : to fetch unsubscribed subscribers only
	 * 'Bounced' : to fetch subscribers that have bounced on a previously sent campaign and are suspicious for not having a valid email address
	 * 'Removed' : to fetch removed subscribers pending deletion from our database
	 * If ommitted, only active subscribers will be returned.
	 * @var $status
	 */
	public 	$status;
	
	public $page;
	public $pageSize;

	public function __construct(/* string */ $status, /* int */ $page, /* int */ $pageSize) {
		$this->status = $status;
		$this->page = $page;
		$this->pageSize = $pageSize;
	}
}