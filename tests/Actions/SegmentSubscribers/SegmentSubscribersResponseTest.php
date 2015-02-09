<?php
namespace tests\Actions\SegmentSubscribers;

use moosend\Actions\SegmentSubscribers\SegmentSubscribersResponse;

class SegmentSubscribersResponseTest extends \PHPUnit_Framework_TestCase {
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Actions\SegmentSubscribers\SegmentSubscribersResponse::__construct
		 * @group SegmentSubscribersResponseTest
		 */
		public function test_Can_Create_SegmentSubscribersResponse_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
			$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getSegmentSubscribersJsonResponse.html'), true)['Context']; 
			$segmentSubscribersResponse = new SegmentSubscribersResponse($jsonData);	
			
			$this->assertEquals('Some Name', $segmentSubscribersResponse[0]->getName());
			$this->assertEquals('1bce44f1-5b48-49bb-8a98-f23839e54961', $segmentSubscribersResponse[1]->getID());

			$this->assertInstanceOf('moosend\Actions\SegmentSubscribers\SegmentSubscribersResponse', $segmentSubscribersResponse);
		}
}