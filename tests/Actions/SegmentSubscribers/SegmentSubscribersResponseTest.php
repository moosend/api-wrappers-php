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
			
			$this->assertEquals($jsonData['Subscribers'][0]['Name'], $segmentSubscribersResponse->Subscribers[0]->Name);
			$this->assertEquals($jsonData['Subscribers'][1]['ID'], $segmentSubscribersResponse->Subscribers[1]->ID);

			$this->assertInstanceOf('moosend\Actions\SegmentSubscribers\SegmentSubscribersResponse', $segmentSubscribersResponse);
		}
}