<?php
namespace tests\IntegrationTests;

use moosend\MoosendApi;
use moosend\Models\CustomFieldDefinition;

class MailingListsWrapperIntergrationTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * @group MailingListsWrapperIntergrationTest
	 */
	public function test_MailingListsWrapperIntergrationTests() {
		$apiKey = '03e3c603-44f4-4b23-88be-95b200d2f752';
		$moosendApi = new MoosendApi($apiKey);		
		
		// create a mailing list
		$name = 'MailingLists Wrapper Integration Tests: New Mailing List'; 
		$confirmationPage = 'http://confirmation-page.com';
		$redirectAfterUnsubscribePage = 'http://redirect-after-unsubscribe-page.com';
		$mailingListID = $moosendApi->mailingLists->create($name, $confirmationPage, $redirectAfterUnsubscribePage);
		
		// get the new mailing list
		$mailingList = $moosendApi->mailingLists->getDetails($mailingListID);
		$this->assertEquals($name, $mailingList->getName());
		
		// update mailing list
		$updatedName = 'MailingLists Wrapper Integration Tests: Updated Mailing List';
		$updatedConfirmationPage = 'http://updatedConfirmation-page.com';
		$updatedRedirectAfterUnsubscribePage = 'http://updatedRedirect-after-unsubscribe-page.com';
		$mailingListID = $moosendApi->mailingLists->update($mailingListID, $updatedName, $updatedConfirmationPage, $updatedRedirectAfterUnsubscribePage);
		
		// get the updated mailing list
		$mailingList = $moosendApi->mailingLists->getDetails($mailingListID);
		$this->assertEquals($updatedName, $mailingList->getName());
		
		// create custom field with default values
		$customFieldName = 'MailingLists Wrapper Integration Tests: Custom Field';
		$customFieldID = $moosendApi->mailingLists->createCustomField($mailingListID, $customFieldName);
		
		// get the updated mailing list
		$mailingList = $moosendApi->mailingLists->getDetails($mailingListID);
		$this->assertEquals($customFieldName, $mailingList->getCustomFieldsDefinition()[0]->Name);
		
		// create another custom field
		$anotherFieldName = 'MailingLists Wrapper Integration Tests: Another Field'; 
		$customFieldType = 3;
		$isRequired = true;
		$options = 'YES, NO';
		$anotherCustomFieldID = $moosendApi->mailingLists->createCustomField($mailingListID, $anotherFieldName, $customFieldType, $isRequired, $options);
		
		// get the updated mailing list
		$mailingList = $moosendApi->mailingLists->getDetails($mailingListID);
		$found = false;
		foreach ($mailingList->getCustomFieldsDefinition() as $customFieldDefinition) {
			if ($customFieldDefinition->Name == 'MailingLists Wrapper Integration Tests: Another Field') {
				$found = true;
			}
		}
		$this->assertTrue($found, 'custom field found in mailing list');
		
		// get list's custom fields definitions
		$customFieldDefinitions = $moosendApi->mailingLists->getDetails($mailingListID)->getCustomFieldsDefinition();
		
		// extract second field
		$secondField = null;
		foreach ($customFieldDefinitions as $field) {
			if ($field->Name == 'MailingLists Wrapper Integration Tests: Another Field') {
				$secondField = $field;
			}
		}
		
		// change some field's properties
		$secondField->Name = 'Updated name';
		$secondField->IsRequired = false;
		
		// update the second field
		$moosendApi->mailingLists->updateCustomField($mailingListID, $secondField);
		
		// get the updated list
		$mailingList = $moosendApi->mailingLists->getDetails($mailingListID);
		
		// extract second field
		$updatedSecondField = null;
		foreach ($customFieldDefinitions as $field) {
			if ($field->Name == 'Updated name') {
				$updatedSecondField = $field;
			}
		}
		
		$this->assertEquals($secondField->Name, $updatedSecondField->Name);
	
		// delete the second field
		$moosendApi->mailingLists->deleteCustomField($mailingListID, $secondField->ID);
		
		// get the updated list
		$mailingList = $moosendApi->mailingLists->getDetails($mailingListID);
		
		$this->assertTrue(count($mailingList->getCustomFieldsDefinition()) == 1, 'Custom field deleted');
		
		// delete the mailing list
		$moosendApi->mailingLists->delete($mailingListID);
	}
}