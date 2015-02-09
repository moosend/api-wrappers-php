<?php
namespace moosend\Models;

abstract class AbstractAction  {
	private $url;
	private $httpClient;
	private $method;
	private $apiKey;
	
	public function __construct(CallContext $callContext) {
		$this->url = $callContext->getEndpoint() . $callContext->getPath();
		$this->method = $callContext->getMethod();
		$this->httpClient = $callContext->getHttpClient();
		$this->apiKey = $callContext->getApiKey();	
	}

	public function execute($request = null) {
		$jsonData = $this->httpClient->setApiKey($this->apiKey)->setMethod($this->method)->setParams($request)->setUrl($this->url)->makeRequest()->getResponse();
		return $this->onParse($jsonData);
	}

	abstract  function onParse($jsonData);
	
	// @codeCoverageIgnoreStart
	public function getUrl() {
		return $this->url;
	}
	
	public function getHttpClient() {
		return $this->httpClient;
	}
	
	public function getMethod() {
		return $this->method;
	}
	
	public function getApiKey() {
		return $this->apiKey;
	}
	// @codeCoverageIgnoreStop
}