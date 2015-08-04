<?php
namespace moosend;

use moosend\Wrappers\MailingListsWrapper;
require_once __DIR__.'/HttpClient.php';
require_once __DIR__.'/Wrappers/CampaignsWrapper.php';
require_once __DIR__.'/Wrappers/SubscribersWrapper.php';
require_once __DIR__.'/Wrappers/MailingListsWrapper.php';
require_once __DIR__.'/Wrappers/SegmentsWrapper.php';

use moosend\Wrappers\CampaignsWrapper;
use moosend\Wrappers\SubscribersWrapper;
use moosend\Wrappers\SegmentsWrapper;

class MoosendApi {
	public $campaigns;
	public $subscribers;
	public $mailingLists;
	public $segments;
		
	private $apiEndpoint = 'http://api.moosend.com/v2';
	private $_apiKey;
	private $_httpClient;

	function __construct(/* string */ $apiKey) {
		if (empty($apiKey)) {
			throw new \InvalidArgumentException('apiKey is a required parameter when a creating MoosendApi instance');
		} elseif (is_numeric($apiKey)) {
			throw new \InvalidArgumentException('Please provide a valid API key. API key must be a string');
		}
		
		$this->_apiKey = $apiKey;
		$this->_httpClient = new HttpClient();
		$this->campaigns = new CampaignsWrapper($this->_httpClient, $this->apiEndpoint, $this->_apiKey);
		$this->subscribers = new SubscribersWrapper($this->_httpClient, $this->apiEndpoint, $this->_apiKey);
		$this->mailingLists = new MailingListsWrapper($this->_httpClient, $this->apiEndpoint, $this->_apiKey);
		$this->segments = new SegmentsWrapper($this->_httpClient, $this->apiEndpoint, $this->_apiKey);
	}
	
	public function getApiEndpoint() {
		return $this->apiEndpoint;
	}
	
	public function setApiEndpoint(/* string */ $apiEndpoint) {
		$this->apiEndpoint = $apiEndpoint;
	}
}