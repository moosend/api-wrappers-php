# Swagger\Client\MailingListsApi

All URIs are relative to *https://api.moosend.com/v3*

Method | HTTP request | Description
------------- | ------------- | -------------
[**creatingACustomField**](MailingListsApi.md#creatingACustomField) | **POST** /lists/{MailingListID}/customfields/create.{Format} | Creating a custom field
[**creatingAMailingList**](MailingListsApi.md#creatingAMailingList) | **POST** /lists/create.{Format} | Creating a mailing list
[**deletingAMailingList**](MailingListsApi.md#deletingAMailingList) | **DELETE** /lists/{MailingListID}/delete.{Format} | Deleting a mailing list
[**gettingAllActiveMailingLists**](MailingListsApi.md#gettingAllActiveMailingLists) | **GET** /lists.{Format} | Getting all active mailing lists
[**gettingAllActiveMailingListsWithPaging**](MailingListsApi.md#gettingAllActiveMailingListsWithPaging) | **GET** /lists/{Page}/{PageSize}.{Format} | Getting all active mailing lists with paging
[**gettingMailingListDetails**](MailingListsApi.md#gettingMailingListDetails) | **GET** /lists/{MailingListID}/details.{Format} | Getting mailing list details
[**removingACustomField**](MailingListsApi.md#removingACustomField) | **DELETE** /lists/{MailingListID}/customfields/{CustomFieldID}/delete.{Format} | Removing a custom field
[**updatingACustomField**](MailingListsApi.md#updatingACustomField) | **POST** /lists/{MailingListID}/customfields/{CustomFieldID}/update.{Format} | Updating a custom field
[**updatingAMailingList**](MailingListsApi.md#updatingAMailingList) | **POST** /lists/{MailingListID}/update.{Format} | Updating a mailing list


# **creatingACustomField**
> \Swagger\Client\Model\CreatingACustomFieldResponse creatingACustomField($format, $apikey, $mailing_list_id, $body)

Creating a custom field

Creates a new custom field in the specified mailing list.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MailingListsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list where the custom field will belong.
$body = new \Swagger\Client\Model\CreatingACustomFieldRequest(); // \Swagger\Client\Model\CreatingACustomFieldRequest | 

try {
    $result = $api_instance->creatingACustomField($format, $apikey, $mailing_list_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailingListsApi->creatingACustomField: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list where the custom field will belong. |
 **body** | [**\Swagger\Client\Model\CreatingACustomFieldRequest**](../Model/CreatingACustomFieldRequest.md)|  |

### Return type

[**\Swagger\Client\Model\CreatingACustomFieldResponse**](../Model/CreatingACustomFieldResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **creatingAMailingList**
> \Swagger\Client\Model\CreatingAMailingListResponse creatingAMailingList($format, $apikey, $body)

Creating a mailing list

Creates a new empty mailing list in your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MailingListsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$body = new \Swagger\Client\Model\CreatingAMailingListRequest(); // \Swagger\Client\Model\CreatingAMailingListRequest | 

try {
    $result = $api_instance->creatingAMailingList($format, $apikey, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailingListsApi->creatingAMailingList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **body** | [**\Swagger\Client\Model\CreatingAMailingListRequest**](../Model/CreatingAMailingListRequest.md)|  |

### Return type

[**\Swagger\Client\Model\CreatingAMailingListResponse**](../Model/CreatingAMailingListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deletingAMailingList**
> \Swagger\Client\Model\DeletingAMailingListResponse deletingAMailingList($format, $apikey, $mailing_list_id)

Deleting a mailing list

Deletes a mailing list from your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MailingListsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to be deleted.

try {
    $result = $api_instance->deletingAMailingList($format, $apikey, $mailing_list_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailingListsApi->deletingAMailingList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list to be deleted. |

### Return type

[**\Swagger\Client\Model\DeletingAMailingListResponse**](../Model/DeletingAMailingListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingAllActiveMailingLists**
> \Swagger\Client\Model\GettingAllActiveMailingListsResponse gettingAllActiveMailingLists($format, $apikey, $with_statistics, $short_by, $sort_method)

Getting all active mailing lists

Gets a list of your active mailing lists in your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MailingListsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$with_statistics = "with_statistics_example"; // string | Specifies whether to fetch statistics for the subscribers or not. If omitted, results will be returned with statistics by default.
$short_by = "short_by_example"; // string | The name of the campaign property to sort results by. If not specified, results will be sorted by the CreatedOn property
$sort_method = "sort_method_example"; // string | The method to sort results: ASC for ascending, DESC for descending. If not specified, `ASC` will be assumed

try {
    $result = $api_instance->gettingAllActiveMailingLists($format, $apikey, $with_statistics, $short_by, $sort_method);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailingListsApi->gettingAllActiveMailingLists: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **with_statistics** | **string**| Specifies whether to fetch statistics for the subscribers or not. If omitted, results will be returned with statistics by default. | [optional]
 **short_by** | **string**| The name of the campaign property to sort results by. If not specified, results will be sorted by the CreatedOn property | [optional]
 **sort_method** | **string**| The method to sort results: ASC for ascending, DESC for descending. If not specified, &#x60;ASC&#x60; will be assumed | [optional]

### Return type

[**\Swagger\Client\Model\GettingAllActiveMailingListsResponse**](../Model/GettingAllActiveMailingListsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingAllActiveMailingListsWithPaging**
> \Swagger\Client\Model\GettingAllActiveMailingListsWithPagingResponse gettingAllActiveMailingListsWithPaging($format, $apikey, $page, $page_size, $short_by, $sort_method)

Getting all active mailing lists with paging

Gets a list of your active mailing lists in your account. Because the results for this call could be quite big, paging information is required as input.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MailingListsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$page = 1.2; // double | The page that you want to get.
$page_size = 1.2; // double | Lists Per Page.
$short_by = "short_by_example"; // string | The name of the campaign property to sort results by. If not specified, results will be sorted by the CreatedOn property
$sort_method = "sort_method_example"; // string | The method to sort results: ASC for ascending, DESC for descending. If not specified, `ASC` will be assumed

try {
    $result = $api_instance->gettingAllActiveMailingListsWithPaging($format, $apikey, $page, $page_size, $short_by, $sort_method);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailingListsApi->gettingAllActiveMailingListsWithPaging: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **page** | **double**| The page that you want to get. |
 **page_size** | **double**| Lists Per Page. |
 **short_by** | **string**| The name of the campaign property to sort results by. If not specified, results will be sorted by the CreatedOn property | [optional]
 **sort_method** | **string**| The method to sort results: ASC for ascending, DESC for descending. If not specified, &#x60;ASC&#x60; will be assumed | [optional]

### Return type

[**\Swagger\Client\Model\GettingAllActiveMailingListsWithPagingResponse**](../Model/GettingAllActiveMailingListsWithPagingResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingMailingListDetails**
> \Swagger\Client\Model\GettingMailingListDetailsResponse gettingMailingListDetails($format, $mailing_list_id, $apikey, $with_statistics)

Getting mailing list details

Gets details for a given mailing list. You may include subscriber statistics in your results or not. Any segments existing for the requested mailing list will not be included in the results.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MailingListsApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to be returned.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$with_statistics = "with_statistics_example"; // string | Specifies whether to fetch statistics for the subscribers or not. If omitted, results will be returned with statistics by default.

try {
    $result = $api_instance->gettingMailingListDetails($format, $mailing_list_id, $apikey, $with_statistics);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailingListsApi->gettingMailingListDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list to be returned. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **with_statistics** | **string**| Specifies whether to fetch statistics for the subscribers or not. If omitted, results will be returned with statistics by default. | [optional]

### Return type

[**\Swagger\Client\Model\GettingMailingListDetailsResponse**](../Model/GettingMailingListDetailsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removingACustomField**
> \Swagger\Client\Model\RemovingACustomFieldResponse removingACustomField($format, $custom_field_id, $apikey, $mailing_list_id)

Removing a custom field

Removes a custom field definition from the specified mailing list.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MailingListsApi();
$format = "format_example"; // string | 
$custom_field_id = "custom_field_id_example"; // string | The ID of the custom field to be deleted.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list where the custom field belongs.

try {
    $result = $api_instance->removingACustomField($format, $custom_field_id, $apikey, $mailing_list_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailingListsApi->removingACustomField: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **custom_field_id** | **string**| The ID of the custom field to be deleted. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list where the custom field belongs. |

### Return type

[**\Swagger\Client\Model\RemovingACustomFieldResponse**](../Model/RemovingACustomFieldResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatingACustomField**
> \Swagger\Client\Model\UpdatingACustomFieldResponse updatingACustomField($format, $custom_field_id, $apikey, $mailing_list_id, $body)

Updating a custom field

Updates the properties of an existing custom field in the specified mailing list.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MailingListsApi();
$format = "format_example"; // string | 
$custom_field_id = "custom_field_id_example"; // string | The ID of the custom field to be updated.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list where the custom field belongs.
$body = new \Swagger\Client\Model\UpdatingACustomFieldRequest(); // \Swagger\Client\Model\UpdatingACustomFieldRequest | 

try {
    $result = $api_instance->updatingACustomField($format, $custom_field_id, $apikey, $mailing_list_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailingListsApi->updatingACustomField: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **custom_field_id** | **string**| The ID of the custom field to be updated. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list where the custom field belongs. |
 **body** | [**\Swagger\Client\Model\UpdatingACustomFieldRequest**](../Model/UpdatingACustomFieldRequest.md)|  |

### Return type

[**\Swagger\Client\Model\UpdatingACustomFieldResponse**](../Model/UpdatingACustomFieldResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatingAMailingList**
> \Swagger\Client\Model\UpdatingAMailingListResponse updatingAMailingList($format, $apikey, $mailing_list_id, $body)

Updating a mailing list

Updates the properties of an existing mailing list.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MailingListsApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to be updated.
$body = new \Swagger\Client\Model\UpdatingAMailingListRequest(); // \Swagger\Client\Model\UpdatingAMailingListRequest | 

try {
    $result = $api_instance->updatingAMailingList($format, $apikey, $mailing_list_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailingListsApi->updatingAMailingList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list to be updated. |
 **body** | [**\Swagger\Client\Model\UpdatingAMailingListRequest**](../Model/UpdatingAMailingListRequest.md)|  |

### Return type

[**\Swagger\Client\Model\UpdatingAMailingListResponse**](../Model/UpdatingAMailingListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

