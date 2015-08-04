<?php
namespace moosend\Models;

use moosend\SegmentCriteriaField;
use moosend\SegmentCriteriaComparer;

class SegmentCriteria {
	private $ID;
	private $SegmentID;
	private $Field;
	private $CustomFieldID;
	private $Comparer;
	private $Value;
	private $DateFrom;
	private $DateTo;
	private $Properties;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\SegmentCriteria
	 */
	public static function withJSON(array $jsonData) {
		$instance = new self();
	
		$instance->ID = $jsonData['ID'];
		$instance->SegmentID = $jsonData['SegmentID'];
		$instance->Field = $jsonData['Field'];
		$instance->CustomFieldID = $jsonData['CustomFieldID'];
		$instance->Comparer = $jsonData['Comparer'];
		$instance->Value = $jsonData['Value'];
		$instance->DateFrom = $jsonData['DateFrom'];
		$instance->DateTo = $jsonData['DateTo'];
		
		$instance->Properties = array();
		foreach ($jsonData['Properties'] as $property) {
			$entry = SegmentCriteriaProperty::withJSON($property);
			array_push($instance->Properties, $entry);
		}
	
		return $instance;
	}

	public function getID() {
		return $this->ID;
	}
	
	public function getSegmentID() {
		return $this->SegmentID;
	}
	
	public function getField() {
		return $this->Field;
	}
	
	/**
	 * The field of the criterion to filter the mailing list by. This must be one of the following values:
	 * DateAdded : filters subscribers by the date they where added to the mailing list
	 * RecipientName : filters subscribers by the recipient name
	 * RecipientEmail : filters subscribers by their email address
	 * CampaignsOpened : filters subscribers according to how many campaigns they have opened (within the past 60 days maximum)
	 * LinksClicked : filters subscribers according to how many links they have clicked from previous campaigns sent to them (within the past 60 days maximum)
	 * CampaignName : filters subscribers according to which campaigns they have opened, based on their names
	 * LinkURL : filters subscribers according to which links they have clicked, based on their urls
	 * An ID of any custom field in the mailing list the segment belongs : filters the mailing list according to the value of the specified custom field for each subscriber
	 * @param string $field
	 */
	public function setField(/* string */ $field) {
		$this->Field = $field;
	}
	
	public function getCustomFieldID() {
		return $this->CustomFieldID;
	}
	
	public function setCustomFieldID($customFieldID) {
		$this->CustomFieldID = $customFieldID;
	}
	
	public function getComparer() {
		return $this->Comparer;
	}
	
	/**
	 * An operator that defines the way to compare a criterion field with its value. This must be one of the following values:
	 * Is : to find subscribers where the field is exactly equal to the search term
	 * IsNot : to find subscribers where the field is other than the search term
	 * Contains : to find subscribers where the field contains the search term
	 * DoesNotContain : to find subscribers where the field does not contain the search term
	 * StartsWith : to find subscribers where the field starts with the search term
	 * DoesNotStartWith : to find subscribers where the field does not start with the search term
	 * EndsWith : to find subscribers where the field ends with the search term
	 * DoesNotEndWith : to find subscribers where the field does not end with the search term
	 * IsGreaterThan : to find subscribers where the field is greater than the search term
	 * IsGreaterThanOrEqualTo : to find subscribers where the field is greater than or equal to the search term
	 * IsLessThan : to find subscribers where the field is less than the search term
	 * IsLessThanOrEqualTo : to find subscribers where the field is less than or equal to the search term
	 * IsBefore : to find subscribers where the specified date field is before the specified date value
	 * IsAfter : to find subscribers where the specified date field is after the specified date value
	 * IsEmpty : to find subscribers where the field contains no value
	 * IsNotEmpty : to find subscribers excluding those where the field contains no value
	 * IsTrue : to find subscribers where the condition defined by the field is true
	 * IsFalse : to find subscribers where the condition defined by the field is false
	 * If not specified, Is will be assumed.
	 * @param string $comparer
	 */
	public function setComparer(/* string */ $comparer) {
		$this->Comparer = $comparer;
	}
	
	public function getValue() {
		return $this->Value;
	}
	
	public function setValue($value) {
		$this->Value = $value;
	}
	
	public function getDateFrom() {
		return $this->DateFrom;
	}
	
	public function setDateFrom(\DateTime $dateFrom) {
		$this->DateFrom = $dateFrom;
	}
	
	public function getDateTo() {
		return $this->DateTo;
	}
	
	public function setDateTo(\DateTime $dateTo) {
		$this->DateTo = $dateTo;
	}
	
	public function getProperties() {
		return $this->Properties;
	}
}