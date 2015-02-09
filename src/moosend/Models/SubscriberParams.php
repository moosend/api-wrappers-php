<?php
namespace moosend\Models;

/**
 * @codeCoverageIgnore
 */
class SubscriberParams implements \JsonSerializable{
	/**
	 * @var string The name of the member
	 */
	public  $name;
	
	/**
	 * @var string The email address of the member
	 */
	public  $email;
	
	/**
	 * @var array An array of name-value pairs that match the member's custom fields defined in the mailing list.
	 * For example, if you have two custom fields named Age and Country, you should specify values for them as following:
	 * array("Age=30", "Country=GREECE")
	 */
	public  $customFields;
	
	public function JsonSerialize() {
		$vars = get_object_vars($this);
	
		return $vars;
	}
}