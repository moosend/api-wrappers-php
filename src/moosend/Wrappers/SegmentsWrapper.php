<?php
namespace moosend\Wrappers;

require_once __DIR__.'/../Actions/FindSegmentsForMailingList/FindSegmentsForMailingListAction.php';
require_once __DIR__.'/../Actions/CreateSegment/CreateSegmentAction.php';
require_once __DIR__.'/../Actions/CreateSegment/CreateSegmentRequest.php';
require_once __DIR__.'/../Actions/UpdateSegment/UpdateSegmentAction.php';
require_once __DIR__.'/../Actions/UpdateSegment/UpdateSegmentRequest.php';
require_once __DIR__.'/../Actions/DeleteSegment/DeleteSegmentAction.php';
require_once __DIR__.'/../Actions/SegmentDetails/SegmentDetailsAction.php';
require_once __DIR__.'/../Actions/SegmentSubscribers/SegmentSubscribersAction.php';
require_once __DIR__.'/../Actions/SegmentSubscribers/SegmentSubscribersRequest.php';
require_once __DIR__.'/../Actions/AddCriteria/AddCriteriaAction.php';
require_once __DIR__.'/../Actions/AddCriteria/AddCriteriaRequest.php';
require_once __DIR__.'/../Actions/UpdateCriteria/UpdateCriteriaAction.php';
require_once __DIR__.'/../Actions/UpdateCriteria/UpdateCriteriaRequest.php';
require_once __DIR__.'/../Actions/RemoveCriteria/RemoveCriteriaAction.php';

use moosend\HttpClient;
use moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListAction;
use moosend\Actions\CreateSegment\CreateSegmentAction;
use moosend\Actions\CreateSegment\CreateSegmentRequest;
use moosend\Models\Segment;
use moosend\Actions\UpdateSegment\UpdateSegmentAction;
use moosend\Actions\UpdateSegment\UpdateSegmentRequest;
use moosend\Actions\DeleteSegment\DeleteSegmentAction;
use moosend\Actions\SegmentDetails\SegmentDetailsAction;
use moosend\Actions\SegmentSubscribers\SegmentSubscribersAction;
use moosend\Actions\SegmentSubscribers\SegmentSubscribersRequest;
use moosend\SegmentCriteriaComparer;
use moosend\Actions\AddCriteria\AddCriteriaAction;
use moosend\Actions\AddCriteria\AddCriteriaRequest;
use moosend\Models\SegmentCriteria;
use moosend\Actions\UpdateCriteria\UpdateCriteriaAction;
use moosend\Actions\UpdateCriteria\UpdateCriteriaRequest;
use moosend\Actions\RemoveCriteria\RemoveCriteriaAction;

class SegmentsWrapper {
	private $httpClient;
	private $apiEndpoint;
	private $apiKey;
	
	function __construct(HttpClient $httpClient, $apiEndpoint, $apiKey) {
		$this->httpClient = $httpClient;
		$this->apiEndpoint = $apiEndpoint;
		$this->apiKey = $apiKey;
	}
	
	public function getHttpClient() {
		return $this->httpClient;
	}
	
	public function getApiEndpoint() {
		return $this->apiEndpoint;
	}
	
	public function getApiKey() {
		return $this->apiKey;
	}	
	
