<?php
namespace moosend\Actions\Unsubscribe;

use moosend\Models\AbstractAction;
use moosend\Models\CallContext;
use moosend\HttpClient;

class UnsubscribeAction extends AbstractAction {
	public function __construct(HttpClient $client, $endpoint, $campaignID, $mailingListID, $apiKey) {
		if (!is_null($mailingListID) && is_null($campaignID)) {
			$callContext = new CallContext($client, 'POST', $endpoint, '/subscribers/' . $mailingListID . '/unsubscribe.json', $apiKey);
		} elseif (is_null($mailingListID) && !is_null($campaignID)) {
			$callContext = new CallContext($client, 'POST', $endpoint, '/subscribers/' . $campaignID . '/unsubscribe.json', $apiKey);
		} elseif (!is_null($mailingListID) && !is_null($campaignID)) {
			$callContext = new CallContext($client, 'POST', $endpoint, '/subscribers/' . $mailingListID . '/' . $campaignID . '/unsubscribe.json', $apiKey);
		} else {
			$callContext = new CallContext($client, 'POST', $endpoint, '/subscribers/unsubscribe.json', $apiKey);
		}
		
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}