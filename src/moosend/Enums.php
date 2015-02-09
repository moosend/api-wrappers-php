<?php
namespace moosend;

use MyCLabs\Enum\Enum;

// @codeCoverageIgnoreStart
final class ABCampaignType {
	// Test two different versions of the sender name and send the final campaign to the one performing better.
	const Sender = 0;
	
	// Test two different versions of the campaign content and send the final campaign to the one performing better
	const Content = 1;
	
	// Test two different versions of the subject line and send the final campaign to the one performing better
	const SubjectLine = 2;
}

final class ABWinnerSelectionType {
	// Test two different versions of the sender name and send the final campaign to the one performing better.
	const OpenRate = 0;

	// Test two different versions of the campaign content and send the final campaign to the one performing better
	const TotalUniqueClicks = 1;
}

final class CampaignStatus {
	const Draft = 0;
    const ReadyToSend = 1;      
    const Sent = 3;
    const SMTPReadyToSend = 5;
    const NotEnoughCredits = 4;
    const Sending = 6;
	const SelectingWinner = 11;
	const Archived = 12;
}

final class CustomFieldType {
	const Text = 0;
	const Number = 1;
	const DateTime = 2;
	const SingleSelectDropdown = 3;
	const CheckBox = 5;
}

final class  SegmentCriteriaField {
	// Filters members by the date they where added in the mailing list
	// Date Added
	const DateAdded = 1;

	// Filters members by the recipient name
	// Recipient Name
	const RecipientName = 2;

	// Filters members by their email address
	// Recipient Email
	const RecipientEmail = 3;

	// Filters members according to how many campaigns they have opened (within the past 60 days maximum)
	// Campaigns Opened
	const CampaignsOpened = 4;

	// Filters members according to how many links they have clicked from previous campaigns sent to them (within the past 60 days maximum)
	// Links Clicked
	const LinksClicked = 5;

	/// Filters members according to which campaigns they have opened, based on their names
	// Campaign Name
	const CampaignName = 6;

	/// Filters members according to which links they have clicked, based on their urls
	// Link URL
	const LinkURL = 7;

	// Filters members according to the type of the devices they use
	// Mobile vs Desktop
	const Platform = 8;

	// Filters members according to the operating systems they use
	// Operating System
	const OperatingSystems = 9;

	/// Filters members according to the email clients they use
	// Email Client
	const EmailClient = 10;

	// Filters members according to the desktop web browsers they use
	// Web Browser
	const WebBrowser = 11;

	// Filters members according to the mobile browsers they use
	// Mobile Browser
	const MobileBrowser = 12;

	// Filters members according to the custom field specified by the CustomFieldID property
	// Custom Field
	const CustomField = 99;
}

final class SegmentCriteriaComparer {
	// Used to find members where the field is exactly equal to the search term
	// is
	const Is = 0;

	// Used to find members where the field is other than the search term
	// is not
	const IsNot = 1;

	// Used to find members where the field contains the search term
	// contains
	const Contains = 2;

	// Used to find members where the field does not contain the search term
	// does not contain
	const DoesNotContain = 3;

	// Used to find members where the field starts with the search term
	// starts with
	const StartsWith = 4;

	// Used to find members where the field does not start with the search term
	// does not start with
	const DoesNotStartWith = 5;

	// Used to find members where the field ends with the search term
	// ends with
	const EndsWith = 6;

	// Used to find members where the field does not end with the search term
	// does not end with
	const DoesNotEndWith = 7;

	// Used to find members where the field is greater than the search term
	// is greater than
	const IsGreaterThan = 8;

	// Used to find members where the field is greater than or equal to the search term
	// is greater than or equal to
	const IsGreaterThanOrEqualTo = 9;

	// Used to find members where the field is less than the search term
	// is less than
	const IsLessThan = 10;

	// Used to find members where the field is less than or equal to the search term
	// is less than or equal to
	const IsLessThanOrEqualTo = 11;

	// Used to find members where the specified date field is before the specified date value
	// is before
	const IsBefore = 12;

	// Used to find members where the specified date field is after the specified date value
	// is after
	const IsAfter = 13;

	// Used to find members where the field contains no value
	// is empty
	const IsEmpty = 14;

	// Used to find members excluding those where the field contains no value
	// is not empty
	const IsNotEmpty = 15;

	// Used to find members where the condition defined by the field is true
	// is true
	const IsTrue = 16;

	// Used to find members where the condition defined by the field is false
	// is false
	const IsFalse = 17;
}

final class SegmentMatchType {
	// Used in a segment to return the members in a mailing list that match all the given criteria
	const All = 0;

	// Used in a segment to return the members in a mailing list that match any of the given criteria
	const Any = 1;
}

final class FormatType {
	const Html = 0;
	const Template = 1;
	const PlainText = 2;
}

final class ABVersion {
	const A = 0;
	const B = 1;
}

/**
 * @SubscribeType enum
 */
final class SubscribeType {
	// Represents an active member
	const Subscribed = 'Subscribed';

	// Represents an unsubscribed member
	const Unsubscribed = 'Subscribed';

	// Represents a member that has bounced on a previously sent campaign and is probably not valid
	const Bounced = 'Bounced';

	// Represents a removed member pending deletion from our database
	const Removed = 'Removed';
}
// @codeCoverageIgnoreStop