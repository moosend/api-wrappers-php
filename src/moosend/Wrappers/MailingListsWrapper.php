<?php
namespace moosend\Wrappers;

require_once __DIR__.'/../Actions/ActiveMailingLists/ActiveMailingListsAction.php';
require_once __DIR__.'/../Actions/CreateMailingList/CreateMailingListAction.php';
require_once __DIR__.'/../Actions/CreateMailingList/CreateMailingListRequest.php';
require_once __DIR__.'/../Actions/UpdateMailingList/UpdateMailingListAction.php';
require_once __DIR__.'/../Actions/UpdateMailingList/UpdateMailingListRequest.php';
require_once __DIR__.'/../Actions/Subscribers/SubscribersAction.php';
require_once __DIR__.'/../Actions/Subscribers/SubscribersRequest.php';
require_once __DIR__.'/../Actions/MailingListDetails/MailingListDetailsRequest.php';
require_once __DIR__.'/../Actions/MailingListDetails/MailingListDetailsAction.php';
require_once __DIR__.'/../Actions/DeleteMailingList/DeleteMailingListAction.php';
require_once __DIR__.'/../Actions/CreateCustomField/CreateCustomFieldAction.php';
require_once __DIR__.'/../Actions/CreateCustomField/CreateCustomFieldRequest.php';
require_once __DIR__.'/../Actions/UpdateCustomField/UpdateCustomFieldAction.php';
require_once __DIR__.'/../Actions/DeleteCustomField/DeleteCustomFieldAction.php';

use moosend\HttpClient;
use moosend\Actions\ActiveMailingLists\ActiveMailingListsAction;
use moosend\Actions\CreateMailingList\CreateMailingListAction;
use moosend\Actions\CreateMailingList\CreateMailingListRequest;
use moosend\Models\MailingList;
use moosend\Actions\UpdateMailingList\UpdateMailingListAction;
use moosend\Actions\UpdateMailingList\UpdateMailingListRequest;
use moosend\SubscribeType;
use moosend\Actions\Subscribers\SubscribersAction;
use moosend\Actions\Subscribers\SubscribersRequest;
use moosend\Actions\MailingListDetails\MailingListDetailsRequest;
use moosend\Actions\MailingListDetails\MailingListDetailsAction;
use moosend\Actions\DeleteMailingList\DeleteMailingListAction;
use moosend\Models\CustomFieldDefinition;
use moosend\CustomFieldType;
use moosend\Actions\CreateCustomField\CreateCustomFieldAction;
use moosend\Actions\CreateCustomField\CreateCustomFieldRequest;
use moosend\Models\CustomField;
use moosend\Actions\UpdateCustomField\UpdateCustomFieldAction;
use moosend\Actions\UpdateCustomField\UpdateCustomFieldRequest;
use moosend\Actions\DeleteCustomField\DeleteCustomFieldAction;

class MailingListsWrapper {
	private $_httpClient;
	private $_apiEndpoint;
	private $_apiKey;
	
	function __construct(HttpClient $httpClient, $apiEndpoint, $apiKey) {
		$this->_httpClient = $httpClient;
		$this->_apiEndpoint =$apiEndpoint;
		$this->_apiKey = $apiKey;
	}
	
