# Moosend PHP Wrapper for Moosend V3 API

The following project is a PHP implementation of the Moosend V3 API. You can find the API documentation at http://docs.moosendapp.apiary.io/#

## Requirements

PHP 5.4.0 and later

## Installation & Usage

```
composer require moo-theo/php-api-wrapper
```

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the requested AB test campaign

try {
    $result = $api_instance->aBTestCampaignSummary($format, $apikey, $campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->aBTestCampaignSummary: ', $e->getMessage(), PHP_EOL;
}

?>
```


<a name="documentation-for-api-endpoints"></a>
## Documentation for API Endpoints

## *CampaignsApi*
Class | Method 
------------ | ------------- 
[**GetAllCampaigns**](docs/Api/CampaignsApi.md#getallcampaigns) | Returns a list of all campaigns in your account with detailed information.  
[**GetCampaignsByPage**](docs/Api/CampaignsApi.md#getcampaignsbypage) | Returns a list of all campaigns in your account with detailed information, paging information is required as input.
[**GetCampaignsByPageAndPagesize**](docs/Api/CampaignsApi.md#getcampaignsbypageandpagesize) | Returns a list of all campaigns in your account with detailed information, paging information is required as input.
[**GettingCampaignDetails**](docs/Api/CampaignsApi.md#gettingcampaigndetails) | Returns a complete set of properties that describe the requested campaign in detail.  
[**GettingSenderDetails**](docs/Api/CampaignsApi.md#gettingsenderdetails) | Returns basic information for the specified sender identified by its email address.
[**CloningAnExistingCampaign**](docs/Api/CampaignsApi.md#cloninganexistingcampaign) | Creates an exact copy of an existing campaign. The new campaign is created as a draft.
[**CreatingADraftCampaign**](docs/Api/CampaignsApi.md#creatingadraftcampaign) | Creates a new campaign in your account. This method does not send the campaign, but rather creates it as a draft, ready for sending or testing. 
[**UpdatingADraftCampaign**](docs/Api/CampaignsApi.md#updatingadraftcampaign) | Updates properties of an existing draft A/B campaign in your account. Non-draft campaigns cannot be updated. 
[**DeletingACampaign**](docs/Api/CampaignsApi.md#deletingacampaign) | Deletes a campaign from your account, draft or even sent.
[**TestingACampaign**](docs/Api/CampaignsApi.md#testingacampaign) | Sends a test email of a draft campaign to a list of email addresses you specify for previewing.
[**SendingACampaign**](docs/Api/CampaignsApi.md#sendingacampaign) | Sends an existing draft campaign to all recipients specified in its mailing list. The campaign is sent immediatelly.
[**ABTestCampaignSummary**](docs/Api/CampaignsApi.md#abtestcampaignsummary) |  Provides a basic summary of the results for a sent AB test campaign, separately for each version (A and B), such as the number of recipients, opens, clicks, bounces, unsubscribes, forwards etc to date.
[**ActivityByLocation**](docs/Api/CampaignsApi.md#activitybylocation) |  Returns a detailed report of your campaign opens (unique and total) by country.
[**CampaignSummary**](docs/Api/CampaignsApi.md#campaignsummary) | Provides a basic summary of the results for any sent campaign such as the number of recipients, opens, clicks, bounces, unsubscribes, forwards etc. to date.
[**GettingAllYourSenders**](docs/Api/CampaignsApi.md#gettingallyoursenders) | Gets a list of your active senders in your account. You may specify any email address of these senders when sending a campaign.
[**LinkActivity**](docs/Api/CampaignsApi.md#linkactivity) | Returns a list with your campaign links and how many clicks have been made by your recipients, either unique or total.
[**SchedulingACampaign**](docs/Api/CampaignsApi.md#schedulingacampaign) | Assigns a scheduled date and time at which the campaign will be delivered.
[**UnschedulingACampaign**](docs/Api/CampaignsApi.md#unschedulingacampaign) | Removes a previously defined scheduled date and time from a campaign, so that it will be delivered immediately if already queued or when sent.

## *MailingListsApi*
Class | Method 
------------ | ------------- 
[**CreatingACustomField**](docs/Api/MailingListsApi.md#creatingacustomfield) | Creates a new custom field in the specified mailing list.
[**CreatingAMailingList**](docs/Api/MailingListsApi.md#creatingamailinglist) | Creates a new empty mailing list in your account.
[**DeletingAMailingList**](docs/Api/MailingListsApi.md#deletingamailinglist) | Deletes a mailing list from your account.
[**GettingAllActiveMailingLists**](docs/Api/MailingListsApi.md#gettingallactivemailinglists) | Gets a list of your active mailing lists in your account.
[**GettingAllActiveMailingListsWithPaging**](docs/Api/MailingListsApi.md#gettingallactivemailinglistswithpaging) | Gets a list of your active mailing lists in your account. Because the results for this call could be quite big, paging information is required as input.
[**GettingMailingListDetails**](docs/Api/MailingListsApi.md#gettingmailinglistdetails) | Gets details for a given mailing list. You may include subscriber statistics in your results or not. Any segments existing for the requested mailing list will not be included in the results.
[**RemovingACustomField**](docs/Api/MailingListsApi.md#removingacustomfield) | Removes a custom field definition from the specified mailing list.
[**UpdatingACustomField**](docs/Api/MailingListsApi.md#updatingacustomfield) | Updates the properties of an existing custom field in the specified mailing list.
[**UpdatingAMailingList**](docs/Api/MailingListsApi.md#updatingamailinglist) | Updates the properties of an existing mailing list.

## *SegmentsApi*
Class | Method 
------------ | ------------- 
[**GettingSegments**](docs/Api/SegmentsApi.md#gettingsegments) | Get a list of all segments with their criteria for the given mailing list.
[**GettingSegmentDetails**](docs/Api/SegmentsApi.md#gettingsegmentdetails) | Gets detailed information on a specific segment and its criteria. However, it does not include the subscribers returned by the segment.
[**GettingSegmentSubscribers**](docs/Api/SegmentsApi.md#gettingsegmentsubscribers) | Gets a list of the subscribers that the specified segment returns according to its criteria. Because the results for this call could be quite big, paging information is required as input.
[**CreatingANewSegment**](docs/Api/SegmentsApi.md#creatinganewsegment) | Creates a new empty segment (without criteria) for the given mailing list. You may specify the name of the segment and the way the criteria will match together.
[**UpdatingASegment**](docs/Api/SegmentsApi.md#updatingasegment) | Updates the properties of an existing segment. You may update the name and match type of the segment.
[**AddingCriteriaToSegments**](docs/Api/SegmentsApi.md#addingcriteriatosegments) | Adds a new criterion (a rule) to the specified segment.
[**UpdatingSegmentCriteria**](docs/Api/SegmentsApi.md#updatingsegmentcriteria) | Updates an existing criterion in the specified segment.
[**DeletingASegment**](docs/Api/SegmentsApi.md#deletingasegment) | Deletes a segment along with its criteria from the mailing list. The subscribers of the mailing list that the segment returned are not deleted or affected in any way.

## *SubscribersApi*
Class | Method 
------------ | ------------- 
[**GettingSubscribers**](docs/Api/SubscribersApi.md#gettingsubscribers) | Gets a list of all subscribers in a given mailing list. You may filter the list by setting a date to fetch those subscribed since then and/or by their status. 
[**GetSubscriberByEmailAddress**](docs/Api/SubscribersApi.md#getsubscriberbyemailaddress) | Searches for a subscriber with the specified email address in the specified mailing list.
[**GetSubscriberById**](docs/Api/SubscribersApi.md#getsubscriberbyid) | Searches for a subscriber with the specified unique id in the specified mailing list
[**AddingSubscribers**](docs/Api/SubscribersApi.md#addingsubscribers) | Adds a new subscriber to the specified mailing list. If there is already a subscriber with the specified email address in the list, an update will be performed instead.
[**AddingMultipleSubscribers**](docs/Api/SubscribersApi.md#addingmultiplesubscribers) | This method allows you to add multiple subscribers in a mailing list with a single call. If some subscribers already exist with the given email addresses, they will be updated. 
[**UpdatingASubscriber**](docs/Api/SubscribersApi.md#updatingasubscriber) | Updates a subscriber in the specified mailing list. You can even update the subscribers email, if he has not unsubscribed.
[**UnsubscribingSubscribersFromAccount**](docs/Api/SubscribersApi.md#unsubscribingsubscribersfromaccount) | Unsubscribes a subscriber from the account.
[**UnsubscribingSubscribersFromMailingList**](docs/Api/SubscribersApi.md#unsubscribingsubscribersfrommailinglist) | Unsubscribes a subscriber from the specified mailing list. The subscriber is not deleted, but moved to the suppression list.
[**UnsubscribingSubscribersFromMailingListAndASpecifiedCampaign**](docs/Api/SubscribersApi.md#unsubscribingsubscribersfrommailinglistandaspecifiedcampaign) | Unsubscribes a subscriber from the specified mailing list and the specified campaign. The subscriber is not deleted, but moved to the suppression list. 
[**RemovingASubscriber**](docs/Api/SubscribersApi.md#removingasubscriber) | Removes a subscriber from the specified mailing list permanently (without moving to the suppression list).
[**RemovingMultipleSubscribers**](docs/Api/SubscribersApi.md#removingmultiplesubscribers) | Removes a list of subscribers from the specified mailing list permanently (without putting them in the suppression list). Any invalid email addresses specified will be ignored.


<a name="documentation-for-models"></a>
## Documentation for Models

 - [Model.A](docs/Model/A.md)
 - [Model.ABCampaignData](docs/Model/ABCampaignData.md)
 - [Model.AbTestCampaignSummaryResponse](docs/Model/AbTestCampaignSummaryResponse.md)
 - [Model.ActivityByLocationResponse](docs/Model/ActivityByLocationResponse.md)
 - [Model.AddingCriteriaToSegmentsRequest](docs/Model/AddingCriteriaToSegmentsRequest.md)
 - [Model.AddingCriteriaToSegmentsResponse](docs/Model/AddingCriteriaToSegmentsResponse.md)
 - [Model.AddingMultipleSubscribersRequest](docs/Model/AddingMultipleSubscribersRequest.md)
 - [Model.AddingMultipleSubscribersResponse](docs/Model/AddingMultipleSubscribersResponse.md)
 - [Model.AddingSubscribersRequest](docs/Model/AddingSubscribersRequest.md)
 - [Model.AddingSubscribersResponse](docs/Model/AddingSubscribersResponse.md)
 - [Model.Analytic](docs/Model/Analytic.md)
 - [Model.B](docs/Model/B.md)
 - [Model.Campaign](docs/Model/Campaign.md)
 - [Model.CampaignSummaryResponse](docs/Model/CampaignSummaryResponse.md)
 - [Model.CloningAnExistingCampaignResponse](docs/Model/CloningAnExistingCampaignResponse.md)
 - [Model.Context](docs/Model/Context.md)
 - [Model.Context110](docs/Model/Context110.md)
 - [Model.Context118](docs/Model/Context118.md)
 - [Model.Context132](docs/Model/Context132.md)
 - [Model.Context140](docs/Model/Context140.md)
 - [Model.Context145](docs/Model/Context145.md)
 - [Model.Context148](docs/Model/Context148.md)
 - [Model.Context17](docs/Model/Context17.md)
 - [Model.Context32](docs/Model/Context32.md)
 - [Model.Context37](docs/Model/Context37.md)
 - [Model.Context52](docs/Model/Context52.md)
 - [Model.Context64](docs/Model/Context64.md)
 - [Model.Context66](docs/Model/Context66.md)
 - [Model.Context72](docs/Model/Context72.md)
 - [Model.Context84](docs/Model/Context84.md)
 - [Model.Context89](docs/Model/Context89.md)
 - [Model.Context93](docs/Model/Context93.md)
 - [Model.CreatingACustomFieldRequest](docs/Model/CreatingACustomFieldRequest.md)
 - [Model.CreatingACustomFieldResponse](docs/Model/CreatingACustomFieldResponse.md)
 - [Model.CreatingADraftCampaignRequest](docs/Model/CreatingADraftCampaignRequest.md)
 - [Model.CreatingADraftCampaignResponse](docs/Model/CreatingADraftCampaignResponse.md)
 - [Model.CreatingAMailingListRequest](docs/Model/CreatingAMailingListRequest.md)
 - [Model.CreatingAMailingListResponse](docs/Model/CreatingAMailingListResponse.md)
 - [Model.CreatingANewSegmentRequest](docs/Model/CreatingANewSegmentRequest.md)
 - [Model.CreatingANewSegmentResponse](docs/Model/CreatingANewSegmentResponse.md)
 - [Model.Criterion](docs/Model/Criterion.md)
 - [Model.CustomField](docs/Model/CustomField.md)
 - [Model.CustomField53](docs/Model/CustomField53.md)
 - [Model.CustomFieldsDefinition](docs/Model/CustomFieldsDefinition.md)
 - [Model.DeletingACampaignResponse](docs/Model/DeletingACampaignResponse.md)
 - [Model.DeletingAMailingListResponse](docs/Model/DeletingAMailingListResponse.md)
 - [Model.DeletingASegmentResponse](docs/Model/DeletingASegmentResponse.md)
 - [Model.Format](docs/Model/Format.md)
 - [Model.GetAllCampaignsResponse](docs/Model/GetAllCampaignsResponse.md)
 - [Model.GetCampaignStatisticsResponse](docs/Model/GetCampaignStatisticsResponse.md)
 - [Model.GetCampaignStatisticsWithPagingFilteredResponse](docs/Model/GetCampaignStatisticsWithPagingFilteredResponse.md)
 - [Model.GetCampaignsByPageAndPagesizeResponse](docs/Model/GetCampaignsByPageAndPagesizeResponse.md)
 - [Model.GetCampaignsByPageResponse](docs/Model/GetCampaignsByPageResponse.md)
 - [Model.GetSubscriberByEmailAddressResponse](docs/Model/GetSubscriberByEmailAddressResponse.md)
 - [Model.GetSubscriberByIdResponse](docs/Model/GetSubscriberByIdResponse.md)
 - [Model.GettingAllActiveMailingListsResponse](docs/Model/GettingAllActiveMailingListsResponse.md)
 - [Model.GettingAllActiveMailingListsWithPagingResponse](docs/Model/GettingAllActiveMailingListsWithPagingResponse.md)
 - [Model.GettingAllYourSendersResponse](docs/Model/GettingAllYourSendersResponse.md)
 - [Model.GettingCampaignDetailsResponse](docs/Model/GettingCampaignDetailsResponse.md)
 - [Model.GettingMailingListDetailsResponse](docs/Model/GettingMailingListDetailsResponse.md)
 - [Model.GettingSegmentDetailsResponse](docs/Model/GettingSegmentDetailsResponse.md)
 - [Model.GettingSegmentSubscribersResponse](docs/Model/GettingSegmentSubscribersResponse.md)
 - [Model.GettingSegmentsResponse](docs/Model/GettingSegmentsResponse.md)
 - [Model.GettingSenderDetailsResponse](docs/Model/GettingSenderDetailsResponse.md)
 - [Model.GettingSubscribersResponse](docs/Model/GettingSubscribersResponse.md)
 - [Model.ImportOperation](docs/Model/ImportOperation.md)
 - [Model.ImportOperation19](docs/Model/ImportOperation19.md)
 - [Model.LinkActivityResponse](docs/Model/LinkActivityResponse.md)
 - [Model.MailingList](docs/Model/MailingList.md)
 - [Model.MailingList68](docs/Model/MailingList68.md)
 - [Model.MailingList69](docs/Model/MailingList69.md)
 - [Model.MailingList85](docs/Model/MailingList85.md)
 - [Model.MailingLists](docs/Model/MailingLists.md)
 - [Model.MailingLists119](docs/Model/MailingLists119.md)
 - [Model.MailingLists134](docs/Model/MailingLists134.md)
 - [Model.Paging](docs/Model/Paging.md)
 - [Model.Paging76](docs/Model/Paging76.md)
 - [Model.RemovingACustomFieldResponse](docs/Model/RemovingACustomFieldResponse.md)
 - [Model.RemovingASubscriberRequest](docs/Model/RemovingASubscriberRequest.md)
 - [Model.RemovingASubscriberResponse](docs/Model/RemovingASubscriberResponse.md)
 - [Model.RemovingMultipleSubscribersRequest](docs/Model/RemovingMultipleSubscribersRequest.md)
 - [Model.RemovingMultipleSubscribersResponse](docs/Model/RemovingMultipleSubscribersResponse.md)
 - [Model.ReplyToEmail](docs/Model/ReplyToEmail.md)
 - [Model.SchedulingACampaignRequest](docs/Model/SchedulingACampaignRequest.md)
 - [Model.SchedulingACampaignResponse](docs/Model/SchedulingACampaignResponse.md)
 - [Model.Segment](docs/Model/Segment.md)
 - [Model.Sender](docs/Model/Sender.md)
 - [Model.SendingACampaignResponse](docs/Model/SendingACampaignResponse.md)
 - [Model.ShortBy](docs/Model/ShortBy.md)
 - [Model.SortMethod](docs/Model/SortMethod.md)
 - [Model.Status](docs/Model/Status.md)
 - [Model.Subscriber](docs/Model/Subscriber.md)
 - [Model.Subscribers](docs/Model/Subscribers.md)
 - [Model.Subscribers150](docs/Model/Subscribers150.md)
 - [Model.TestingACampaignRequest](docs/Model/TestingACampaignRequest.md)
 - [Model.TestingACampaignResponse](docs/Model/TestingACampaignResponse.md)
 - [Model.Type](docs/Model/Type.md)
 - [Model.UnschedulingACampaignResponse](docs/Model/UnschedulingACampaignResponse.md)
 - [Model.UnsubscribingSubscribersFromAccountRequest](docs/Model/UnsubscribingSubscribersFromAccountRequest.md)
 - [Model.UnsubscribingSubscribersFromAccountResponse](docs/Model/UnsubscribingSubscribersFromAccountResponse.md)
 - [Model.UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignRequest](docs/Model/UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignRequest.md)
 - [Model.UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignResponse](docs/Model/UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignResponse.md)
 - [Model.UnsubscribingSubscribersFromMailingListRequest](docs/Model/UnsubscribingSubscribersFromMailingListRequest.md)
 - [Model.UnsubscribingSubscribersFromMailingListResponse](docs/Model/UnsubscribingSubscribersFromMailingListResponse.md)
 - [Model.UpdatingACustomFieldRequest](docs/Model/UpdatingACustomFieldRequest.md)
 - [Model.UpdatingACustomFieldResponse](docs/Model/UpdatingACustomFieldResponse.md)
 - [Model.UpdatingADraftCampaignRequest](docs/Model/UpdatingADraftCampaignRequest.md)
 - [Model.UpdatingADraftCampaignResponse](docs/Model/UpdatingADraftCampaignResponse.md)
 - [Model.UpdatingAMailingListRequest](docs/Model/UpdatingAMailingListRequest.md)
 - [Model.UpdatingAMailingListResponse](docs/Model/UpdatingAMailingListResponse.md)
 - [Model.UpdatingASegmentRequest](docs/Model/UpdatingASegmentRequest.md)
 - [Model.UpdatingASegmentResponse](docs/Model/UpdatingASegmentResponse.md)
 - [Model.UpdatingASubscriberRequest](docs/Model/UpdatingASubscriberRequest.md)
 - [Model.UpdatingASubscriberResponse](docs/Model/UpdatingASubscriberResponse.md)
 - [Model.UpdatingSegmentCriteriaRequest](docs/Model/UpdatingSegmentCriteriaRequest.md)
 - [Model.UpdatingSegmentCriteriaResponse](docs/Model/UpdatingSegmentCriteriaResponse.md)
 - [Model.WithStatistics](docs/Model/WithStatistics.md)


