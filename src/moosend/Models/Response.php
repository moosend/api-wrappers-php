<?php
namespace moosend;

class Response {
	private $Code;
	private $Error;
	private $Context;
	
	/**
	 * Create a new instance
	 * @param array $data json data array
	 */
	function __construct(array $jsonData) {		
		$this->Code = $jsonData['Code'];
		$this->Error = $jsonData['Error'];
		$this->Context = $jsonData['Context'];
	}

	public function getCode() {
		return $this->Code;
	}
	
	public function getError() {
		return $this->Error;
	}
	
	public function getContext() {
		return $this->Context;
	}
}