	/**
	 * Get a list of all segments with their criteria for the given mailing list.
	 * @link http://moosend.com/api/segments#FindAllForMailingList
	 *
	 * @param string $mailingListID The ID of the mailing list to retrieve the segments for.
	 * @throws \InvalidArgumentException
	 * @return moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListResponse
	 */
	public function getSegments(/* string */$mailingListID) {
		if (empty($mailingListID)) {
			throw new \InvalidArgumentException('mailingListID is a required argument when calling SegmentsWrapper::getSegments');
		} else {
			$action = new FindSegmentsForMailingListAction($this->httpClient, $this->apiEndpoint, $mailingListID, $this->apiKey);
			return $action->execute();
		}
	}
	
	
	/**
	 * Creates a new empty segment (without criteria) for the given mailing list. You may specify the name of the segment and the way the criteria will match together.
	 * @link http://moosend.com/api/segments#Create
	 *
	 * @param string $mailingListID The ID of the mailing list where the segment belongs.
	 * @param string $name The name of the segment
	 * @param int $matchType Specifies how the segment's criteria will match together. This must be one of the following values:
	 * 0: 'All' : only subscribers that match all given criteria will be returned by the segment
	 * 1: 'Any' : subscribers that match any of the given criteria will be returned by the segment
	 * If not specified, All will be assumed.

	 * @throws \InvalidArgumentException
	 * @return int New segment's ID
	 */
	public function create(/* string */ $mailingListID, /* string */ $name, /* string */ $matchType = 'All') {
		if (empty($mailingListID) || empty($name)) {
			throw new \InvalidArgumentException('mailingListID and name are required arguments when calling SegmentsWrapper::create');
		} else {
			$request = new CreateSegmentRequest($name, $matchType);
			$action = new CreateSegmentAction($this->httpClient, $this->apiEndpoint, $mailingListID, $this->apiKey);
			return $action->execute($request);
		}
	}
	
	/**
	 * Updates the properties of an existing segment. You may update the name and match type of the segment.
	 * @link http://moosend.com/api/segments#Update
	 *
	 * @param string $mailingListID The ID of the mailing list where the segment belongs.
	 * @param Segment $segment 
	 * @throws \InvalidArgumentException
	 * @return null
	 */
	public function update(/* string */ $mailingListID, Segment $segment) {
		$request = new UpdateSegmentRequest($segment->Name, $segment->MatchType);
		$action = new UpdateSegmentAction($this->httpClient, $this->apiEndpoint, $mailingListID, $segment->ID, $this->apiKey);
		return $action->execute($request);
	}
	
	/**
	 * Deletes a segment along with its criteria from the mailing list. The subscribers of the mailing list that the segment returned are not deleted or affected in any way.
	 * @link http://moosend.com/api/segments#Delete
	 *
	 * @param string $mailingListID The ID of the mailing list where the segment belongs.
	 * @param string $segmentID The ID of the segment to be deleted.
	 * @throws \InvalidArgumentException
	 * @return null
	 */
	public function delete(/* string */ $mailingListID, /* string */ $segmentID) {
		if (empty($mailingListID) || empty($segmentID)) {
			throw new \InvalidArgumentException('mailingListID and segmentID are required arguments when calling SegmentsWrapper::delete');
		} else {
			$action = new DeleteSegmentAction($this->httpClient, $this->apiEndpoint, $mailingListID, $segmentID, $this->apiKey);
			return $action->execute();
		}
	}
	
	/**
	 * Gets detailed information on a specific segment and its criteria. However, it does not include the subscribers returned by the segment.
	 * @link http://moosend.com/api/segments#FindByID
	 *
	 * @param string $mailingListID The ID of the mailing list where the segment belongs.
	 * @param string $segmentID The ID of the segment to fetch results for.
	 * @throws \InvalidArgumentException
	 * @return \moosend\Models\Segment
	 */
	public function getDetails(/* string */ $mailingListID, /* string */ $segmentID) {
		if (empty($mailingListID) || empty($segmentID)) {
			throw new \InvalidArgumentException('mailingListID and segmentID are required arguments when calling SegmentsWrapper::getDetails');
		} else {
			$action = new SegmentDetailsAction($this->httpClient, $this->apiEndpoint, $mailingListID, $segmentID, $this->apiKey);
			return $action->execute();
		}
 	}
 	
