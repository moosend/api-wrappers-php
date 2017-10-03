# Swagger\Client\SegmentsApi

All URIs are relative to *https://api.moosend.com/v3*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addingCriteriaToSegments**](SegmentsApi.md#addingCriteriaToSegments) | **POST** /lists/{MailingListID}/segments/{SegmentID}/criteria/add.{Format} | Adding criteria to segments
[**creatingANewSegment**](SegmentsApi.md#creatingANewSegment) | **POST** /lists/{MailingListID}/segments/create.{Format} | Creating a new segment
[**deletingASegment**](SegmentsApi.md#deletingASegment) | **DELETE** /lists/{MailingListID}/segments/{SegmentID}/delete.{Format} | Deleting A Segment
[**gettingSegmentDetails**](SegmentsApi.md#gettingSegmentDetails) | **GET** /lists/{MailingListID}/segments/{SegmentID}/details.{Format} | Getting segment details
[**gettingSegmentSubscribers**](SegmentsApi.md#gettingSegmentSubscribers) | **GET** /lists/{MailingListID}/segments/{SegmentID}/members.{Format} | Getting segment subscribers
[**gettingSegments**](SegmentsApi.md#gettingSegments) | **GET** /lists/{MailingListID}/segments.{Format} | Getting segments
[**updatingASegment**](SegmentsApi.md#updatingASegment) | **POST** /lists/{MailingListID}/segments/{SegmentID}/update.{Format} | Updating a segment
[**updatingSegmentCriteria**](SegmentsApi.md#updatingSegmentCriteria) | **POST** /lists/{MailingListID}/segments/{SegmentID}/criteria/{CriteriaID}/update.{Format} | Updating segment criteria


# **addingCriteriaToSegments**
> \Swagger\Client\Model\AddingCriteriaToSegmentsResponse addingCriteriaToSegments($format, $mailing_list_id, $apikey, $segment_id, $body)

Adding criteria to segments

Adds a new criterion (a rule) to the specified segment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SegmentsApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list the specified segment belongs.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$segment_id = "segment_id_example"; // string | The ID of the segment to update.
$body = new \Swagger\Client\Model\AddingCriteriaToSegmentsRequest(); // \Swagger\Client\Model\AddingCriteriaToSegmentsRequest | 

try {
    $result = $api_instance->addingCriteriaToSegments($format, $mailing_list_id, $apikey, $segment_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->addingCriteriaToSegments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list the specified segment belongs. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **segment_id** | **string**| The ID of the segment to update. |
 **body** | [**\Swagger\Client\Model\AddingCriteriaToSegmentsRequest**](../Model/AddingCriteriaToSegmentsRequest.md)|  |

### Return type

[**\Swagger\Client\Model\AddingCriteriaToSegmentsResponse**](../Model/AddingCriteriaToSegmentsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **creatingANewSegment**
> \Swagger\Client\Model\CreatingANewSegmentResponse creatingANewSegment($format, $mailing_list_id, $apikey, $body)

Creating a new segment

Creates a new empty segment (without criteria) for the given mailing list. You may specify the name of the segment and the way the criteria will match together.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SegmentsApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list the specified segment belongs
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$body = new \Swagger\Client\Model\CreatingANewSegmentRequest(); // \Swagger\Client\Model\CreatingANewSegmentRequest | 

try {
    $result = $api_instance->creatingANewSegment($format, $mailing_list_id, $apikey, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->creatingANewSegment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list the specified segment belongs |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **body** | [**\Swagger\Client\Model\CreatingANewSegmentRequest**](../Model/CreatingANewSegmentRequest.md)|  |

### Return type

[**\Swagger\Client\Model\CreatingANewSegmentResponse**](../Model/CreatingANewSegmentResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deletingASegment**
> \Swagger\Client\Model\DeletingASegmentResponse deletingASegment($format, $mailing_list_id, $apikey, $segment_id)

Deleting A Segment

Deletes a segment along with its criteria from the mailing list. The subscribers of the mailing list that the segment returned are not deleted or affected in any way.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SegmentsApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list the specified segment belongs.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$segment_id = "segment_id_example"; // string | The ID of the segment to update.

try {
    $result = $api_instance->deletingASegment($format, $mailing_list_id, $apikey, $segment_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->deletingASegment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list the specified segment belongs. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **segment_id** | **string**| The ID of the segment to update. |

### Return type

[**\Swagger\Client\Model\DeletingASegmentResponse**](../Model/DeletingASegmentResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingSegmentDetails**
> \Swagger\Client\Model\GettingSegmentDetailsResponse gettingSegmentDetails($format, $mailing_list_id, $segment_id, $apikey)

Getting segment details

Gets detailed information on a specific segment and its criteria. However, it does not include the subscribers returned by the segment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SegmentsApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list the specified segment belongs
$segment_id = "segment_id_example"; // string | The ID of the segment to fetch results for.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.

try {
    $result = $api_instance->gettingSegmentDetails($format, $mailing_list_id, $segment_id, $apikey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->gettingSegmentDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list the specified segment belongs |
 **segment_id** | **string**| The ID of the segment to fetch results for. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |

### Return type

[**\Swagger\Client\Model\GettingSegmentDetailsResponse**](../Model/GettingSegmentDetailsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingSegmentSubscribers**
> \Swagger\Client\Model\GettingSegmentSubscribersResponse gettingSegmentSubscribers($format, $mailing_list_id, $segment_id, $apikey)

Getting segment subscribers

Gets a list of the subscribers that the specified segment returns according to its criteria. Because the results for this call could be quite big, paging information is required as input.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SegmentsApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list the specified segment belongs
$segment_id = "segment_id_example"; // string | The ID of the segment to fetch results for.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.

try {
    $result = $api_instance->gettingSegmentSubscribers($format, $mailing_list_id, $segment_id, $apikey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->gettingSegmentSubscribers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list the specified segment belongs |
 **segment_id** | **string**| The ID of the segment to fetch results for. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |

### Return type

[**\Swagger\Client\Model\GettingSegmentSubscribersResponse**](../Model/GettingSegmentSubscribersResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingSegments**
> \Swagger\Client\Model\GettingSegmentsResponse gettingSegments($format, $mailing_list_id, $apikey)

Getting segments

Get a list of all segments with their criteria for the given mailing list.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SegmentsApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.

try {
    $result = $api_instance->gettingSegments($format, $mailing_list_id, $apikey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->gettingSegments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |

### Return type

[**\Swagger\Client\Model\GettingSegmentsResponse**](../Model/GettingSegmentsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatingASegment**
> \Swagger\Client\Model\UpdatingASegmentResponse updatingASegment($format, $mailing_list_id, $apikey, $segment_id, $body)

Updating a segment

Updates the properties of an existing segment. You may update the name and match type of the segment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SegmentsApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list the specified segment belongs
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$segment_id = "segment_id_example"; // string | The ID of the segment to update.
$body = new \Swagger\Client\Model\UpdatingASegmentRequest(); // \Swagger\Client\Model\UpdatingASegmentRequest | 

try {
    $result = $api_instance->updatingASegment($format, $mailing_list_id, $apikey, $segment_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->updatingASegment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list the specified segment belongs |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **segment_id** | **string**| The ID of the segment to update. |
 **body** | [**\Swagger\Client\Model\UpdatingASegmentRequest**](../Model/UpdatingASegmentRequest.md)|  |

### Return type

[**\Swagger\Client\Model\UpdatingASegmentResponse**](../Model/UpdatingASegmentResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatingSegmentCriteria**
> \Swagger\Client\Model\UpdatingSegmentCriteriaResponse updatingSegmentCriteria($format, $mailing_list_id, $apikey, $segment_id, $criteria_id, $body)

Updating segment criteria

Updates an existing criterion in the specified segment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SegmentsApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list the specified segment belongs.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$segment_id = "segment_id_example"; // string | The ID of the segment to update.
$criteria_id = 1.2; // double | The ID of the criterion to process.
$body = new \Swagger\Client\Model\UpdatingSegmentCriteriaRequest(); // \Swagger\Client\Model\UpdatingSegmentCriteriaRequest | 

try {
    $result = $api_instance->updatingSegmentCriteria($format, $mailing_list_id, $apikey, $segment_id, $criteria_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SegmentsApi->updatingSegmentCriteria: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list the specified segment belongs. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **segment_id** | **string**| The ID of the segment to update. |
 **criteria_id** | **double**| The ID of the criterion to process. |
 **body** | [**\Swagger\Client\Model\UpdatingSegmentCriteriaRequest**](../Model/UpdatingSegmentCriteriaRequest.md)|  |

### Return type

[**\Swagger\Client\Model\UpdatingSegmentCriteriaResponse**](../Model/UpdatingSegmentCriteriaResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

