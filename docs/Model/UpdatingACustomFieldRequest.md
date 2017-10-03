# UpdatingACustomFieldRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the custom field. | 
**custom_field_type** | **string** | Specifies the data type of the custom field. This must be one of the following values. If omitted, Text will be assumed. * &#x60;Text&#x60; * &#x60;Decimal&#x60; * &#x60;DateTime&#x60; * &#x60;SingleSelectDropdown&#x60; * &#x60;Integer&#x60; * &#x60;CheckBox&#x60; | [optional] 
**options** | **string** | If you want to create a custom field of type SingleSelectDropdown, you must set this parameter to specify the available options for the user to choose from. Use a comma (,) to separate different options. | [optional] 
**is_required** | **string** | Specify whether this is field will be mandatory on not, when being used in a subscription form. You should specify a value of either true or false. If omitted, false will be assumed. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


