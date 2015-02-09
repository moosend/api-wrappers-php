<?php
namespace tests\IntegrationTests;

use moosend\MoosendApi;
class SegmentsWrapperIntegrationTests extends \PHPUnit_Framework_TestCase {
	
	/**
	 * @group SegmentsWrapperIntegrationTests
	 */
	public function test_SegmentsWrapperIntegrationTests() {
		$apiKey = '03e3c603-44f4-4b23-88be-95b200d2f752';
		$moosendApi = new MoosendApi($apiKey);
		$mailingListID = '4e9243e2-4a81-4c17-9672-574b61cc2560';
		
		// create a new segment. 
		$name = 'Segments integration test: Segment To Test';
		$segmentID = $moosendApi->segments->create($mailingListID, $name);

		// get segment's details
		$segment = $moosendApi->segments->getDetails($mailingListID, $segmentID);
		$this->assertEquals($name, $segment->getName());
		
		// get all segments and find segment in mailing list.
		$segments = $moosendApi->segments->getSegments($mailingListID);
		$found = false;
		foreach ($segments as $segment) {
			if ($segment->getID() == $segmentID) {
				$found = true;
			}
		}
		$this->assertTrue($found, 'segment not found in mailing list');
		
		// update segment	
		$updatedName = 'Segments integration test: Updated Segment To Test';
		$segment->setName($updatedName);
		$segment->setMatchType(1);
		$moosendApi->segments->update($mailingListID, $segment);
		
		$this->assertEquals($updatedName, $segment->getName());
		$this->assertEquals(1, $segment->getMatchType());
		
		// get (Subscribed) subscribers
		$subscribers = $moosendApi->segments->getSubscribers($mailingListID, $segmentID);
		$mailingListSubscribers = $moosendApi->mailingLists->getSubscribers($mailingListID, 'Subscribed');
		$this->assertTrue(count($subscribers) == count($mailingListSubscribers), 'found segment\'s subscribers');
		
		// add criteria
		$listSegments = $moosendApi->segments->getSegments($mailingListID);
		$field = 'LinksClicked';
		$comparer = 'Is';
		$value = 20;
		//$dateFrom = \DateTime::createFromFormat('d/m/Y', '20/01/2015');; 
		//$dateTo = \DateTime::createFromFormat('d/m/Y', '27/05/2015');
		$newCriteriaID = $moosendApi->segments->addCriteria($mailingListID, $segmentID, $field, $comparer, $value);
		
		// get updated segment details
		$segment = $moosendApi->segments->getDetails($mailingListID, $segmentID);
		$segmentCriteria = $segment->getCriteria();
		$found = false;
		foreach ($segmentCriteria as $criteria) {
			if ($criteria->getID() == $newCriteriaID) {
				$found = true;
				break;
			}
		}
		$this->assertTrue($found);
		
		// update criteria
		$moosendApi->segments->updateCriteria($mailingListID, $segmentID, $newCriteriaID, $field, $comparer, 1000);

		// get updated segment details
		$segment = $moosendApi->segments->getDetails($mailingListID, $segmentID);
		$segmentCriteria = $segment->getCriteria();
		$found = false;
		foreach ($segmentCriteria as $criteria) {
			if ($criteria->getID() == $newCriteriaID && $criteria->getValue() == 1000) {
				$found = true;
				break;
			}
		}
		$this->assertTrue($found);
		
		// delete segment
		$moosendApi->segments->delete($mailingListID, $segmentID);
		$deleted = true;
		$segments = $moosendApi->segments->getSegments($mailingListID);
		foreach ($segments as $segment) {
			if ($segment->getID() == $segmentID) {
				$found = false;
				break;
			}
		}
		$this->assertTrue($found);
	}
}