<?php
namespace moosend\Wrappers;

require_once __DIR__.'/../Actions/SubscriberByEmail/SubscriberByEmailAction.php';
require_once __DIR__.'/../Actions/SubscriberByEmail/SubscriberByEmailRequest.php';
require_once __DIR__.'/../Models/Subscriber.php';
require_once __DIR__.'/../Actions/AddSubscriber/AddSubscriberAction.php';
require_once __DIR__.'/../Actions/Unsubscribe/UnsubscribeAction.php';
require_once __DIR__.'/../Actions/Unsubscribe/UnsubscribeRequest.php';
require_once __DIR__.'/../Actions/RemoveSubscriber/RemoveSubscriberAction.php';
require_once __DIR__.'/../Actions/RemoveSubscriber/RemoveSubscriberRequest.php';
require_once __DIR__.'/../Actions/RemoveMultipleSubscribers/RemoveMultipleSubscribersAction.php';
require_once __DIR__.'/../Actions/RemoveMultipleSubscribers/RemoveMultipleSubscribersRequest.php';
require_once __DIR__.'/../Actions/AddMultipleSubscribers/AddMultipleSubscribersAction.php';

use moosend\Actions\SubscriberByEmail\SubscriberByEmailAction;
use moosend\HttpClient;
use moosend\Actions\SubscriberByEmail\SubscriberByEmailRequest;
use moosend\Models\SubscriberParams;
use moosend\Actions\AddSubscriber\AddSubscriberAction;
use moosend\Actions\Unsubscribe\UnsubscribeAction;
use moosend\Actions\Unsubscribe\UnsubscribeRequest;
use moosend\Actions\RemoveSubscriber\RemoveSubscriberAction;
use moosend\Actions\RemoveSubscriber\RemoveSubscriberRequest;
use moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersAction;
use moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersRequest;
use moosend\Actions\AddMultipleSubscribers\AddMultipleSubscribersAction;

class SubscribersWrapper {
	private $_httpClient;
	private $_apiEndpoint;
	private $_apiKey;
	
	function __construct(HttpClient $httpClient, $apiEndpoint, $apiKey) {
		$this->_httpClient = $httpClient;
		$this->_apiEndpoint =$apiEndpoint;
		$this->_apiKey = $apiKey;
	}
	
