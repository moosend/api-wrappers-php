<?php
namespace moosend;

class ApiException extends \Exception {
    public function __construct($message, $context, $code, Exception $previous = null) {
    	parent::__construct($message, $code, $previous);
    }
}