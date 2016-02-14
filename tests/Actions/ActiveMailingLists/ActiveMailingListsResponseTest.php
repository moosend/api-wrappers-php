<?php
namespace tests\Actions\ActiveMailingLists;

use moosend\Actions\ActiveMailingLists\ActiveMailingListsResponse;

class ActiveMailingListsResponseTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test ActiveMailingListsResponse constructor
	 * @group ActiveMailingListsResponseTest
	 * @covers moosend\Actions\ActiveMailingLists\ActiveMailingListsResponse::__construct
	 */
	public function test_Can_Create_ActiveMailingListsResponse_Instance() {
		$jsonData = json_decode(file_get_contents(__DIR__ . '/../../JsonResponses/getActiveMailingListsJsonResponse.html'), true)['Context'];
		
		$response = new ActiveMailingListsResponse($jsonData);
	
		$this->assertInstanceOf('moosend\Actions\ActiveMailingLists\ActiveMailingListsResponse', $response);
		$this->assertEquals($jsonData['MailingLists'][0]['Name'], $response->MailingLists[0]->Name);
		$this->assertEquals($jsonData['MailingLists'][1]['CustomFieldsDefinition'][0]['ID'], $response->MailingLists[1]->CustomFieldsDefinition[0]->ID);
	}
}