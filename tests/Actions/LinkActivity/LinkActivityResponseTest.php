<?php
namespace tests\Actions\LinkActivity;

use moosend\Actions\LinkActivity\LinkActivityResponse;

class LinkActivityResponseTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test LinkActivityResponse constructor
	 * @group LinkActivityResponseTest
	 * @covers moosend\Actions\LinkActivity\LinkActivityResponse::__construct
	 */
	public function test_Can_Create_LinkActivityResponse_Instance() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/ActivityByLocationJson.html'), true)['Context'];	
		$linkActivityResponse = new LinkActivityResponse($jsonData);
	
		$this->assertInstanceOf('moosend\Actions\LinkActivity\LinkActivityResponse', $linkActivityResponse);
	}
}