<?php

require_once __DIR__.'/../../src/moosend/MoosendApi.php';

use moosend\Wrappers\MailingListsWrapper;
use moosend\MoosendApi;
use moosend\StubHttpClient;
use moosend\Models\CustomFieldDefinition;

class MailingListsWrapperTest extends \PHPUnit_Framework_TestCase {
	private $_moosendApi;
	private $_stubHttpClient;
	private $_apiKey = 'myApiKey';
	
	public function setUp() {
		$this->_moosendApi = new MoosendApi($this->_apiKey);
		$this->_stubHttpClient = new StubHttpClient();
	}
	
	function tearDown() {
		$this->_moosendApi = null;
		$this->_stubHttpClient = null;
	}
	
	/**
	 * Test MailingListsWrapper constructor when API key is valid.
	 * @covers moosend\Wrappers\MailingListsWrapper::__construct
	 * @group MailingListsWrapperTest
	 */
	public function test_Can_Create_MailingListsWrapper_Instance() {
		$mailingListsWrapper = new MailingListsWrapper($this->_stubHttpClient, $this->_moosendApi->getApiEndpoint(), $this->_apiKey);
		$this->assertInstanceOf('moosend\Wrappers\MailingListsWrapper', $mailingListsWrapper);
	}

	//================================================================================
	// MailingListsWrapper::getActiveMailingLists
	//================================================================================
	
	/**
	 * Test error handling when calling getActiveMailingLists with an invalid page and/or pageSize.
	 * @group MailingListsWrapperTest
	 * @covers moosend\Wrappers\MailingListsWrapper::getActiveMailingLists
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForGetActiveMailingLists
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_GetActiveMailingLists_With_Non_Numeric_Arguments($page, $pageSize) {
		$this->_moosendApi->mailingLists->getActiveMailingLists($page, $pageSize);
	}

	//================================================================================
	// Invalid values provider 
	//================================================================================
	
	public function providerInvalidValuesForGetActiveMailingLists() {
		return array (
				array('abc', 1),
				array(1, 'abc'),
				array('abc', 'abc'),
		);
	}
	
	//================================================================================
	// MailingListsWrapper::create
	//================================================================================
	
	/**
	 * Test error handling when calling create with null for mailing list name.
	 * @group MailingListsWrapperTest
	 * @covers moosend\Wrappers\MailingListsWrapper::create
	 * @expectedException InvalidArgumentException
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_Create_With_Invalid_MailingList_Name() {
		$name = null;
		$this->_moosendApi->mailingLists->create($name);
	}
	
	//================================================================================
	// MailingListsWrapper::getSubscribers
	//================================================================================
	
	/**
	 * Test error handling when calling getSubscribers with null for mailing list ID and status.
	 * @group MailingListsWrapperTest
	 * @covers moosend\Wrappers\MailingListsWrapper::getSubscribers
	 * @expectedException InvalidArgumentException
	 */
	public function test_Throws_InvalidArgumentException_When_GetSubscribers_create_With_Invalid_MailingList_Name() {
		$this->_moosendApi->mailingLists->getSubscribers(null, null);
	}
	
	//================================================================================
	// MailingListsWrapper::getDetails
	//================================================================================
	
	/**
	 * Test error handling when calling getDetails with an invalid mailing list ID.
	 * @group MailingListsWrapperTest
	 * @covers moosend\Wrappers\MailingListsWrapper::getDetails
	 * @expectedException InvalidArgumentException
	 */
	public function test_Throws_InvalidArgumentException_When_GetDetails_create_With_Invalid_MailingList_Name() {
		$this->_moosendApi->mailingLists->getDetails(null);
	}
	
	//================================================================================
	// MailingListsWrapper::delete
	//================================================================================
	
	/**
	 * Test error handling when calling delete with an invalid mailing list ID.
	 * @group MailingListsWrapperTest
	 * @covers moosend\Wrappers\MailingListsWrapper::delete
	 * @expectedException InvalidArgumentException
	 */
	public function test_Throws_InvalidArgumentException_When_Delete_create_With_Invalid_MailingList_Name() {
		$this->_moosendApi->mailingLists->delete(null);
	}
	
	//================================================================================
	// MailingListsWrapper::createCustomField
	//================================================================================
	
	/**
	 * Test error handling when calling createCustomField with an invalid name and/or mailing list ID.
	 * @group MailingListsWrapperTest
	 * @covers moosend\Wrappers\MailingListsWrapper::createCustomField
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForCreateCustomField
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_CreateCustomField_With_Non_Numeric_Arguments($mailingListID, $name) {
		$this->_moosendApi->mailingLists->createCustomField($mailingListID, $name);
	}
	
	//================================================================================
	// Invalid values provider
	//================================================================================
	
	public function providerInvalidValuesForCreateCustomField() {
		return array (
				array('abc', null),
				array(null, 'abc'),
				array(null, null),
		);
	}
	
	//================================================================================
	// MailingListsWrapper::updateCustomField
	//================================================================================
	
	/**
	 * Test error handling when calling updateCustomField with an invalid mailing list ID.
	 * @group MailingListsWrapperTest
	 * @covers moosend\Wrappers\MailingListsWrapper::updateCustomField
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForUpdateCustomField
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_UpdateCustomField_With_Invalid_MailingListID($mailingListID) {
		$customFieldDefinition = new CustomFieldDefinition();
		$customFieldDefinition->ID = 'customFieldDefinitionID';
		$this->_moosendApi->mailingLists->updateCustomField($mailingListID, $customFieldDefinition);
	}
	
	//================================================================================
	// Invalid values provider
	//================================================================================
	
	public function providerInvalidValuesForUpdateCustomField() {
		return array (
				array(null),
				array(''),
		);
	}
	
	//================================================================================
	// MailingListsWrapper::deleteCustomField
	//================================================================================
	
	/**
	 * Test error handling when calling deleteCustomField with an invalid mailing list ID or customFieldID.
	 * @group MailingListsWrapperTest
	 * @covers moosend\Wrappers\MailingListsWrapper::deleteCustomField
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForDeleteCustomField
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_DeleteCustomField_With_Invalid_Arguments($mailingListID, $customFieldID) {
		$customFieldDefinition = new CustomFieldDefinition();
		$customFieldDefinition->ID = 'customFieldDefinitionID';
		$this->_moosendApi->mailingLists->deleteCustomField($mailingListID, $customFieldID);
	}
	
	//================================================================================
	// Invalid values provider
	//================================================================================
	
	public function providerInvalidValuesForDeleteCustomField() {
		return array (
				array(null, 'id'),
				array('id', null),
				array(null, null)
		);
	}
	
	//================================================================================
	// MailingListsWrapper::update
	//================================================================================
	
	/**
	 * Test error handling when calling update with null for mailing list name.
	 * @group MailingListsWrapperTest
	 * @covers moosend\Wrappers\MailingListsWrapper::update
	 * @expectedException InvalidArgumentException
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_update_With_Invalid_MailingList_Name() {
		$name = null;
		$this->_moosendApi->mailingLists->update('mailing_list_ID', $name); 
	}
}