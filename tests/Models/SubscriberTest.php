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
		$this->assertEquals($this->_jsonData['ID'], $this->_subscriber->getID());
		$this->assertEquals($this->_jsonData['Name'], $this->_subscriber->getName());
		$this->assertEquals($this->_jsonData['Email'], $this->_subscriber->getEmail());
		$this->assertEquals($this->_jsonData['CreatedOn'], $this->_subscriber->getCreatedOn());
		$this->assertEquals($this->_jsonData['UpdatedOn'], $this->_subscriber->getUpdatedOn());
		$this->assertEquals($this->_jsonData['UnsubscribedOn'], $this->_subscriber->getUnsubscribedOn());
		$this->assertEquals($this->_jsonData['UnsubscribedFromID'], $this->_subscriber->getUnsubscribedFromID());
		$this->assertEquals($this->_jsonData['SubscribeType'], $this->_subscriber->getSubscribeType());
		$this->assertEquals($this->_jsonData['CustomFields'][0]['Value'], $this->_subscriber->getCustomFields()[0]->getValue());
	}
}