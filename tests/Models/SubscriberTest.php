<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/Subscriber.php';

use moosend\Models\Subscriber;

class SubscriberTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_subscriber;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getSubscriberByEmailJsonResponse.html'), true)['Context'];
		$this->_subscriber = Subscriber::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_subscriber = null;
	}
	
	/**
	 * Test Subscriber constructor.
	 * @covers moosend\Models\Subscriber::withJSON
	 * @group SubscriberTest
	 */
	public function test_Can_Create_Subscriber_Instance() {
		$this->assertInstanceOf('moosend\Models\Subscriber', $this->_subscriber);
		}
		
	/**
	 * Test custom "constructor" when providing valid JSON data.
	 * @covers moosend\Models\Subscriber::withJSON
	 * @group SubscriberTest
	 */
	public function test_Can_Create_Subscriber_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
		$this->assertEquals($this->_jsonData['ID'], $this->_subscriber->ID);
		$this->assertEquals($this->_jsonData['Name'], $this->_subscriber->Name);
		$this->assertEquals($this->_jsonData['Email'], $this->_subscriber->Email);
		$this->assertEquals($this->_jsonData['CreatedOn'], $this->_subscriber->CreatedOn);
		$this->assertEquals($this->_jsonData['UpdatedOn'], $this->_subscriber->UpdatedOn);
		$this->assertEquals($this->_jsonData['UnsubscribedOn'], $this->_subscriber->UnsubscribedOn);
		$this->assertEquals($this->_jsonData['UnsubscribedFromID'], $this->_subscriber->UnsubscribedFromID);
		$this->assertEquals($this->_jsonData['SubscribeType'], $this->_subscriber->SubscribeType);
		$this->assertEquals($this->_jsonData['CustomFields'][0]['Value'], $this->_subscriber->CustomFields[0]->Value);
	}
}