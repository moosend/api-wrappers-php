<?php
namespace moosend\Wrappers;

require_once __DIR__.'/../Models/CampaignParams.php';
require_once __DIR__.'/../Actions/Campaign/CampaignAction.php';
require_once __DIR__.'/../Actions/Campaigns/CampaignsAction.php';
require_once __DIR__.'/../Actions/Campaigns/CampaignsRequest.php';
require_once __DIR__.'/../Actions/ActivityByLocation/ActivityByLocationAction.php';
require_once __DIR__.'/../Actions/LinkActivity/LinkActivityAction.php';
require_once __DIR__.'/../Actions/CreateDraft/CreateDraftAction.php';
require_once __DIR__.'/../Actions/DeleteCampaign/DeleteCampaignAction.php';
require_once __DIR__.'/../Actions/Send/SendAction.php';
require_once __DIR__.'/../Actions/CloneCampaign/CloneAction.php';
require_once __DIR__.'/../Actions/UpdateDraft/UpdateDraftAction.php';
require_once __DIR__.'/../Actions/SendTestCampaign/SendTestCampaignAction.php';
require_once __DIR__.'/../Actions/SendTestCampaign/SendTestCampaignRequest.php';
require_once __DIR__.'/../Actions/SenderDetails/SenderDetailsAction.php';
require_once __DIR__.'/../Actions/SenderDetails/SenderDetailsRequest.php';
require_once __DIR__.'/../Actions/AllSenders/AllSendersAction.php';
require_once __DIR__.'/../Actions/UpdateDraft/UpdateDraftAction.php';
require_once __DIR__.'/../Actions/UpdateDraft/UpdateDraftRequest.php';

use moosend\Actions\ActivityByLocation\ActivityByLocationAction;
use moosend\Actions\AllSenders\AllSendersAction;
use moosend\Actions\Campaign\CampaignAction;
use moosend\Actions\Campaigns\CampaignsAction;
use moosend\Actions\Campaigns\CampaignsRequest;
use moosend\Actions\CloneCampaign\CloneAction;
use moosend\Actions\CreateDraft\CreateDraftAction;
use moosend\Actions\DeleteCampaign\DeleteCampaignAction;
use moosend\Actions\LinkActivity\LinkActivityAction;
use moosend\Actions\Send\SendAction;
use moosend\Actions\SenderDetails\SenderDetailsAction;
use moosend\Actions\SenderDetails\SenderDetailsRequest;
use moosend\Actions\SendTestCampaign\SendTestCampaignAction;
use moosend\Actions\SendTestCampaign\SendTestCampaignRequest;
use moosend\Actions\UpdateDraft\UpdateDraftAction;
use moosend\Actions\UpdateDraft\UpdateDraftRequest;
use moosend\HttpClient;
use moosend\Models\Campaign;
use moosend\Models\CampaignParams;
use moosend\Wrappers\CampaignsWrapper;

class CampaignsWrapper {	
	private $_httpClient;
	private $_apiEndpoint;
	private $_apiKey;
	
	function __construct(HttpClient $httpClient, $apiEndpoint, $apiKey) {
		$this->_httpClient = $httpClient;
		$this->_apiEndpoint =$apiEndpoint;
		$this->_apiKey = $apiKey;
	}
	
	/**
	 * Returns a list of all campaigns in your account with detailed infomation.
	 * Because the results from this call could be quite big, paging information is required as input.
	 * @link http://moosend.com/api/campaigns#Index
	 *
	 * @param int $page The page number to display results for. If not specified, the first page will be returned.
	 * @param int $pageSize The maximum number of results per page. This must be a positive integer up to 100.
	 * If not specified, 50 results per page will be returned. If a value greater than 100 is specified, it will be treated as 100.
	 *
	 * @param string $sortBy The name of the campaign property to sort results by. If not specified, results will be sorted by the CreatedOn property
	 * @param string $sortMethod The method to sort results: 'ASC' for ascending, 'DESC' for descending. If not specified, ASC will be assumed
	 * @return \moosend\Actions\Campaigns\CampaignsResponse
	 */
	public function getCampaigns(/* int */ $page = 1, /* int */ $pageSize = 10, /* string */ $sortBy = 'CreatedOn', /* string */ $sortMethod = 'ASC') {
		$request = new CampaignsRequest($sortBy, $sortMethod);
		$action = new CampaignsAction($this->_httpClient, $this->_apiEndpoint, $page, $pageSize, $this->_apiKey);
		return $action->execute($request);
	}
	
	/**
	 * Returns basic information for the specified sender identified by its email address.
	 * @link http://moosend.com/api/campaigns#FindSenderByEmail
	 *
	 * @param string $email
	 * @throws \InvalidArgumentException
	 * @return \moosend\Models\Sender
	 */
	public function getSenderDetails(/* string */ $email) {
		if (empty($email)) {
			throw new \InvalidArgumentException('Email is a required parameter when calling getSenderDetails');
		} elseif (is_numeric($email)) {
			throw new \InvalidArgumentException('Please provide a valid email address when calling getSenderDetails. Email address must be a string');
		} else {
			$action = new SenderDetailsAction($this->_httpClient, $this->_apiEndpoint, $this->_apiKey);
			$request = new SenderDetailsRequest($email);
	
			return  $action->execute($request);
		}
	}
	
	/**
	 * Gets a list of your active senders in your account. You may specify any email address of these senders when sending a campaign.
	 * @link http://moosend.com/api/campaigns#GetSenders
	 *
	 * @return \moosend\Actions\AllSenders\AllSendersResponse
	 */
	public function getAllSenders() {
		$action = new AllSendersAction($this->_httpClient, $this->_apiEndpoint, $this->_apiKey);
		return $action->execute();
	}
	
