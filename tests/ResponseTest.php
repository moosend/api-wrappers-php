<?php
namespace moosend;
class ResponseTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test constructor.
	 * @covers moosend\Response::__construct
	 * @group ResponseTest
	 */
	public function test_Can_Create_Response_Instance_When_Request_Is_Successful() {
		$jsonRawResponse = json_decode('{"Code":0, "Error":null, "Context":{
    																							"ID": 123,
    	    																					"Name": "John"
    																							}}', true);
		$jsonResponse = new Response($jsonRawResponse);
		$this->assertInstanceOf( 'moosend\Response', $jsonResponse);
		$this->assertEquals(0, $jsonResponse->getCode());
		$this->assertEquals(null, $jsonResponse->getError());
		$this->assertEquals(array('ID' => 123, 'Name' => 'John'), $jsonResponse->getContext());
	}
}