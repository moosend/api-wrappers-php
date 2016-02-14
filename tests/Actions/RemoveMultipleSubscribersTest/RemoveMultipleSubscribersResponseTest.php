<?php
namespace tests\Actions\RemoveMultipleSubscribers;

use moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersResponse;
class RemoveMultipleSubscribersResponseTest extends \PHPUnit_Framework_TestCase {
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersResponse::withJSON
		 * @group RemoveMultipleSubscribersResponseTest
		 */
		public function test_Can_Create_RemoveMultipleSubscribersResponse_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
			$jsonData = json_decode('{
    										"Code": 0,
    										"Error": null,
    										"Context": { "EmailsIgnored": 0,
        														"EmailsProcessed": 0
															} }', true);
			$removeMultipleSubscribersResponse = RemoveMultipleSubscribersResponse::withJSON($jsonData['Context']);	
			
			$this->assertEquals(0, $removeMultipleSubscribersResponse->EmailsIgnored);
			$this->assertEquals(0, $removeMultipleSubscribersResponse->EmailsProcessed);

			$this->assertInstanceOf('moosend\Actions\RemoveMultipleSubscribers\RemoveMultipleSubscribersResponse', $removeMultipleSubscribersResponse);
		}
}