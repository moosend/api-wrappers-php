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
		
		$activeMailingLists = new ActiveMailingListsResponse($jsonData);
	
		$this->assertInstanceOf('moosend\Actions\ActiveMailingLists\ActiveMailingListsResponse', $activeMailingLists);
		$this->assertEquals($jsonData['MailingLists'][0]['Name'], $activeMailingLists[0]->getName());
		$this->assertEquals($jsonData['MailingLists'][1]['CustomFieldsDefinition'][0]['ID'], $activeMailingLists[1]->getCustomFieldsDefinition()[0]->ID);
	}
}