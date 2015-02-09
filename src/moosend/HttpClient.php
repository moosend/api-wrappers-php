<?php
namespace moosend;

require_once __DIR__.'/Models/Response.php';
require_once __DIR__.'/ApiException.php';

class HttpClient {
	
	/**
	 * @var string Your Moosend API key.
	 */
	protected $apiKey;
	
	/**
	 * @var string The returned body.
	 */
	protected $body;
	
	/**
	 * @var resource  cURL connection handle.
	 */
	protected $ch;
	
	/**
	 * @var mixed Request's parameters.
	 */
	protected  $params;
	
	/**
	 * @var integer Response code.
	 */
	protected $status;
	
	/**
	 * @var string Request method.
	 */
	protected $method;
	
	/**
	 * @var string Connection's URL.
	 */
	protected  $url;
	
	/**
	 * Constructor.
	 */
	public function __construct() {
		if ( !(function_exists('curl_init') && function_exists('curl_setopt')) ){
			throw new \Exception("cURL is needed!");
		}
		
		$this->apiKey = null;
		$this->body = null;
		$this->ch = curl_init();
		$this->params = null;
		$this->status = null;
		$this->method = 'GET';
		$this->url = null;
		$this->response = null;
	
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_USERAGENT, 'moosend-api-{0}-{1}' . phpversion () . php_uname ( 'v' ));
		curl_setopt($this->ch, CURLOPT_TIMEOUT, 180000);
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	}
	
	/**
	 * Destructor.
	 */
	public function __destruct() {
		if (is_resource($this->ch)) {
	            curl_close($this->ch);
	     }
	}
	
	/**
	 * Set the API key for the request.
	 * @return HttpClient
	 */
	public function setApiKey($apiKey) {
		$this->apiKey = $apiKey;
		return $this;
	}
	
	/**
	 * Return the body.
	 * @return string
	 */
	public function getBody() {
		return $this->body;
	}
	
	/**
	 * Return the payload.
	 * @return array
	 */
	public function getParams() {
		return ($this->params);
	}
	
	/**
	 * Set the payload for the request.
	 *
	 * This is a single-dimensional array:  array('foo' => 'bar', 'spam' => 'eggs')
	 * @param array $params
	 * @return HttpClient
	 */
	public function setParams($params) {
			$this->params = $params;
			
			if ($this->method == 'POST') {
				curl_setopt($this->ch, CURLOPT_POSTFIELDS, (json_encode($this->params)));
			}
			return $this;
	}
	
	/**
	 * Return the status code.
	 * @return integer
	 */
	public function getStatusCode() {
		return $this->status;
	}
	
	/**
	 * Return the  method of request.
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}
	
	/**
	 * Set the method of request  (GET, POST, PUT, DELETE)
	 * @param string $method Request method.
	 * @return HttpClient
	 */
	public function setMethod($method) {
		$this->method = $method;
		return $this;
	}
	
	/**
     * Set the URL.
	 * @param string $url URL to connect to.
	 * @return HttpClient
	 */
	public function setUrl($url) {
		$this->url = $url;
		$this->url .= '?' . "apikey={$this->apiKey}";
		
		if (!empty($this->params) && $this->method == 'GET') {
			$this->url .= '&' . http_build_query($this->params);
		}
		return $this;
	}
	
	/**
	 * Return the connection's URL.
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}
	
	/**
	 * Send the request.
	 * @return HttpClient|null
	 */
	public function makeRequest() {
		curl_setopt($this->ch, CURLOPT_URL, $this->url);
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $this->method);	
		$this->body = curl_exec($this->ch);
		$this->status = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);

		if (curl_error($this->ch)) {
			throw new \RuntimeException('Error connecting API: ' . curl_error($this->ch));
		}
		return $this;
	}
	
	/**
	  * Get the response. 
	 * @throws ApiException
	 * @return mixed JSON response
	 */
	public function getResponse() {
		if ($this->status !== 200) {
			throw new \Exception('Something went wrong...  Status: ' . $this->status .' Body: ' . $this->body);
		}
		
		$jsonRawResponse = json_decode($this->body, true);
		
		$jsonResponse = new Response($jsonRawResponse);
		
		if ($jsonResponse->getCode() !== 0) {
			throw new ApiException($jsonResponse->getError(), $jsonResponse->getContext(), $jsonResponse->getCode());
		}
		
		return $jsonResponse->getContext();
	}	
}