<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/MailingList.php';

use moosend\Models\MailingList;
use moosend\Models\Sender;
use moosend\Models\CustomFieldDefinition;

class MailingListTest extends \PHPUnit_Framework_TestCase {
	private $_jsonData;
	private $_mailingList;
	
	public function setUp() {
		$this->_jsonData = json_decode(file_get_contents(__DIR__ . '/../../tests/JsonResponses/getCampaignRawJsonResponse.html'), true)['Context']['MailingList'];
		$this->_mailingList = MailingList::withJSON($this->_jsonData);
	}
	
	public function tearDown() {
		$this->_jsonData = null;
		$this->_mailingList = null;
	}
	
	/**
	 * Test MailingList constructor.
	 * @covers moosend\Models\MailingList::withJSON
	 * @group MailingListTest
	 */
	public function test_Can_Create_MailingList_Instance() {
		$this->assertInstanceOf('moosend\Models\MailingList', $this->_mailingList);
		}
		
		/**
		 * Test custom "constructor" when providing valid JSON data.
		 * @covers moosend\Models\MailingList::withJSON
		 * @group MailingListTest
		 */
		public function test_Can_Create_MailingList_Instance_When_Providing_Valid_Json_Data_To_Custom_Constructor() {
			$this->assertEquals('04fad8e2-2b35-4302-a887-58f14a1152ab', $this->_mailingList->getID());
			$this->assertEquals('Your List Name', $this->_mailingList->getName());
			$this->assertEquals(1024, $this->_mailingList->getActiveMemberCount());
			$this->assertEquals(16, $this->_mailingList->getBouncedMemberCount());
			$this->assertEquals(32, $this->_mailingList->getRemovedMemberCount());
			$this->assertEquals(24, $this->_mailingList->getUnsubscribedMemberCount());
			$this->assertEquals(0, $this->_mailingList->getStatus());
			
			$this->assertEquals(CustomFieldDefinition::withJSON($this->_jsonData['CustomFieldsDefinition'][0]), $this->_mailingList->getCustomFieldsDefinition()[0]);
		
			$this->assertEquals('127.0.0.1', $this->_mailingList->getCreatedBy());
			$this->assertEquals('/Date(1368710504000+0300)/', $this->_mailingList->getCreatedOn());
			$this->assertEquals('127.0.0.1', $this->_mailingList->getUpdatedBy());
			$this->assertEquals('/Date(1368710923000+0300)/', $this->_mailingList->getUpdatedOn());
			$this->assertEquals( array(
					 'ID' => 0,
	                'DataHash' => '175aae27-6622-4f6d-b52c-6442090a6730',
	                'Mappings' => 'Some Mappings',
	                'EmailNotify' => 'Some EmailNotify',
	                'CreatedOn'=> '/Date(1400765193384)/',
	                'StartedOn'=> '/Date(1400765193384)/',
	                'CompletedOn'=> '/Date(1400765193384)/',
	                'TotalInserted'=> 0,
	                'TotalUpdated'=> 0,
	                'TotalUnsubscribed'=> 0,
	                'TotalInvalid'=> 0,
	                'TotalDuplicate'=> 0,
	                'TotalMembers'=> 0,
	                'Message'=> 'Some Message',
               		 'Success'=> false
			),
					 $this->_mailingList->getImportOperation());
		}
}