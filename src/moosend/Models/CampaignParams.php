<?php
namespace moosend\Models;

require_once __DIR__.'/../Enums.php';

use moosend\ABCampaignType;
use moosend\ABWinnerSelectionType;

/**
 * @codeCoverageIgnore
 */
class CampaignParams implements \JsonSerializable{
	/**
	 * @var string The campaign's name.
	 */
	public  $Name;
	
	/**
	 * @var string The subject of the emails for the new campaign.
	 */
	public $Subject;
	
	/**
	 * @var string The sender of the campaign.
	 */
	public $SenderEmail;
	
	/**
	 * @var string The email address to which recipients replies will arrive. It must be one of your sender accounts. If not specified, the sender's email will be assumed.
	 */
	public $ReplyToEmail;
	
	/**
	 * @var string The email address to which a confirmation message will be sent when the campaign has been successfully sent. This can be any valid email address. It does not have to be one of your sender signatures. If not specified, the sender's email will be assumed.
	 */
	public $ConfirmationToEmail;
	
	/**
	 * @var string A url to retrieve the html content for the campaign. We'll automatically move all CSS inline.
	 */
	public $WebLocation;
	
	/**
	 * @var string The ID of a mailing list in your account to which the campaign will be sent to.
	 */
	public $MailingListID;
	
	/**
	 * @var int  The ID of a segment in the specified mailing list to filter the recipients with. If not specified, the campaign will be sent to all active members of the mailing list.
	 */
	public $SegmentID;
	
	/**
	 * @var int Defines the way to split an AB campaign. If omitted, a regular campaign will be sent.
	 * 0: 'Sender': Test two different versions of the sender name and send the final campaign to the one performing better.
	 * 1: 'Content': Test two different versions of the campaign content and send the final campaign to the one performing better.
	 * 2: 'SubjectLine': Test two different versions of the subject line and send the final campaign to the one performing better.
	 */
	public $ABCampaignType;
	
	/**
	 * @var string If you wish to send an AB split campaign with two different versions of the subject line ($ABCampaignType = 0), you must specify the second subject using this parameter. If specified in any other campaign type, it will be ignored
	 */
	public $SubjectB;
	
	/**
	 * @var string If you wish to send an AB split campaign with two different versions of the html content ($ABCampaignType = 1), you must specify where the second html content will be retrieved from using this parameter. If specified in any other campaign type, it will be ignored.
	 */
	public $WebLocationB;
	
	/**
	 * @var string If you wish to send an AB split campaign with two different versions of the sender ($ABCampaignType = 2), you must specify the second sender email address using this parameter. This must be one of your sender signatures defined in your account. If specified in any other campaign type, it will be ignored.
	 */
	public $SenderEmailB;
	
	/**
	 * @var int If you choose to send an AB campaign type, you must set this parameter to specify how long the test will run, before determining which will be the winning version to be sent to the rest of the recipients. This should be an integer value between 1 and 24. If specified in a regural campaign, it will be ingored.
	 */
	public $HoursToTest;
	
	/**
	 * @var int If you choose to send an AB campaign type, you must set this parameter to specify a portion of the target recipients that will receive the test versions. For example, if you specify 10, then 10% of your recipients will recieve the A version and another 10% will receive the B version. The specified value should be an integer between 5 and 40. If specified in a regural campaign, it will be ignored.
	 */
	public $ListPercentage;
	
	/**
	 * @var int Specifies the method to determine the winning version of an AB campaign after the the test has ended.
	 * 0: 'OpenRate': Used to determine the winner of an AB campaign according to which version achieved more open.
	 * 1: 'TotalUniqueClicks': Used to determine the winner of an AB campaign according to which version achieved more unique link clicks
     * If not set, OpenRate will be assumed. If specified in a regural campaign, it will be ignored.
	 */
	public $ABWinnerSelectionType;

	
	public function JsonSerialize() {
		$vars = get_object_vars($this);
	
		return $vars;
	}
}