<?php
namespace tests\Actions\FindSegmentsForMailingList;

use moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListResponse;
class FindSegmentsForMailingListResponseTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test FindSegmentsForMailingListResponse constructor
	 * @group FindSegmentsForMailingListResponseTest
	 * @covers moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListResponse::__construct
	 */
	public function test_Can_Create_FindSegmentsForMailingListResponse_Instance() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSegmentsJsonResponse.html'), true)['Context'];	
		$segmentsResponse = new FindSegmentsForMailingListResponse($jsonData, 'listId');
	
		$this->assertInstanceOf('moosend\Actions\FindSegmentsForMailingList\FindSegmentsForMailingListResponse', $segmentsResponse);
	}
}