 	/**
 	 * Gets a list of the subscribers that the specified segment returns according to its criteria. Because the results from this call could be quite big, paging information is required as input.
 	 * @link http://moosend.com/api/segments#GetMembers
 	 *
 	 * @param string $mailingListID The ID of the mailing list the specified segment belongs.
 	 * @param string $status Specifies which subscribers to fetch, according to their status. This must be one of the following values:
 	 * 'Subscribed' : to fetch active subscribers only
 	 * 'Unsubscribed' : to fetch unsubscribed subscribers only
 	 * 'Bounced' : to fetch subscribers that have bounced on a previously sent campaign and are suspicious for not having a valid email address
 	 * 'Removed' : to fetch removed subscribers pending deletion from our database
 	 * If ommitted, only active subscribers will be returned.
 	 * 
 	 * @param int $page The page number to display results for. If not specified, the first page will be returned.
 	 * @param int $pageSize The maximum number of results per page. This must be a positive integer up to 1000. If not specified, 500 results per page will be returned.
 	 * If a value greater than 1000 is specified, it will be treated as 1000.
 	 * 
 	 * @throws \InvalidArgumentException
	 * @return moosend\Actions\SegmentSubscribers\SegmentSubscribersResponse
 	 */
 	public function getSubscribers(/* string */ $mailingListID, /* int */ $segmentID, /* string */  $status = 'Subscribed', /* int */ $page = 1, /* int */ $pageSize = 500) {
 		if (empty($mailingListID) || empty($segmentID)) {
			throw new \InvalidArgumentException('mailingListID and segmentID are required arguments when calling SegmentsWrapper::getDetails');
		} else {
			$request = new SegmentSubscribersRequest($status, $page, $pageSize);
 			$action = new SegmentSubscribersAction($this->httpClient, $this->apiEndpoint, $mailingListID, $segmentID, $this->apiKey);  
 			return $action->execute($request);
 		}
 	}
 	
