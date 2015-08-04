<?php
namespace moosend;

class ExceptionWarning {
	private $_code;
	private $_message;
	
	public function __construct(/*int*/ $code, /*string*/ $message) {
		$this->_code = $code;
		$this->_message = $message;
	}
	
	public function getCode() {
		return $this->_code;
	}
	
	public function getMessage() {
		return $this->_message;
	}
}