	/**
	 * Searches for a subscriber with the specified email address in the specified mailing list and returns detailed information such as id, name, date created, date unsubscribed, status and custom fields
	 * @link http://www.moosend.com/api/subscribers#GetByEmail
	 *
	 * @param string $mailingListID The ID of the mailing list to search the subscriber in
	 * @param string $email The email address of the subscriber being searched
	 * @throws \InvalidArgumentException
	 * @return \moosend\Models\Subscriber
	 */
	public function getSubscriberByEmail(/* string */ $mailingListID, /* string */ $email) {
		if (empty($mailingListID) || empty($email)) {
			throw new \InvalidArgumentException('MailingListID and email are required arguments when calling SubscribersWrapper::getByEmail');
		} elseif (is_numeric($mailingListID) || is_numeric($email)) {
			throw new \InvalidArgumentException('Please provide a valid MailingListID and email when calling SubscribersWrapper::getByEmail. MailingListID and email must be strings');
		} else {
			$request = new SubscriberByEmailRequest($email);
			$action = new SubscriberByEmailAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey);
			return $action->execute($request);
		}
	}
	
	/**
	 * Adds a new subscriber to the specified mailing list. If there is already a subscriber with the specified email address in the list, an update will be performed instead.
	 * @link http://moosend.com/api/subscribers#Subscribe
	 *
	 * @param string $mailingListID The ID of the mailing list to add the new member
	 * @param SubscriberParams $member Subscriber's parameters
	 * @throws \InvalidArgumentException
	 * @return \moosend\Models\Subscriber
	 */
	public function addSubscriber(/* string */ $mailingListID, SubscriberParams $member) {
		if (empty($mailingListID)) {
			throw new \InvalidArgumentException('MailingListID is a required argument when calling SubscribersWrapper::addSubscriber');
		} elseif (is_numeric($mailingListID)) {
			throw new \InvalidArgumentException('Please provide a valid MailingListID when calling SubscribersWrapper::addSubscriber. MailingListID must be a string');
		} else {
			$action = new AddSubscriberAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey);
			return $action->execute($member);
		}
	}
	
	/**
	 * This method allows you to add multiple subscribers in a mailing list with a single call. If some subscribers already exist with the given email addresses, they will be updated.
	 * If you try to add a subscriber with an invalid email address, this attempt will be ignored, as the process will skip to the next subscriber automatically.
	 * @link http://moosend.com/api/subscribers#SubscribeAll
	 *
	 * @param string $mailingListID The ID of the mailing list to add subscribers to.
	 * @param array $subscribers A list of subscribers to add to the mailing list. You may specify the email address, the name and the custom fields for each subscriber.
	 * @throws \InvalidArgumentException
	 * @return \moosend\Actions\AddMultipleSubscribers\MultipleSubscribersResponse
	 */
	public function addMultipleSubscribers(/* string */ $mailingListID,  array $subscribers) {
		if (empty($mailingListID) || empty($subscribers)) {
			throw new \InvalidArgumentException('MailingListID and subscribers are required arguments when calling SubscribersWrapper::addMultipleSubscribers');
		} else {
			$action = new AddMultipleSubscribersAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey);
			return $action->execute($subscribers);
		}
	}
	
	/**
	 * Unsubscribes a subscriber from the specified mailing list and the specified campaign. The subscriber is not deleted, but moved to the supression list.
	 * This call will take into account the setting you have in "Supression list and unsubscribe settings" and will remove the subscriber from all other mailing lists or not accordingly.
	 * @link http://moosend.com/api/subscribers#Unsubscribe
	 *
	 * @param string $email The email address of the subscriber to be supressed.
	 * @param string $campaignID The ID of the campaign from which the subscriber unsubscribed. It can be omitted if no such information is available.
	 * @param string $mailingListID The ID of the mailing list to unsubscribe the subscriber from. If also omitted, the email address of the subscriber will be unsubscribed from all mailing lists.
	 * @throws \InvalidArgumentException
	 * @return null
	 */
	public function unsubscribe(/* string */ $email, /* string */ $campaignID = null, /* string */ $mailingListID = null) {
		if (is_numeric($email) || is_numeric($campaignID) || is_numeric($mailingListID)) {
			throw new \InvalidArgumentException('Email, campaignID and mailingListID must be strings when calling SubscribersWrapper::unsubscribe');
		}  else  {
			$request = new UnsubscribeRequest($email);
			$action = new UnsubscribeAction($this->_httpClient, $this->_apiEndpoint, $campaignID, $mailingListID, $this->_apiKey);
			return $action->execute($request);
		}
	}
	
	/**
	 * Removes a subscriber from the specified mailing list permanently (without moving to the supression list).
	 * @link http://moosend.com/api/subscribers#Remove
	 *
	 * @param string $mailingListID The ID of the mailing list to search the subscriber in.
	 * @param string $email The email address of the subscriber being searched.
	 * @throws \InvalidArgumentException
	 * @return null
	 */
	public function removeSubscriber(/* string */ $mailingListID, /* string */ $email) {
		if (empty($mailingListID) || empty($email)) {
			throw new \InvalidArgumentException('MailingListID and email are required arguments when calling SubscribersWrapper::removeSubscriber');
		} elseif (is_numeric($mailingListID) || is_numeric($email)) {
			throw new \InvalidArgumentException('Please provide a valid MailingListID and email when calling SubscribersWrapper::removeSubscriber. MailingListID and email must be strings');
		} else {
			$request = new RemoveSubscriberRequest($email);
			$action = new RemoveSubscriberAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey);
			return $action->execute($request);
		}
	}
	
	
	public function removeMultipleSubscribers(/* string */ $mailingListID, /* string */ $emails) {
		if (empty($mailingListID) || empty($emails)) {
			throw new \InvalidArgumentException('MailingListID and emails are required arguments when calling SubscribersWrapper::removeMultipleSubscribers');
		} elseif (is_numeric($mailingListID) || empty($emails)) {
			throw new \InvalidArgumentException('Please provide a valid MailingListID when calling SubscribersWrapper::removeMultipleSubscribers. MailingListID must be a string');
		} else {
			$request = new RemoveMultipleSubscribersRequest($emails);
			$action = new RemoveMultipleSubscribersAction($this->_httpClient, $this->_apiEndpoint, $mailingListID, $this->_apiKey); 
			return $action->execute($request);
		}
	}
}