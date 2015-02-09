<?php
namespace tests\Actions\UpdateCriteria;

use moosend\Actions\UpdateCriteria\UpdateCriteriaRequest;

class UpdateCriteriaRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test CampaignsRequest constructor.
	 * @group UpdateCriteriaRequestTest
	 * @covers moosend\Actions\UpdateCriteria\UpdateCriteriaRequest::__construct
	 */
	public function test_Can_Create_UpdateCriteriaRequest_Instance() {
		date_default_timezone_set('UTC');
		$dateFrom = new \DateTime('22-01-2015');
		$dateTo = new \DateTime('23-01-2015');
		$updateCriteriaRequest = new updateCriteriaRequest('a_field', 'a_comparer', 'a_value', $dateFrom, $dateTo);
		$this->assertInstanceOf('moosend\Actions\UpdateCriteria\UpdateCriteriaRequest', $updateCriteriaRequest);
		$this->assertEquals($updateCriteriaRequest->field, 'a_field');
		$this->assertEquals($updateCriteriaRequest->comparer, 'a_comparer');
		$this->assertEquals($updateCriteriaRequest->value, 'a_value');
		$this->assertEquals($updateCriteriaRequest->dateFrom, $dateFrom);
		$this->assertEquals($updateCriteriaRequest->dateTo, $dateTo);
	}
}