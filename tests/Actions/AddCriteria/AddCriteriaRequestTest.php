<?php
namespace tests\Actions\AddCriteria;

use moosend\Actions\AddCriteria\AddCriteriaRequest;

class AddCriteriaRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test CampaignsRequest constructor.
	 * @group AddCriteriaRequestTest
	 * @covers moosend\Actions\AddCriteria\AddCriteriaRequest::__construct
	 */
	public function test_Can_Create_AddCriteriaRequest_Instance() {
		date_default_timezone_set('UTC');
		$dateFrom = new \DateTime('22-01-2015');
		$dateTo = new \DateTime('23-01-2015');
		$addCriteriaRequest = new AddCriteriaRequest('a_field', 'a_comparer', 'a_value', $dateFrom, $dateTo);
		$this->assertInstanceOf('moosend\Actions\AddCriteria\AddCriteriaRequest', $addCriteriaRequest);
		$this->assertEquals($addCriteriaRequest->field, 'a_field');
		$this->assertEquals($addCriteriaRequest->comparer, 'a_comparer');
		$this->assertEquals($addCriteriaRequest->value, 'a_value');
		$this->assertEquals($addCriteriaRequest->dateFrom, $dateFrom);
		$this->assertEquals($addCriteriaRequest->dateTo, $dateTo);
	}
}