 	/**
 	 * Adds a new criterion (a rule) to the specified segment.
 	 * @link http://moosend.com/api/segments#AddCriteria
 	 *
 	 * @param string $mailingListID The ID of the mailing list the criterion's segment belongs to.
 	 * @param string $segmentID The ID of the segment the criterion belongs to.
 	 * 
 	 * @param string $field The field of the criterion to filter the mailing list by. This must be one of the following values:
 	 * 'DateAdded' : filters subscribers by the date they where added to the mailing list
 	 * 'RecipientName' : filters subscribers by the recipient name
 	 * 'RecipientEmail' : filters subscribers by their email address
 	 * 'CampaignsOpened' : filters subscribers according to how many campaigns they have opened (within the past 60 days maximum)
 	 * 'LinksClicked' : filters subscribers according to how many links they have clicked from previous campaigns sent to them (within the past 60 days maximum)
 	 * 'CampaignName' : filters subscribers according to which campaigns they have opened, based on their names
 	 * 'LinkURL' : filters subscribers according to which links they have clicked, based on their urls
 	 * 'An ID' of any custom field in the mailing list the segment belongs : filters the mailing list according to the value of the specified custom field for each subscriber
 	 * 
 	 * @param string $comparer An operator that defines the way to compare a criterion field with its value. This must be one of the following values:
 	 * 'Is' : to find subscribers where the field is exactly equal to the search term
 	 * 'IsNot' : to find subscribers where the field is other than the search term
 	 * 'Contains' : to find subscribers where the field contains the search term
 	 * 'DoesNotContain' : to find subscribers where the field does not contain the search term
 	 * 'StartsWith' : to find subscribers where the field starts with the search term
 	 * 'DoesNotStartWith' : to find subscribers where the field does not start with the search term
 	 * 'EndsWith' : to find subscribers where the field ends with the search term
 	 * 'DoesNotEndWith' : to find subscribers where the field does not end with the search term
 	 * 'IsGreaterThan' : to find subscribers where the field is greater than the search term
 	 * 'IsGreaterThanOrEqualTo' : to find subscribers where the field is greater than or equal to the search term
 	 * 'IsLessThan' : to find subscribers where the field is less than the search term
 	 * 'IsLessThanOrEqualTo' : to find subscribers where the field is less than or equal to the search term
 	 * 'IsBefore' : to find subscribers where the specified date field is before the specified date value
 	 * 'IsAfter' : to find subscribers where the specified date field is after the specified date value
 	 * 'IsEmpty' : to find subscribers where the field contains no value
 	 * 'IsNotEmpty' : to find subscribers excluding those where the field contains no value
 	 * 'IsTrue' : to find subscribers where the condition defined by the field is true
 	 * 'IsFalse' : to find subscribers where the condition defined by the field is false
 	 * If not specified, Is will be assumed.
 	 * 
 	 * @param string $value A search term to filter the specified field by.
 	 * 
 	 * @param \DateTime $dateFrom Provides an additional filter option to be combined with the following fields:
 	 * CampaignsOpened : to search subscribers that opened campaigns that where sent since the specified date
 	 * LinksClicked : to search subscribers that clicked on links in campaigns that where sent since the specified date
 	 * 
 	 * @param \DateTime $dateTo Provides an additional filter option to be combined with the following fields:
 	 * CampaignsOpened : to search subscribers that opened campaigns that where sent up to the specified date
 	 * LinksClicked : to search subscribers that clicked on links in campaigns that where sent up to the specified date
 	 * 
 	 * @throws \InvalidArgumentException
 	 * @return int New Criteria ID
 	 */
 	public function addCriteria(/* string */ $mailingListID, /* int */ $segmentID, /* string */ $field, /* string */ $comparer, /* string */ $value, $dateFrom = null, $dateTo = null) {
 		if (empty($mailingListID) || empty($segmentID) || empty($field) || empty($comparer) || empty($value)) {
 			throw new \InvalidArgumentException('mailingListID, segmentID, field, comparer and value are required arguments when calling SegmentsWrapper::addCriteria');
 		} else {
 			$request = new AddCriteriaRequest($field, $comparer, $value, $dateFrom, $dateTo);
 			$action = new AddCriteriaAction($this->httpClient, $this->apiEndpoint, $mailingListID, $segmentID, $this->apiKey);
 			return $action->execute($request);
 		}
 	} 
 	
