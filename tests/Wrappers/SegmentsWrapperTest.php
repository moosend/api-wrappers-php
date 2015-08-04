<?php
require_once __DIR__.'/../../src/moosend/MoosendApi.php';

use moosend\MoosendApi;
use moosend\StubHttpClient;
use moosend\Wrappers\SegmentsWrapper;

class SegmentsWrapperTest extends \PHPUnit_Framework_TestCase {
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
	 * Test SegmentsWrapper constructor when API key is valid.
	 * @covers moosend\Wrappers\SegmentsWrapper::__construct
	 * @group SegmentsWrapperTest
	 */
	public function test_Can_Create_SegmentsWrapper_Instance() {
		$segmentsWrapper = new SegmentsWrapper($this->_stubHttpClient, $this->_moosendApi->getApiEndpoint(), $this->_apiKey);
		$this->assertInstanceOf('moosend\Wrappers\SegmentsWrapper', $segmentsWrapper);
		$this->assertSame($this->_moosendApi->getApiEndpoint(), $this->_moosendApi->segments->getApiEndpoint());
		$this->assertSame($this->_apiKey, $this->_moosendApi->segments->getApiKey());
	}
	
	/**
	 * Test SegmentsWrapper's API endpoint getter.
	 * @covers moosend\Wrappers\SegmentsWrapper::getApiEndpoint
	 * @group SegmentsWrapperTest
	 */
	public function test_Can_Get_SegmentsWrapper_ApiEndpoint() {
		$this->assertEquals($this->_moosendApi->getApiEndpoint(), $this->_moosendApi->segments->getApiEndpoint());
	}
	
	/**
	 * Test SegmentsWrapper's API key getter.
	 * @covers moosend\Wrappers\SegmentsWrapper::getApiKey
	 * @group SegmentsWrapperTest
	 */
	public function test_Can_Get_SegmentsWrapper_ApiKey() {
		$this->assertEquals($this->_apiKey, $this->_moosendApi->segments->getApiKey());
	}
	

	/**
	 * Test error handling when calling getSegments with null mailing list ID.
	 * @group SegmentsWrapperTest
	 * @covers moosend\Wrappers\SegmentsWrapper::getSegments
	 * @expectedException InvalidArgumentException
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_GetSegments_With_Invalid_MailingListID() {
		$mailingListID = null;
		$this->_moosendApi->segments->getSegments($mailingListID);
	}
	
	/**
	 * Test error handling when calling create with an invalid mailing list ID and/or name.
	 * @group SegmentsWrapperTest
	 * @covers moosend\Wrappers\SegmentsWrapper::create
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_Create_With_Invalid_Arguments($mailingListID, $name) {
		$this->_moosendApi->segments->create($mailingListID, $name);
	}
	
	/**
	 * Test error handling when calling delete with an invalid mailing list ID and/or segment ID.
	 * @group SegmentsWrapperTest
	 * @covers moosend\Wrappers\SegmentsWrapper::delete
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_Delete_With_Invalid_Arguments($mailingListID, $segmentID) {
		$this->_moosendApi->segments->delete($mailingListID, $segmentID);
	}
	
	/**
	 * Test error handling when calling getDetails with an invalid mailing list ID and/or segment ID.
	 * @group SegmentsWrapperTest
	 * @covers moosend\Wrappers\SegmentsWrapper::getDetails
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_GetDetails_With_Invalid_Arguments($mailingListID, $segmentID) {
		$this->_moosendApi->segments->getDetails($mailingListID, $segmentID);
	}
	
	/**
	 * Test error handling when calling getSubscribers with an invalid mailing list ID and/or segment ID.
	 * @group SegmentsWrapperTest
	 * @covers moosend\Wrappers\SegmentsWrapper::getSubscribers
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValues
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_GetSubscribers_With_Invalid_Arguments($mailingListID, $segmentID) {
		$this->_moosendApi->segments->getSubscribers($mailingListID, $segmentID);
	}
	
	public function providerInvalidValues() {
		return array (
				array('abc', null),
				array(null, 'abc'),
				array(null, null)
		);
	}
	
	/**
	 * Test error handling when calling addCriteria with invalid required arguments.
	 * @group SegmentsWrapperTest
	 * @covers moosend\Wrappers\SegmentsWrapper::addCriteria
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForAddCriteria
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_AddCriteria_With_Invalid_Arguments($mailingListID, $segmentID, $field, $comparer, $value) {
		$this->_moosendApi->segments->addCriteria($mailingListID, $segmentID, $field, $comparer, $value);
	}
	
	public function providerInvalidValuesForAddCriteria() {
		return array (
				array(null, 'arg', 'arg', 'arg', 'arg'),
				array('arg', null, 'abc', 'arg', 'arg'),
				array('arg', 'arg', null, 'arg', 'arg'),
				array('arg', 'arg', null, 'arg', 'arg'),
				array('arg', 'arg', 'arg', null, 'arg'),
				array('arg', 'arg', 'arg', 'arg', null),
				array(null, null, null, null, null),
		);
	}
	
	/**
	 * Test error handling when calling updateCriteria with invalid required arguments.
	 * @group SegmentsWrapperTest
	 * @covers moosend\Wrappers\SegmentsWrapper::updateCriteria
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForUpdateCriteria
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_UpdateCriteria_With_Invalid_Arguments($mailingListID, $segmentID, $criteriaID, $field, $comparer, $value) {
		$this->_moosendApi->segments->updateCriteria($mailingListID, $segmentID, $criteriaID, $field, $comparer, $value);
	}
	
	public function providerInvalidValuesForUpdateCriteria() {
		return array (
				array(null, 'arg', 'arg', 'arg', 'arg', 'arg'),
				array('arg', null, 'arg', 'abc', 'arg', 'arg'),
				array('arg', 'arg', null, 'arg', 'arg', 'arg'),
				array('arg', 'arg', 'arg',null, 'arg', 'arg'),
				array('arg', 'arg', 'arg', 'arg', null, 'arg'),
				array('arg', 'arg', 'arg', 'arg', 'arg', null),
				array(null, null, null, null, null, null)
		);
	}
	
	/**
	 * Test error handling when calling removeCriteria with invalid required arguments.
	 * @group SegmentsWrapperTest
	 * @covers moosend\Wrappers\SegmentsWrapper::removeCriteria
	 * @expectedException InvalidArgumentException
	 * @dataProvider providerInvalidValuesForRemoveMultipleSubscribers
	 */
	public function test_Throws_InvalidArgumentException_When_Calling_RemoveCriteria_With_Invalid_Arguments($mailingListID, $segmentID, $criteriaID) {
		$this->_moosendApi->segments->removeCriteria($mailingListID, $segmentID, $criteriaID);
	}
	
	public function providerInvalidValuesForRemoveMultipleSubscribers() {
		return array (
				array(null, 'arg', 'arg'),
				array('arg', null, 'arg'),
				array('arg', 'arg', null),
				array(null, null, null, null)
		);
	}
}








