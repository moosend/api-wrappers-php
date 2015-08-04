<?php
namespace moosend;

require_once __DIR__.'/HttpClient.php';

/**
 * Stub for the HttpClient class.
 * @codeCoverageIgnore
 */
class StubHttpClient extends HttpClient {
	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->apiKey = null;
		$this->body = null;
		$this->ch = null;
		$this->params = null;
		$this->status = null;
		$this->method = 'GET';
		$this->url = null;
		$this->response = null;
	}
	
	/**
	 * Set the response 'returned' by the server.
	 * @param string $body
	 * @return StubHttpClient
	 */
	public function setBody($body) {
		$this->body = $body;
		return $this;
	}

	/**
	 * Set the HTTP status 'returned' by the server.
	 * @param integer $code
	 * @return StubHttpClient
	 */
	public function setStatusCode($status) {
		$this->status = $status;
		return $this;
	}

	/**
	 * 'Make' the cURL request.
	 * @return StubHttpClient
	 */
	public function makeRequest() {
		return $this;
	}
}