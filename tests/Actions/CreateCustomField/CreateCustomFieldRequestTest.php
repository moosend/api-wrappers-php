<?php
namespace tests\Actions\CreateCustomField;

use moosend\Actions\CreateCustomField\CreateCustomFieldRequest;

class CreateCustomFieldRequestTest extends  \PHPUnit_Framework_TestCase {
	/**
	 * Test CreateCustomFieldRequest constructor.
	 * @group CreateCustomFieldRequestTest
	 * @covers moosend\Actions\CreateCustomField\CreateCustomFieldRequest::__construct
	 */
	public function test_Can_Create_CreateCustomFieldRequest_Instance() {
		$createCustomFieldRequest = new CreateCustomFieldRequest('name', 'type', true, 'YES, NO');
		$this->assertInstanceOf('moosend\Actions\CreateCustomField\CreateCustomFieldRequest', $createCustomFieldRequest);
		$this->assertEquals($createCustomFieldRequest->name, 'name');
		$this->assertEquals($createCustomFieldRequest->customFieldType, 'type');
		$this->assertEquals($createCustomFieldRequest->isRequired, true);
		$this->assertEquals($createCustomFieldRequest->options, 'YES, NO');
	}
}