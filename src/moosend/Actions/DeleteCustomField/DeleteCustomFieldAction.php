<?php
namespace moosend\Actions\DeleteCustomField;

require_once __DIR__.'/../../Actions/AbstractAction.php';
require_once __DIR__.'/../../Models/CallContext.php'; 
require_once __DIR__.'/../../Models/Campaign.php';

use moosend\Models\CallContext;
use moosend\Models\AbstractAction;
use moosend\HttpClient;

class DeleteCustomFieldAction extends AbstractAction {
	public function __construct(HttpClient $httpClient, $endpoint, $mailingListID, $customFieldID, $apiKey) {
		$callContext = new CallContext($httpClient, 'DELETE', $endpoint, '/lists/' . $mailingListID . '/customfields/' . $customFieldID . '/delete.json', $apiKey);
		parent::__construct($callContext);
	}

	public function onParse($jsonData) {
		return $jsonData;
	}
}