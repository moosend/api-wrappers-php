<?php
namespace moosend;

require_once __DIR__.'/ExceptionWarning.php';

class ApiException extends \Exception {
	private $_messages = array();
	
    public function __construct($error, $context, $code, Exception $previous = null) {
    	if ($code == -2) { // multiple errors
    		foreach($context['Messages'] as $message) {
    			$warning = new ExceptionWarning($message['Code'], $message['Message']);
    			$this->_messages[] = $message;
    		}
    	} 

    	parent::__construct($error, $code, $previous);
    }
    
    /**
     * Returns the messages of the Exception.
     * 
     * @return array Warnings
     */
    public function getMessages() {
    	return $this->_messages;
    }
}