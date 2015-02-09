<?php
namespace tests\Models;

use moosend\Models\Sender;

require_once __DIR__.'/../../src/moosend/Models/Sender.php';


class SenderTest extends \PHPUnit_Framework_TestCase {
	private $_sender;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getSenderDetailsJsonResponse.html'), true)['Context'];
		$this->_sender = Sender::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_sender = null;
	}
	
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\Sender::withJSON
		 * @group SenderTest
		 */
		public function test_Can_Create_Sender_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
			$this->assertEquals('01234567-89ab-cdef-0123-456789abcdef', $this->_sender->getID());
			$this->assertEquals('Your Name', $this->_sender->getName());
			$this->assertEquals('sender@example.com', $this->_sender->getEmail());
			$this->assertEquals('/Date(1323857838000+0200)/', $this->_sender->getCreatedOn());
			$this->assertEquals(true, $this->_sender->getIsEnabled());
			$this->assertEquals(false, $this->_sender->getSpfVerified());
			$this->assertEquals(false, $this->_sender->getDkimVerified());
			$this->assertEquals('Some DkimPublic', $this->_sender->getDkimPublic());		

			$this->assertInstanceOf('moosend\Models\Sender', $this->_sender);
		}
}