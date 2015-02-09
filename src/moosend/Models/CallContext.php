<?php
namespace moosend\Models;

use moosend\HttpClient;

class CallContext {
	private $httpClient;
	private $method;
	private $endpoint;
	private $path;
	private $apiKey;

	public function __construct(HttpClient $httpClient, $method, $endpoint, $path, $apiKey) {
		$this->httpClient = $httpClient;
		$this->method = $method;
		$this->endpoint = $endpoint;
		$this->path = $path;
		$this->apiKey = $apiKey;
		
	}
	
	public function getHttpClient() {
		return $this->httpClient;
	}
	
	public function getMethod() {
		return $this->method;
	}
	
	public function getEndpoint() {
		return $this->endpoint;
	}
	
	public function getPath() {
		return $this->path;
	}
	
	public function getApiKey() {
		return $this->apiKey;
	}
}