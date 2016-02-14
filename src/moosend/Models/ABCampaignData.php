<?php
namespace moosend\Models;

class ABCampaignData {
	public $ID;
	public $PlainContentB;
	public $HTMLContentB;
	public $DeliveredOnA;
	public $DeliveredOnB;
	
	/**
	 * @var string If you wish to send an AB split campaign with two different versions of the subject line ($ABCampaignType = 2), you must specify the second subject using this parameter. If specified in any other campaign type, it will be ignored
	 */
	public $SubjectB;
	
	/**
	 * @var string If you wish to send an AB split campaign with two different versions of the html content ($ABCampaignType = 1), you must specify where the second html content will be retrieved from using this parameter. If specified in any other campaign type, it will be ignored.
	 */
	public $WebLocationB;
	
	/**
	 * @var Sender If you wish to send an AB split campaign with two different versions of the sender ($ABCampaignType = 0), you must specify the second sender email address using this parameter. This must be one of your sender signatures defined in your account. If specified in any other campaign type, it will be ignored.
	 */
	public $SenderB;
	
	/**
	 * @var int If you choose to send an AB campaign type, you must set this parameter to specify how long the test will run, before determining which will be the winning version to be sent to the rest of the recipients. This should be an integer value between 1 and 24. If specified in a regural campaign, it will be ingored.
	 */
	public $HoursToTest;
	
	/**
	 * @var int If you choose to send an AB campaign type, you must set this parameter to specify a portion of the target recipients that will receive the test versions. For example, if you specify 10, then 10% of your recipients will recieve the A version and another 10% will receive the B version. The specified value should be an integer between 5 and 40. If specified in a regural campaign, it will be ignored.
	 */
	public $ListPercentage;
	
	/**
	 * @var int Defines the way to split an AB campaign. If omitted, a regular campaign will be sent.
	 * 0: 'Sender': Test two different versions of the sender name and send the final campaign to the one performing better.
	 * 1: 'Content': Test two different versions of the campaign content and send the final campaign to the one performing better.
	 * 2: 'SubjectLine': Test two different versions of the subject line and send the final campaign to the one performing better.
	 */
	public $ABCampaignType;
	
	/**
	 * @var int Specifies the method to determine the winning version of an AB campaign after the the test has ended.
	 * 0: 'OpenRate': Used to determine the winner of an AB campaign according to which version achieved more open.
	 * 1: 'TotalUniqueClicks': Used to determine the winner of an AB campaign according to which version achieved more unique link clicks
	 * If not set, OpenRate will be assumed. If specified in a regural campaign, it will be ignored.
	 */
	public $ABWinnerSelectionType;
	
	/**
	 * Create a new instance and populate its properties with JSON data
	 * @param array $jsonData
	 * @return \moosend\Models\ABCampaignData
	 */
	public static function withJSON($jsonData) {
		$instance = new self();
		
		if (isset($jsonData)) {
			$instance->ID = $jsonData['ID'];
			$instance->SubjectB = $jsonData['SubjectB'];
			$instance->PlainContentB = $jsonData['PlainContentB'];
			$instance->HTMLContentB = $jsonData['HTMLContentB'];
			$instance->WebLocationB = $jsonData['WebLocationB'];
			$instance->SenderB = Sender::withJSON($jsonData['SenderB']);
			$instance->HoursToTest = $jsonData['HoursToTest'];
			$instance->ListPercentage = $jsonData['ListPercentage'];
			$instance->ABCampaignType = $jsonData['ABCampaignType'];
			$instance->ABWinnerSelectionType = $jsonData['ABWinnerSelectionType'];
			$instance->DeliveredOnA = $jsonData['DeliveredOnA'];
			$instance->DeliveredOnB = $jsonData['DeliveredOnB'];
		}
	
		return $instance;
	}
}