 	/**
 	 * Updates an existing criterion in the specified segment.
 	 * @link http://moosend.com/api/segments#UpdateCriteria
 	 * 
 	 * @param string $mailingListID The ID of the mailing list the criterion's segment belongs to.
 	 * @param string $segmentID The ID of the segment the criterion belongs to.
 	 * @param string $criteriaID The ID of the criterion to process.
 	 * @param string $field The field of the criterion to filter the mailing list by. This must be one of the following values:
 	 * 'DateAdded' : filters subscribers by the date they where added to the mailing list
 	 * 'RecipientName' : filters subscribers by the recipient name
 	 * 'RecipientEmail' : filters subscribers by their email address
 	 * 'CampaignsOpened' : filters subscribers according to how many campaigns they have opened (within the past 60 days maximum)
 	 * 'LinksClicked' : filters subscribers according to how many links they have clicked from previous campaigns sent to them (within the past 60 days maximum)
 	 * 'CampaignName' : filters subscribers according to which campaigns they have opened, based on their names
 	 * 'LinkURL' : filters subscribers according to which links they have clicked, based on their urls
 	 * 'An ID' of any custom field in the mailing list the segment belongs : filters the mailing list according to the value of the specified custom field for each subscriber
 	 * 
 	 * @param string $comparer An operator that defines the way to compare a criterion field with its value. This must be one of the following values:
 	 * 'Is' : to find subscribers where the field is exactly equal to the search term
 	 * 'IsNot' : to find subscribers where the field is other than the search term
 	 * 'Contains' : to find subscribers where the field contains the search term
 	 * 'DoesNotContain' : to find subscribers where the field does not contain the search term
 	 * 'StartsWith' : to find subscribers where the field starts with the search term
 	 * 'DoesNotStartWith' : to find subscribers where the field does not start with the search term
 	 * 'EndsWith' : to find subscribers where the field ends with the search term
 	 * 'DoesNotEndWith' : to find subscribers where the field does not end with the search term
 	 * 'IsGreaterThan' : to find subscribers where the field is greater than the search term
 	 * 'IsGreaterThanOrEqualTo' : to find subscribers where the field is greater than or equal to the search term
 	 * 'IsLessThan' : to find subscribers where the field is less than the search term
 	 * 'IsLessThanOrEqualTo' : to find subscribers where the field is less than or equal to the search term
 	 * 'IsBefore' : to find subscribers where the specified date field is before the specified date value
 	 * 'IsAfter' : to find subscribers where the specified date field is after the specified date value
 	 * 'IsEmpty' : to find subscribers where the field contains no value
 	 * 'IsNotEmpty' : to find subscribers excluding those where the field contains no value
 	 * 'IsTrue' : to find subscribers where the condition defined by the field is true
 	 * 'IsFalse' : to find subscribers where the condition defined by the field is false
 	 * If not specified, Is will be assumed.
 	 * 
 	 * @param string $value A search term to filter the specified field by.
 	 * 
 	 * @param \DateTime $dateFrom Provides an additional filter option to be combined with the following fields:
 	 * CampaignsOpened : to search subscribers that opened campaigns that where sent since the specified date
 	 * LinksClicked : to search subscribers that clicked on links in campaigns that where sent since the specified date
 	 * 
 	 * @param \DateTime $dateTo Provides an additional filter option to be combined with the following fields:
 	 * CampaignsOpened : to search subscribers that opened campaigns that where sent up to the specified date
 	 * LinksClicked : to search subscribers that clicked on links in campaigns that where sent up to the specified date
 	 * 
 	 * @throws \InvalidArgumentException
 	 * @return null
 	 */
 	public function updateCriteria(/* string */ $mailingListID, /* int */ $segmentID, /* string */ $criteriaID, /* string */ $field, /* string */ $comparer, /* string */ $value, \DateTime $dateFrom = null, \DateTime $dateTo = null) {
 	if (empty($mailingListID) || empty($segmentID) || empty($criteriaID) || empty($field) || empty($comparer) || empty($value)) {
 			throw new \InvalidArgumentException('mailingListID, segmentID, criteriaID ,field, comparer and value are required arguments when calling SegmentsWrapper::updateCriteria');
 		} else {
 			$request = new UpdateCriteriaRequest($field, $comparer, $value, $dateFrom, $dateTo);
 			$action = new UpdateCriteriaAction($this->httpClient, $this->apiEndpoint, $mailingListID, $segmentID, $criteriaID, $this->apiKey);
 			return $action->execute($request);
 		}
 	} 
 	
 	/**
 	 * Deletes a criterion from the specified segment.
 	 * @link http://moosend.com/api/segments#RemoveCriteria
 	 *
 	 * @param string $mailingListID The ID of the mailing list the specified segment belongs.
 	 * @param string $segmentID The ID of the segment the specified criterion belongs.
 	 * @param string $criteriaID The ID of the criterion to be deleted.
 	 * @throws \InvalidArgumentException
 	 * @return null
 	 */
 	public function removeCriteria(/* string */ $mailingListID, /* int */ $segmentID, /* int */ $criteriaID) {
 		if (empty($mailingListID) || empty($segmentID) || empty($criteriaID)) {
 			throw new \InvalidArgumentException('mailingListID, segmentID and criteriaID  and value are required arguments when calling SegmentsWrapper::removeCriteria');
 		} else {
 			$action = new RemoveCriteriaAction($this->httpClient, $this->apiEndpoint, $mailingListID, $segmentID, $criteriaID, $this->apiKey);
 			return $action->execute();
 		}
 	}
}