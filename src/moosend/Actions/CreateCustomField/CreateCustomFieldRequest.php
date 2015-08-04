<?php
namespace moosend\Actions\CreateCustomField;

class CreateCustomFieldRequest {
	public $name;
	public $options;
	public $isRequired;
	
	/**
	 * 
	 * @var $customFieldType Specifies the data type of the custom field. This must be one of the following values:
	 * 0: 'Text' : to accept any text as input
	 * 1: 'Number' : to accept only integer or decimal values as input
	 * 2: 'DateTime' : to accept only date values as input, with or without time
	 * 3: 'SingleSelectDropdown' : to accept only values explicitly defined in a list
	 * 4: 'CheckBox' : to accept only values of true or false
	 * If ommitted, Text will be assumed.
	 */
	public $customFieldType;

	public function __construct(/* string */ $name, /* int */ $customFieldType = 0, /* bool */ $isRequired = false, /* string */ $options = null) {
		$this->name = $name;
		$this->options = $options;
		$this->isRequired = $isRequired;
		$this->customFieldType = $customFieldType;
	}
}