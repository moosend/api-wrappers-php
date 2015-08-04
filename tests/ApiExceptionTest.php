<?php
namespace tests;

use moosend\ApiException;

class ApiExceptionTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test constructor.
	 * @covers moosend\ApiException::__construct
	 * @group ApiExceptionTest
	 */
	public function test_Can_Create_ApiException_Instance() {
		$apiException = new ApiException('Api error message', 'moosend\Response::context', 501);
		$this->assertInstanceOf( 'moosend\ApiException', $apiException);
	}
}