	/**
	 * Gets details for a given mailing list. You may include subscriber statistics in your results or not. Any segments existing for the requested mailing list will not be included in the results.
	 * @link http://moosend.com/api/lists#FindByID
	 *
	 * @param string $mailingListID The ID of the mailing list to be returned.
	 * @param bool $withStatistics Specifies whether to fetch statistics for the subscribers or not. If ommitted, results will be returned with statistics by default. Specified value should be either 'true' of 'false' (without quotes).
	 * @throws \InvalidArgumentException
	 * @return moosend\Models\MailingList
	 */
	public function getDetails(/* string */ $mailingListID, /*bool */ $withStatistics = true) {
		if (empty($mailingListID)) {
			throw new \InvalidArgumentException('MailingListID is a required parameter when calling MailingListsWrapper::getDetails');
		} else {
			$request =  new MailingListDetailsRequest($withStatistics);
			$action = new MailingListDetailsAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey);
			return $action->execute($request);
		}
	}
		
	/**
	 * Gets a list of your active mailing lists in your account.
	 * @link http://moosend.com/api/lists#FindAllActive
	 *
	 * @param int $page The page number to display results for. If not specified, the first page will be returned.
	 * @param int $pageSize The maximum number of results per page. If ommitted, 10 mailing lists will be returned per page.
	 * @throws \InvalidArgumentException
	 * @return moosend\Actions\ActiveMailingLists\ActiveMailingListsResponse
	 */
	public function getActiveMailingLists ($page = 1, $pageSize = 10) {
		if (!is_numeric($page) || !is_numeric($pageSize)) {
			throw new \InvalidArgumentException('Page and pageSize must be integers');
		} else {
			$action = new ActiveMailingListsAction($this->_httpClient, $this->_apiEndpoint, $page, $pageSize, $this->_apiKey);
			return $action->execute();
		}
	}
	
	/**
	 * Creates a new empty mailing list in your account.
	 * @link http://moosend.com/api/lists#Create
	 *
	 * @param string $name The name of the new mailing list
	 * @param string $confirmationPage The URL of the page that will be displayed at the end of the subscription process
	 * @param string $redirectAfterUnsubscribePage The URL of the page that users will be redirected after unsubscribing from your mailing list
	 * @throws \InvalidArgumentException
	 * @return string mail list's ID
	 */
	public function create(/* string */ $name, /* string */ $confirmationPage = null, /* string */ $redirectAfterUnsubscribePage = null) {
		if (empty($name)) {
			throw new \InvalidArgumentException('Name is a required parameter when calling MailingListsWrapper::create');
		}  else {
			$request = new CreateMailingListRequest($name, $confirmationPage, $redirectAfterUnsubscribePage);
			$action = new CreateMailingListAction($this->_httpClient, $this->_apiEndpoint, $this->_apiKey);
			return $action->execute($request);
		}
	}
	
	/**
	 * Updates the properties of an existing mailing list.
	 * @link http://moosend.com/api/lists#Update
	 *
	 * @param string $name The name of the new mailing list
	 * @param string $confirmationPage The URL of the page that will be displayed at the end of the subscription process
	 * @param string $redirectAfterUnsubscribePage The URL of the page that users will be redirected after unsubscribing from your mailing list
	 * @throws \InvalidArgumentException
	 * @return string mail list's ID
	 */
	public function update(/* string */ $mailingListID, /* string */ $name, /* string */ $confirmationPage = null, /* string */ $redirectAfterUnsubscribePage = null) {
		if (empty($name)) {
			throw new \InvalidArgumentException('Name is a required parameter when calling MailingListsWrapper::create');
		} else {
			$request = new UpdateMailingListRequest($name, $confirmationPage, $redirectAfterUnsubscribePage);
			$action = new UpdateMailingListAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey);
			return $action->execute($request);
		}
	}
	
	/**
	 * Gets a list of all subscribers in a given mailing list. You may filter the list by setting a date to fetch those subscribed since then and/or by their status.
	 * Because the results from this call could be quite big, paging information is required as input.
	 * @link http://moosend.com/api/lists#GetMembers
	 *
	 * @param string $mailingListID The ID of the mailing list to fetch subscribers for.
	 * 
	 * @param string $status The status to filter the subscribers in the given mailing list. This must be one of the following values:
	 * 'Subscribed' : to fetch active subscribers only
	 * 'Unsubscribed' : to fetch unsubscribed subscribers only
	 * 'Bounced' : to fetch subscribers that have bounced on a previously sent campaign and are suspicious for not being valid
	 * 'Removed' : to fetch removed subscribers pending deletion from our database
	 * If ommitted, all subscribers will be returned, no matter what their status is.
	 * 
	 * @param \DateTime $since A date to specify since when to fetch results, according to the date each subscriber was added to the mailing list. The date must be formatted as YYYY-MM-DD (eg. 2012-12-31). 
	 * If omitted, all subscribers will be returned, no matter what date they were added in the list.
	 * 
	 * @param int $page The page number to display results for. If not specified, the first page will be returned.
	 * @param int $pageSize The maximum number of results per page. This must be a positive integer up to 1000. If not specified, 500 results per page will be returned. If a value greater than 1000 is specified, it will be treated as 1000.
	 * @throws \InvalidArgumentException
	 * @return moosend\Actions\Subscribers\SubscribersResponse
	 */
	public function getSubscribers(/* string */ $mailingListID, /* string */  $status, \DateTime $since = null, /* int */ $page = 1, /* int */ $pageSize = 500) {
		if (empty($mailingListID) || empty($status)) {
			throw new \InvalidArgumentException('MailingListID is a required parameter when calling MailingListsWrapper::getSubscribers');
		} else {
			$request = new SubscribersRequest($status, $since, $page, $pageSize);
			$action =  new SubscribersAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey);
			return $action->execute($request);
		}
	}
	
	/**
	 * Deletes a mailing list from your account.
	 * @link http://moosend.com/api/lists#Delete
	 *
	 * @param string $mailingListID The ID of the mailing list to be deleted.
	 * @throws \InvalidArgumentException
	 * @return null.
	 */
	public function delete(/* string */ $mailingListID) {
		if (empty($mailingListID)) {
			throw new \InvalidArgumentException('MailingListID is a required parameter when calling MailingListsWrapper::delete');
		} else {
			$action = new DeleteMailingListAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey);
			return $action->execute();
		}
	}
	
	/**
	 * Creates a new custom field in the specified mailing list.
	 * @link http://moosend.com/api/lists#CreateCustomField
	 *
	 * @param string $name The name of the custom field
	 * @param string $mailingListID The id of the mailing list where the custom field belongs or will belong if it is a new one.
	 * @param int $customFieldType Specifies the data type of the custom field. This must be one of the following values:
	 * 0: 'Text' : to accept any text as input
	 * 1: 'Number' : to accept only integer or decimal values as input
	 * 2: 'DateTime' : to accept only date values as input, with or without time
	 * 3: 'SingleSelectDropdown' : to accept only values explicitly defined in a list
	 * 4: 'CheckBox' : to accept only values of true or false
	 * If ommitted, Text will be assumed.
	 * 
	 * @param string $options If you want to create a custom field of type SingleSelectDropdown, you must set this parameter to specify the available options for the user to choose from. Use a comma (,) to seperate different options.
	 * @param bool $isRequired Specify whether this is field will be mandatory on not, when being used in a subscription form. You should specify a value of either truetrue or false. If ommitted, false will be assumed.
	 * 
	 * @throws \InvalidArgumentException
	 * @return string New custom field's ID.
	 */
	public function createCustomField(/* string */ $mailingListID, /* string */ $name, /* int */ $customFieldType = 0, /* bool */ $isRequired = false, /* string */ $options = null) {
		if (empty($mailingListID) || empty($name)) {
			throw new \InvalidArgumentException('MailingListID and name are required arguments when calling MailingListsWrapper::createCustomField');
		} else  {
			$request = new CreateCustomFieldRequest($name, $customFieldType, $isRequired, $options);
			$action = new CreateCustomFieldAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey);
			return $action->execute($request);
		}
	}
	
	/**
	 * Updates the properties of an existing custom field in the specified mailing list.
	 * @link http://moosend.com/api/lists#UpdateCustomField
	 *
	 * @param string $mailingListID The id of the mailing list where the custom field belongs or will belong if it is a new one.
	 * @param CustomFieldDefinition $customField 
	 * @throws \InvalidArgumentException
	 * @return null.
	 */
	public function updateCustomField(/* string */ $mailingListID, CustomFieldDefinition $customFieldDefinition) {
		if (empty($mailingListID)) {
			throw new \InvalidArgumentException('MailingListID is a required argument when calling MailingListsWrapper::updateCustomField');
		} else {
			$action = new UpdateCustomFieldAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $customFieldDefinition->ID, $this->_apiKey);
			return $action->execute($customFieldDefinition);
		}
	}
	
	/**
	 * Removes a custom field definition from the specified mailing list.
	 * @link http://moosend.com/api/lists#RemoveCustomField
	 *
	 * @param string $mailingListID The ID of the mailing list where the custom field belongs.
	 * @param string $customFieldID The ID of the custom field to be removed.
	 * @throws \InvalidArgumentException
	 * @return null.
	 */
	public function deleteCustomField(/* string */ $mailingListID, /* string */ $customFieldID) {
		if (empty($mailingListID) || empty($customFieldID)) {
			throw new \InvalidArgumentException('MailingListID and customFieldID are required arguments when calling MailingListsWrapper::deleteCustomField');
		} else {
			$action = new DeleteCustomFieldAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $customFieldID, $this->_apiKey);
			return $action->execute();
		}
	}
}