	/**
	 * Creates a new campaign in your account. This method does not send the campaign, but rather creates it as a draft, ready for sending or testing.
	 *  You can choose to send either a regural campaign or an AB split campaign. Campaign content must be specified from a web location.
	 *  @link http://moosend.com/api/campaigns#Create
	 *
	 * @param CampaignParams $campaignParams
	 * @return string Draft ID
	 */
	public function createDraft(CampaignParams $draftParams) {
		$action = new CreateDraftAction($this->_httpClient, $this->_apiEndpoint, $this->_apiKey);
		return $action->execute($draftParams);
	}
	
	/**
	 * Sends a test email of a draft campaign to a list of email addresses you specify for previewing.
	 * @link http://moosend.com/api/campaigns#SendTest
	 *
	 * @param string $campaignID The ID of the test draft campaign to be sent.
	 * @param array $emails Array with emails (strings) the test draft will be sent to.
	 * @throws \InvalidArgumentException
	 * @return null
	 */
	
	public function sendCampaignTest(/* string */ $campaignID, array $emails) {
		if (empty($campaignID)) {
			throw new \InvalidArgumentException('CampaignID is a required parameter when calling sendCampaignTest');
		} elseif (is_numeric($campaignID)) {
			throw new \InvalidArgumentException('Please provide a valid CampaignID when calling sendCampaignTest. Campaign ID must be a string');
		} elseif (empty($emails)) {
			throw new \InvalidArgumentException('Please provide an array of emails when calling sendCampaignTest. Emails argument cannot be null');
		} else {
			$request = new SendTestCampaignRequest($emails);
			$action = new SendTestCampaignAction($this->_httpClient, $this->_apiEndpoint, $campaignID, $this->_apiKey);
			return  $action->execute($request);
		}
	}
	
	/**
	 * Sends an existing draft campaign to all recipients specified in its mailing list. The campaign is sent immediatelly.
	 * @link http://moosend.com/api/campaigns#Send
	 *
	 * @param string $campaignID The ID of the campaign to be sent.
	 * @throws \InvalidArgumentException
	 * @return null
	 */
	public function send(/* string */ $campaignID) {
		if (empty($campaignID)) {
			throw new \InvalidArgumentException('CampaignID is a required parameter when calling send');
		} elseif (is_numeric($campaignID)) {
			throw new \InvalidArgumentException('Please provide a valid CampaignID when calling send. Campaign ID must be a string');
		} else {
			$action = new SendAction($this->_httpClient, $this->_apiEndpoint, $campaignID, $this->_apiKey);
			return  $action->execute();
		}
	}
	
	/**
	 * Deletes a campaign from your account, draft or even sent.
	 * @link http://moosend.com/api/campaigns#Delete
	 *
	 * @param string $campaignID The ID of the campaign to be deleted
	 * @throws \InvalidArgumentException
	 * @return null
	 */
	public function delete(/* string */ $campaignID) {
		if (empty($campaignID)) {
			throw new \InvalidArgumentException('CampaignID is a required parameter when calling delete');
		} elseif (is_numeric($campaignID)) {
			throw new \InvalidArgumentException('Please provide a valid CampaignID when calling delete. Campaign ID must be a string');
		}  else {
			$action = new DeleteCampaignAction($this->_httpClient, $this->_apiEndpoint, $campaignID, $this->_apiKey);
			return  $action->execute();
		}
	}
	
	/**
	 * Returns a list with your campaign links and how many clicks have been made by your recipients, either unique or total.
	 * @link http://moosend.com/api/campaigns#LinkActivity
	 *
	 * @param string $campaignID
	 * @throws \InvalidArgumentException
	 * @return \moosend\Actions\LinkActivity\LinkActivityResponse
	 */
	public function getLinkActivity(/* string */ $campaignID) {
		if (empty($campaignID)) {
			throw new \InvalidArgumentException('CampaignID is a required parameter when calling getLinkActivity');
		} elseif (is_numeric($campaignID)) {
			throw new \InvalidArgumentException('Please provide a valid CampaignID when calling getLinkActivity. Campaign ID must be a string');
		} else {
			$action = new LinkActivityAction($this->_httpClient, $this->_apiEndpoint, $campaignID, $this->_apiKey);
			return  $action->execute();
		}
	}
	
	/**
	 * Returns a detailed report of your campaign activity (opens, clicks, etc) by country.
	 * @link http://moosend.com/api/campaigns#GeographicsActivity
	 *
	 * @param string $campaignID
	 * @throws \InvalidArgumentException
	 * @return \moosend\Actions\ActivityByLocation\ActivityByLocationResponse
	 */
	public function getActivityByLocation(/* string */ $campaignID) {
		if (empty($campaignID)) {
			throw new \InvalidArgumentException('CampaignID is a required parameter when calling getActivityByLocation');
		} elseif (is_numeric($campaignID)) {
			throw new \InvalidArgumentException('Please provide a valid CampaignID when calling getActivityByLocation. Campaign ID must be a string');
		} else {
			$action = new ActivityByLocationAction($this->_httpClient, $this->_apiEndpoint, $campaignID, $this->_apiKey);
			return  $action->execute();
		}
	}
	
	/**
	 * Updates properties of an existing draft campaign in your account. Non-draft campaigns cannot be updated.
	 * @link http://moosend.com/api/campaigns#Update
	 *
	 * @param Campaign $campaign The campaign to be updated.
	 * @throws \InvalidArgumentException
	 * @return null
	 */
	public function updateDraft(Campaign $campaign) {
		$request = new UpdateDraftRequest($campaign);
		$action = new UpdateDraftAction($this->_httpClient, $this->_apiEndpoint, $campaign, $this->_apiKey);
		return  $action->execute($request);
	}
}