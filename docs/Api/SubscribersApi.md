# Swagger\Client\SubscribersApi

All URIs are relative to *https://api.moosend.com/v3*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addingMultipleSubscribers**](SubscribersApi.md#addingMultipleSubscribers) | **POST** /subscribers/{MailingListID}/subscribe_many.{Format} | Adding multiple subscribers
[**addingSubscribers**](SubscribersApi.md#addingSubscribers) | **POST** /subscribers/{MailingListID}/subscribe.{Format} | Adding subscribers
[**getSubscriberByEmailAddress**](SubscribersApi.md#getSubscriberByEmailAddress) | **GET** /subscribers/{MailingListID}/view.{Format} | Get subscriber by email address
[**getSubscriberById**](SubscribersApi.md#getSubscriberById) | **GET** /subscribers/{MailingListID}/find/{SubscriberID}.{Format} | Get subscriber by id
[**gettingSubscribers**](SubscribersApi.md#gettingSubscribers) | **GET** /lists/{MailingListID}/subscribers/{Status}.{Format} | Getting subscribers
[**removingASubscriber**](SubscribersApi.md#removingASubscriber) | **POST** /subscribers/{MailingListID}/remove.{Format} | Removing a subscriber
[**removingMultipleSubscribers**](SubscribersApi.md#removingMultipleSubscribers) | **POST** /subscribers/{MailingListID}/remove_many.{Format} | Removing multiple subscribers
[**unsubscribingSubscribersFromAccount**](SubscribersApi.md#unsubscribingSubscribersFromAccount) | **POST** /subscribers/unsubscribe.{Format} | Unsubscribing subscribers from account
[**unsubscribingSubscribersFromMailingList**](SubscribersApi.md#unsubscribingSubscribersFromMailingList) | **POST** /subscribers/{MailingListID}/unsubscribe.{Format} | Unsubscribing subscribers from mailing list
[**unsubscribingSubscribersFromMailingListAndASpecifiedCampaign**](SubscribersApi.md#unsubscribingSubscribersFromMailingListAndASpecifiedCampaign) | **POST** /subscribers/{MailingListID}/{CampaignID}/unsubscribe.{Format} | Unsubscribing subscribers from mailing list and a specified campaign
[**updatingASubscriber**](SubscribersApi.md#updatingASubscriber) | **POST** /subscribers/{MailingListID}/update/{SubscriberID}.{Format} | Updating a subscriber


# **addingMultipleSubscribers**
> \Swagger\Client\Model\AddingMultipleSubscribersResponse addingMultipleSubscribers($format, $apikey, $mailing_list_id, $body)

Adding multiple subscribers

This method allows you to add multiple subscribers in a mailing list with a single call. If some subscribers already exist with the given email addresses, they will be updated. If you try to add a subscriber with an invalid email address, this attempt will be ignored, as the process will skip to the next subscriber automatically.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to add subscribers to.
$body = new \Swagger\Client\Model\AddingMultipleSubscribersRequest(); // \Swagger\Client\Model\AddingMultipleSubscribersRequest | 

try {
    $result = $api_instance->addingMultipleSubscribers($format, $apikey, $mailing_list_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->addingMultipleSubscribers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list to add subscribers to. |
 **body** | [**\Swagger\Client\Model\AddingMultipleSubscribersRequest**](../Model/AddingMultipleSubscribersRequest.md)|  |

### Return type

[**\Swagger\Client\Model\AddingMultipleSubscribersResponse**](../Model/AddingMultipleSubscribersResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **addingSubscribers**
> \Swagger\Client\Model\AddingSubscribersResponse addingSubscribers($format, $mailing_list_id, $apikey, $body)

Adding subscribers

Adds a new subscriber to the specified mailing list. If there is already a subscriber with the specified email address in the list, an update will be performed instead.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to add the new member.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$body = new \Swagger\Client\Model\AddingSubscribersRequest(); // \Swagger\Client\Model\AddingSubscribersRequest | 

try {
    $result = $api_instance->addingSubscribers($format, $mailing_list_id, $apikey, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->addingSubscribers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list to add the new member. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **body** | [**\Swagger\Client\Model\AddingSubscribersRequest**](../Model/AddingSubscribersRequest.md)|  |

### Return type

[**\Swagger\Client\Model\AddingSubscribersResponse**](../Model/AddingSubscribersResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSubscriberByEmailAddress**
> \Swagger\Client\Model\GetSubscriberByEmailAddressResponse getSubscriberByEmailAddress($format, $apikey, $mailing_list_id, $email)

Get subscriber by email address

Searches for a subscriber with the specified email address in the specified mailing list and returns detailed information such as id, name, date created, date unsubscribed, status and custom fields

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list where the subscriber belongs.
$email = "email_example"; // string | The email of the subscriber.

try {
    $result = $api_instance->getSubscriberByEmailAddress($format, $apikey, $mailing_list_id, $email);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->getSubscriberByEmailAddress: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list where the subscriber belongs. |
 **email** | **string**| The email of the subscriber. |

### Return type

[**\Swagger\Client\Model\GetSubscriberByEmailAddressResponse**](../Model/GetSubscriberByEmailAddressResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSubscriberById**
> \Swagger\Client\Model\GetSubscriberByIdResponse getSubscriberById($format, $apikey, $mailing_list_id, $subscriber_id)

Get subscriber by id

Searches for a subscriber with the specified unique id in the specified mailing list and returns detailed information such as email, name, date created, date unsubscribed, status and custom fields.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to search the subscriber in.
$subscriber_id = "subscriber_id_example"; // string | The id of the subscriber being searched.

try {
    $result = $api_instance->getSubscriberById($format, $apikey, $mailing_list_id, $subscriber_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->getSubscriberById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list to search the subscriber in. |
 **subscriber_id** | **string**| The id of the subscriber being searched. |

### Return type

[**\Swagger\Client\Model\GetSubscriberByIdResponse**](../Model/GetSubscriberByIdResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gettingSubscribers**
> \Swagger\Client\Model\GettingSubscribersResponse gettingSubscribers($format, $mailing_list_id, $apikey, $status, $page, $page_size)

Getting subscribers

Gets a list of all subscribers in a given mailing list. You may filter the list by setting a date to fetch those subscribed since then and/or by their status. Because the results for this call could be quite big, paging information is required as input.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list where the subscribers belong.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$status = "status_example"; // string | Specifies what type of subscriber statistics results will be returned.
$page = 1.2; // double | Specifies the page of subscriber statistics results will be returned.
$page_size = 1.2; // double | Specifies the page size of subscriber statistics results will be returned.

try {
    $result = $api_instance->gettingSubscribers($format, $mailing_list_id, $apikey, $status, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->gettingSubscribers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **mailing_list_id** | **string**| The ID of the mailing list where the subscribers belong. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **status** | **string**| Specifies what type of subscriber statistics results will be returned. |
 **page** | **double**| Specifies the page of subscriber statistics results will be returned. | [optional]
 **page_size** | **double**| Specifies the page size of subscriber statistics results will be returned. | [optional]

### Return type

[**\Swagger\Client\Model\GettingSubscribersResponse**](../Model/GettingSubscribersResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removingASubscriber**
> \Swagger\Client\Model\RemovingASubscriberResponse removingASubscriber($format, $apikey, $mailing_list_id, $body)

Removing a subscriber

Removes a subscriber from the specified mailing list permanently (without moving to the suppression list).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to remove the subscriber from.
$body = new \Swagger\Client\Model\RemovingASubscriberRequest(); // \Swagger\Client\Model\RemovingASubscriberRequest | 

try {
    $result = $api_instance->removingASubscriber($format, $apikey, $mailing_list_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->removingASubscriber: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list to remove the subscriber from. |
 **body** | [**\Swagger\Client\Model\RemovingASubscriberRequest**](../Model/RemovingASubscriberRequest.md)|  |

### Return type

[**\Swagger\Client\Model\RemovingASubscriberResponse**](../Model/RemovingASubscriberResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removingMultipleSubscribers**
> \Swagger\Client\Model\RemovingMultipleSubscribersResponse removingMultipleSubscribers($format, $apikey, $mailing_list_id, $body)

Removing multiple subscribers

Removes a list of subscribers from the specified mailing list permanently (without putting them in the suppression list). Any invalid email addresses specified will be ignored.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to remove the subscribers from.
$body = new \Swagger\Client\Model\RemovingMultipleSubscribersRequest(); // \Swagger\Client\Model\RemovingMultipleSubscribersRequest | 

try {
    $result = $api_instance->removingMultipleSubscribers($format, $apikey, $mailing_list_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->removingMultipleSubscribers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list to remove the subscribers from. |
 **body** | [**\Swagger\Client\Model\RemovingMultipleSubscribersRequest**](../Model/RemovingMultipleSubscribersRequest.md)|  |

### Return type

[**\Swagger\Client\Model\RemovingMultipleSubscribersResponse**](../Model/RemovingMultipleSubscribersResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **unsubscribingSubscribersFromAccount**
> \Swagger\Client\Model\UnsubscribingSubscribersFromAccountResponse unsubscribingSubscribersFromAccount($format, $apikey, $body)

Unsubscribing subscribers from account

Unsubscribes a subscriber from the account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$body = new \Swagger\Client\Model\UnsubscribingSubscribersFromAccountRequest(); // \Swagger\Client\Model\UnsubscribingSubscribersFromAccountRequest | 

try {
    $result = $api_instance->unsubscribingSubscribersFromAccount($format, $apikey, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->unsubscribingSubscribersFromAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **body** | [**\Swagger\Client\Model\UnsubscribingSubscribersFromAccountRequest**](../Model/UnsubscribingSubscribersFromAccountRequest.md)|  |

### Return type

[**\Swagger\Client\Model\UnsubscribingSubscribersFromAccountResponse**](../Model/UnsubscribingSubscribersFromAccountResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **unsubscribingSubscribersFromMailingList**
> \Swagger\Client\Model\UnsubscribingSubscribersFromMailingListResponse unsubscribingSubscribersFromMailingList($format, $apikey, $mailing_list_id, $body)

Unsubscribing subscribers from mailing list

Unsubscribes a subscriber from the specified mailing list. The subscriber is not deleted, but moved to the suppression list.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to add subscribers to.
$body = new \Swagger\Client\Model\UnsubscribingSubscribersFromMailingListRequest(); // \Swagger\Client\Model\UnsubscribingSubscribersFromMailingListRequest | 

try {
    $result = $api_instance->unsubscribingSubscribersFromMailingList($format, $apikey, $mailing_list_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->unsubscribingSubscribersFromMailingList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list to add subscribers to. |
 **body** | [**\Swagger\Client\Model\UnsubscribingSubscribersFromMailingListRequest**](../Model/UnsubscribingSubscribersFromMailingListRequest.md)|  |

### Return type

[**\Swagger\Client\Model\UnsubscribingSubscribersFromMailingListResponse**](../Model/UnsubscribingSubscribersFromMailingListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **unsubscribingSubscribersFromMailingListAndASpecifiedCampaign**
> \Swagger\Client\Model\UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignResponse unsubscribingSubscribersFromMailingListAndASpecifiedCampaign($format, $campaign_id, $apikey, $mailing_list_id, $body)

Unsubscribing subscribers from mailing list and a specified campaign

Unsubscribes a subscriber from the specified mailing list and the specified campaign. The subscriber is not deleted, but moved to the suppression list.  This call will take into account the setting you have in \"suppression list and unsubscribe settings\" and will remove the subscriber from all other mailing lists or not accordingly.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$campaign_id = "campaign_id_example"; // string | The ID of the campaign that was sent to the specific mailing list.
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list to remove the subscriber from.
$body = new \Swagger\Client\Model\UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignRequest(); // \Swagger\Client\Model\UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignRequest | 

try {
    $result = $api_instance->unsubscribingSubscribersFromMailingListAndASpecifiedCampaign($format, $campaign_id, $apikey, $mailing_list_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->unsubscribingSubscribersFromMailingListAndASpecifiedCampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **campaign_id** | **string**| The ID of the campaign that was sent to the specific mailing list. |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list to remove the subscriber from. |
 **body** | [**\Swagger\Client\Model\UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignRequest**](../Model/UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignRequest.md)|  |

### Return type

[**\Swagger\Client\Model\UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignResponse**](../Model/UnsubscribingSubscribersFromMailingListAndASpecifiedCampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatingASubscriber**
> \Swagger\Client\Model\UpdatingASubscriberResponse updatingASubscriber($format, $apikey, $mailing_list_id, $subscriber_id, $body)

Updating a subscriber

Updates a subscriber in the specified mailing list. You can even update the subscribers email, if he has not unsubscribed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\SubscribersApi();
$format = "format_example"; // string | 
$apikey = "apikey_example"; // string | You may find your API Key or generate a new one in your account settings.
$mailing_list_id = "mailing_list_id_example"; // string | The ID of the mailing list that contains the subscriber
$subscriber_id = "subscriber_id_example"; // string | The id of the subscriber to be updated
$body = new \Swagger\Client\Model\UpdatingASubscriberRequest(); // \Swagger\Client\Model\UpdatingASubscriberRequest | 

try {
    $result = $api_instance->updatingASubscriber($format, $apikey, $mailing_list_id, $subscriber_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscribersApi->updatingASubscriber: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **format** | **string**|  |
 **apikey** | **string**| You may find your API Key or generate a new one in your account settings. |
 **mailing_list_id** | **string**| The ID of the mailing list that contains the subscriber |
 **subscriber_id** | **string**| The id of the subscriber to be updated |
 **body** | [**\Swagger\Client\Model\UpdatingASubscriberRequest**](../Model/UpdatingASubscriberRequest.md)|  |

### Return type

[**\Swagger\Client\Model\UpdatingASubscriberResponse**](../Model/UpdatingASubscriberResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

