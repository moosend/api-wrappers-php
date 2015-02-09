<?php
namespace moosend\Actions\UpdateCriteria;

class UpdateCriteriaRequest {
	public $field;
	public $comparer;
	public $value;
	public $dateFrom;
	public $dateTo;
	
	public function __construct(/* string */ $field, /* string */ $comparer, /* string */ $value, \DateTime $dateFrom = null, \DateTime $dateTo = null) {
		$this->field = $field;
		$this->comparer = $comparer;
		$this->value = $value;
		$this->dateFrom = $dateFrom;
		$this->dateTo = $dateTo;
	}
}