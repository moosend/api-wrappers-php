# Swagger\Client\CampaignsApi

All URIs are relative to *https://api.moosend.com/v3*

Method | HTTP request | Description
------------- | ------------- | -------------
[**aBTestCampaignSummary**](CampaignsApi.md#aBTestCampaignSummary) | **GET** /campaigns/{CampaignID}/view_ab_summary.{Format} | AB Test Campaign Summary
[**activityByLocation**](CampaignsApi.md#activityByLocation) | **GET** /campaigns/{CampaignID}/stats/countries.{Format} | Activity By Location
[**campaignSummary**](CampaignsApi.md#campaignSummary) | **GET** /campaigns/{CampaignID}/view_summary.{Format} | Campaign Summary
[**cloningAnExistingCampaign**](CampaignsApi.md#cloningAnExistingCampaign) | **POST** /campaigns/{CampaignID}/clone.{Format} | Cloning An Existing Campaign
[**creatingADraftCampaign**](CampaignsApi.md#creatingADraftCampaign) | **POST** /campaigns/create.{Format} | Creating A Draft Campaign
[**deletingACampaign**](CampaignsApi.md#deletingACampaign) | **DELETE** /campaigns/{CampaignID}/delete.{Format} | Deleting A Campaign
[**getAllCampaigns**](CampaignsApi.md#getAllCampaigns) | **GET** /campaigns.{Format} | Get All Campaigns
[**getCampaignStatisticsWithPagingFiltered**](CampaignsApi.md#getCampaignStatisticsWithPagingFiltered) | **GET** /campaigns/{CampaignID}/stats/{Type}.{Format} | Get Campaign Statistics With Paging &amp; Filtered
[**getCampaignsByPage**](CampaignsApi.md#getCampaignsByPage) | **GET** /campaigns/{Page}.{Format} | Get Campaigns By Page
[**getCampaignsByPageAndPagesize**](CampaignsApi.md#getCampaignsByPageAndPagesize) | **GET** /campaigns/{Page}/{PageSize}.{Format} | Get Campaigns By Page And Pagesize
[**gettingAllYourSenders**](CampaignsApi.md#gettingAllYourSenders) | **GET** /senders/find_all.{Format} | Getting All Your Senders
[**gettingCampaignDetails**](CampaignsApi.md#gettingCampaignDetails) | **GET** /campaigns/{CampaignID}/view.{Format} | Getting Campaign Details
[**gettingSenderDetails**](CampaignsApi.md#gettingSenderDetails) | **GET** /senders/find_one.{Format} | Getting Sender Details
[**linkActivity**](CampaignsApi.md#linkActivity) | **GET** /campaigns/{CampaignID}/stats/links.{Format} | Link Activity
[**schedulingACampaign**](CampaignsApi.md#schedulingACampaign) | **POST** /campaigns/{CampaignID}/schedule.{Format} | Scheduling A Campaign
[**sendingACampaign**](CampaignsApi.md#sendingACampaign) | **POST** /campaigns/{CampaignID}/send.{Format} | Sending a campaign
[**testingACampaign**](CampaignsApi.md#testingACampaign) | **POST** /campaigns/{CampaignID}/send_test.{Format} | Testing a campaign
[**unschedulingACampaign**](CampaignsApi.md#unschedulingACampaign) | **POST** /campaigns/{CampaignID}/unschedule.{Format} | Unscheduling a campaign
[**updatingADraftCampaign**](CampaignsApi.md#updatingADraftCampaign) | **POST** /campaigns/{CampaignID}/update.{Format} | Updating A Draft Campaign


# **aBTestCampaignSummary**
> \Swagger\Client\Model\AbTestCampaignSummaryResponse aBTestCampaignSummary($format, $apikey, $campaign_id)

AB Test Campaign Summary

Provides a basic summary of the results for a sent AB test campaign, separately for each version (A and B), such as the number of recipients, opens, clicks, bounces, unsubscribes, forwards etc to date.

### Example
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

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the requested AB test campaign |

### Return type

[**\Swagger\Client\Model\AbTestCampaignSummaryResponse**](../Model/AbTestCampaignSummaryResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **activityByLocation**
> \Swagger\Client\Model\ActivityByLocationResponse activityByLocation($format, $apikey, $campaign_id)

Activity By Location

Returns a detailed report of your campaign opens (unique and total) by country.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the requested campaign

try {
    $result = $api_instance->activityByLocation($format, $apikey, $campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->activityByLocation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the requested campaign |

### Return type

[**\Swagger\Client\Model\ActivityByLocationResponse**](../Model/ActivityByLocationResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignSummary**
> \Swagger\Client\Model\CampaignSummaryResponse campaignSummary($format, $apikey, $campaign_id)

Campaign Summary

Provides a basic summary of the results for any sent campaign such as the number of recipients, opens, clicks, bounces, unsubscribes, forwards etc. to date.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the requested campaign

try {
    $result = $api_instance->campaignSummary($format, $apikey, $campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->campaignSummary: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the requested campaign |

### Return type

[**\Swagger\Client\Model\CampaignSummaryResponse**](../Model/CampaignSummaryResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **cloningAnExistingCampaign**
> \Swagger\Client\Model\CloningAnExistingCampaignResponse cloningAnExistingCampaign($format, $campaign_id, $apikey)

Cloning An Existing Campaign

Creates an exact copy of an existing campaign. The new campaign is created as a draft.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$campaign_id = "campaign_id_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.

try {
    $result = $api_instance->cloningAnExistingCampaign($format, $campaign_id, $apikey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->cloningAnExistingCampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **campaign_id** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |

### Return type

[**\Swagger\Client\Model\CloningAnExistingCampaignResponse**](../Model/CloningAnExistingCampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **creatingADraftCampaign**
> \Swagger\Client\Model\CreatingADraftCampaignResponse creatingADraftCampaign($format, $apikey, $body)

Creating A Draft Campaign

Creates a new campaign in your account. This method does not send the campaign, but rather creates it as a draft, ready for sending or testing.  You can choose to send either a regular campaign or an AB split campaign. Campaign content must be specified from a web location.  Ignore ***(A/B Split Campaign Option)*** if you want to create a regular campaign.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$body = new \Swagger\Client\Model\CreatingADraftCampaignRequest(); // \Swagger\Client\Model\CreatingADraftCampaignRequest | 

try {
    $result = $api_instance->creatingADraftCampaign($format, $apikey, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->creatingADraftCampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **body** | [**\Swagger\Client\Model\CreatingADraftCampaignRequest**](../Model/CreatingADraftCampaignRequest.md)|  |

### Return type

[**\Swagger\Client\Model\CreatingADraftCampaignResponse**](../Model/CreatingADraftCampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deletingACampaign**
> \Swagger\Client\Model\DeletingACampaignResponse deletingACampaign($format, $apikey, $campaign_id)

Deleting A Campaign

Deletes a campaign from your account, draft or even sent.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the draft campaign to update.

try {
    $result = $api_instance->deletingACampaign($format, $apikey, $campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->deletingACampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the draft campaign to update. |

### Return type

[**\Swagger\Client\Model\DeletingACampaignResponse**](../Model/DeletingACampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAllCampaigns**
> \Swagger\Client\Model\GetAllCampaignsResponse getAllCampaigns($format, $apikey)

Get All Campaigns

Returns a list of all campaigns in your account with detailed information. Because the results for this call could be quite big, paging information is required as input.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.

try {
    $result = $api_instance->getAllCampaigns($format, $apikey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->getAllCampaigns: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |

### Return type

[**\Swagger\Client\Model\GetAllCampaignsResponse**](../Model/GetAllCampaignsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCampaignStatisticsWithPagingFiltered**
> \Swagger\Client\Model\GetCampaignStatisticsWithPagingFilteredResponse getCampaignStatisticsWithPagingFiltered($format, $apikey, $campaign_id, $type, $page, $page_size, $from, $to)

Get Campaign Statistics With Paging & Filtered

Returns a detailed list of statistics for a given campaign based on activity such as emails sent, opened, bounced, link clicked, etc.  Because the results for this call could be quite big, paging information is required as input.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the requested AB test campaign
$type = "type_example"; // string | The type of the activity to display results for. This must be one of the following values : * Sent : To get information about when and to which recipients the campaign was sent. * Opened : To get information about who opened the campaign. * LinkClicked : To get information about who clicked on which link. * Forward : To get information about who forwarded the campaign using the relevant link on the email body and when. * Unsubscribed : To get information about who unsubscribed from the campaign by clicking on the unsubscribe link and when. * Bounced : To get information about which email recipients failed to receive the campaign. If not specified, the value Sent will be used by default.
$page = "page_example"; // string | The page number to display results for. If not specified, the first page will be returned.
$page_size = "page_size_example"; // string | The maximum number of results per page. This must be a positive integer up to 100. If not specified, 50 results per page will be returned.  If a value greater than 100 is specified, it will be treated as 100.
$from = "from_example"; // string | A date value that specifies since when to start returning results. If omitted, results will be returned from the moment the campaign was sent.
$to = "to_example"; // string | A date value that specifies up to when to return results. If omitted, results will be returned up to date.

try {
    $result = $api_instance->getCampaignStatisticsWithPagingFiltered($format, $apikey, $campaign_id, $type, $page, $page_size, $from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->getCampaignStatisticsWithPagingFiltered: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the requested AB test campaign |
 **type** | **string**| The type of the activity to display results for. This must be one of the following values : * Sent : To get information about when and to which recipients the campaign was sent. * Opened : To get information about who opened the campaign. * LinkClicked : To get information about who clicked on which link. * Forward : To get information about who forwarded the campaign using the relevant link on the email body and when. * Unsubscribed : To get information about who unsubscribed from the campaign by clicking on the unsubscribe link and when. * Bounced : To get information about which email recipients failed to receive the campaign. If not specified, the value Sent will be used by default. |
 **page** | **string**| The page number to display results for. If not specified, the first page will be returned. | [optional]
 **page_size** | **string**| The maximum number of results per page. This must be a positive integer up to 100. If not specified, 50 results per page will be returned.  If a value greater than 100 is specified, it will be treated as 100. | [optional]
 **from** | **string**| A date value that specifies since when to start returning results. If omitted, results will be returned from the moment the campaign was sent. | [optional]
 **to** | **string**| A date value that specifies up to when to return results. If omitted, results will be returned up to date. | [optional]

### Return type

[**\Swagger\Client\Model\GetCampaignStatisticsWithPagingFilteredResponse**](../Model/GetCampaignStatisticsWithPagingFilteredResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCampaignsByPage**
> \Swagger\Client\Model\GetCampaignsByPageResponse getCampaignsByPage($format, $apikey, $page)

Get Campaigns By Page

Returns a list of all campaigns in your account with detailed information. Because the results for this call could be quite big, paging information is required as input.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$page = 1.2; // double | The page number to display results for.

try {
    $result = $api_instance->getCampaignsByPage($format, $apikey, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->getCampaignsByPage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **page** | **double**| The page number to display results for. |

### Return type

[**\Swagger\Client\Model\GetCampaignsByPageResponse**](../Model/GetCampaignsByPageResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCampaignsByPageAndPagesize**
> \Swagger\Client\Model\GetCampaignsByPageAndPagesizeResponse getCampaignsByPageAndPagesize($format, $apikey, $page, $page_size, $short_by, $sort_method)

Get Campaigns By Page And Pagesize

Returns a list of all campaigns in your account with detailed information. Because the results for this call could be quite big, paging information is required as input.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$page = 1.2; // double | The page number to display results for.
$page_size = 1.2; // double | The maximum number of results per page.  This must be a positive integer up to 100. If not specified, 50 results per page will be returned.  If a value greater than 100 is specified, it will be treated as 100.
$short_by = "short_by_example"; // string | The name of the campaign property to sort results by. If not specified, results will be sorted by the CreatedOn property
$sort_method = "sort_method_example"; // string | The method to sort results: ASC for ascending, DESC for descending. If not specified, `ASC` will be assumed

try {
    $result = $api_instance->getCampaignsByPageAndPagesize($format, $apikey, $page, $page_size, $short_by, $sort_method);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->getCampaignsByPageAndPagesize: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **page** | **double**| The page number to display results for. |
 **page_size** | **double**| The maximum number of results per page.  This must be a positive integer up to 100. If not specified, 50 results per page will be returned.  If a value greater than 100 is specified, it will be treated as 100. |
 **short_by** | **string**| The name of the campaign property to sort results by. If not specified, results will be sorted by the CreatedOn property | [optional]
 **sort_method** | **string**| The method to sort results: ASC for ascending, DESC for descending. If not specified, &#x60;ASC&#x60; will be assumed | [optional]

### Return type

[**\Swagger\Client\Model\GetCampaignsByPageAndPagesizeResponse**](../Model/GetCampaignsByPageAndPagesizeResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingAllYourSenders**
> \Swagger\Client\Model\GettingAllYourSendersResponse gettingAllYourSenders($format, $apikey)

Getting All Your Senders

Gets a list of your active senders in your account. You may specify any email address of these senders when sending a campaign.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.

try {
    $result = $api_instance->gettingAllYourSenders($format, $apikey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->gettingAllYourSenders: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |

### Return type

[**\Swagger\Client\Model\GettingAllYourSendersResponse**](../Model/GettingAllYourSendersResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingCampaignDetails**
> \Swagger\Client\Model\GettingCampaignDetailsResponse gettingCampaignDetails($format, $apikey, $campaign_id)

Getting Campaign Details

Returns a complete set of properties that describe the requested campaign in detail. No statistics are included in the result.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the requested campaign

try {
    $result = $api_instance->gettingCampaignDetails($format, $apikey, $campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->gettingCampaignDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the requested campaign |

### Return type

[**\Swagger\Client\Model\GettingCampaignDetailsResponse**](../Model/GettingCampaignDetailsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingSenderDetails**
> \Swagger\Client\Model\GettingSenderDetailsResponse gettingSenderDetails($format, $email, $apikey)

Getting Sender Details

Returns basic information for the specified sender identified by its email address.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$email = "email_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.

try {
    $result = $api_instance->gettingSenderDetails($format, $email, $apikey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->gettingSenderDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **email** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |

### Return type

[**\Swagger\Client\Model\GettingSenderDetailsResponse**](../Model/GettingSenderDetailsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **linkActivity**
> \Swagger\Client\Model\LinkActivityResponse linkActivity($format, $apikey, $campaign_id)

Link Activity

Returns a list with your campaign links and how many clicks have been made by your recipients, either unique or total.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the requested campaign

try {
    $result = $api_instance->linkActivity($format, $apikey, $campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->linkActivity: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the requested campaign |

### Return type

[**\Swagger\Client\Model\LinkActivityResponse**](../Model/LinkActivityResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **schedulingACampaign**
> \Swagger\Client\Model\SchedulingACampaignResponse schedulingACampaign($format, $apikey, $campaign_id, $body)

Scheduling A Campaign

Assigns a scheduled date and time at which the campaign will be delivered.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the campaign to be scheduled
$body = new \Swagger\Client\Model\SchedulingACampaignRequest(); // \Swagger\Client\Model\SchedulingACampaignRequest | 

try {
    $result = $api_instance->schedulingACampaign($format, $apikey, $campaign_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->schedulingACampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the campaign to be scheduled |
 **body** | [**\Swagger\Client\Model\SchedulingACampaignRequest**](../Model/SchedulingACampaignRequest.md)|  |

### Return type

[**\Swagger\Client\Model\SchedulingACampaignResponse**](../Model/SchedulingACampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendingACampaign**
> \Swagger\Client\Model\SendingACampaignResponse sendingACampaign($format, $apikey, $campaign_id)

Sending a campaign

Sends an existing draft campaign to all recipients specified in its mailing list. The campaign is sent immediatelly.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the draft campaign to be sent.

try {
    $result = $api_instance->sendingACampaign($format, $apikey, $campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->sendingACampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the draft campaign to be sent. |

### Return type

[**\Swagger\Client\Model\SendingACampaignResponse**](../Model/SendingACampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **testingACampaign**
> \Swagger\Client\Model\TestingACampaignResponse testingACampaign($format, $apikey, $campaign_id, $body)

Testing a campaign

Sends a test email of a draft campaign to a list of email addresses you specify for previewing.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the draft campaign to be tested.
$body = new \Swagger\Client\Model\TestingACampaignRequest(); // \Swagger\Client\Model\TestingACampaignRequest | 

try {
    $result = $api_instance->testingACampaign($format, $apikey, $campaign_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->testingACampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the draft campaign to be tested. |
 **body** | [**\Swagger\Client\Model\TestingACampaignRequest**](../Model/TestingACampaignRequest.md)|  |

### Return type

[**\Swagger\Client\Model\TestingACampaignResponse**](../Model/TestingACampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **unschedulingACampaign**
> \Swagger\Client\Model\UnschedulingACampaignResponse unschedulingACampaign($format, $apikey, $campaign_id)

Unscheduling a campaign

Removes a previously defined scheduled date and time from a campaign, so that it will be delivered immediately if already queued or when sent.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the campaign to be scheduled

try {
    $result = $api_instance->unschedulingACampaign($format, $apikey, $campaign_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->unschedulingACampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the campaign to be scheduled |

### Return type

[**\Swagger\Client\Model\UnschedulingACampaignResponse**](../Model/UnschedulingACampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatingADraftCampaign**
> \Swagger\Client\Model\UpdatingADraftCampaignResponse updatingADraftCampaign($format, $apikey, $campaign_id, $body)

Updating A Draft Campaign

Updates properties of an existing draft A/B campaign in your account. Non-draft campaigns cannot be updated. Ignore ***(A/B Split Campaign Option)*** if you want to create a regular campaign.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\CampaignsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$campaign_id = "campaign_id_example"; // string | The ID of the draft campaign to update.
$body = new \Swagger\Client\Model\UpdatingADraftCampaignRequest(); // \Swagger\Client\Model\UpdatingADraftCampaignRequest | 

try {
    $result = $api_instance->updatingADraftCampaign($format, $apikey, $campaign_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->updatingADraftCampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **campaign_id** | **string**| The ID of the draft campaign to update. |
 **body** | [**\Swagger\Client\Model\UpdatingADraftCampaignRequest**](../Model/UpdatingADraftCampaignRequest.md)|  |

### Return type

[**\Swagger\Client\Model\UpdatingADraftCampaignResponse**](../Model/UpdatingADraftCampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

