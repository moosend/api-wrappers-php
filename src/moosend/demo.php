<?php

// require_once __DIR__.'/MoosendApi.php';
// require_once __DIR__.'/Models/CampaignParams.php';
// require_once __DIR__.'/Models/SubscriberParams.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use moosend\MoosendApi;
use moosend\Models\CampaignParams;
use moosend\Models\Campaign;
use moosend\Models\SubscriberParams;
use moosend\SubscribeType;
use moosend\Models\Subscriber;

// @codeCoverageIgnoreStart
$apiKeyNikolas = 'f2768b74-06ae-4d18-b886-a7400c209b9e';
$apiKeyGiannis = '03e3c603-44f4-4b23-88be-95b200d2f752';
$apiKeyManolis = 'fb60f9bf-993c-4f79-9e57-2f742b61adde';


$campaignIDNikolas = '0fe37eb5-aa20-40d1-b3aa-8a40898db9d1';
$campaignIDGiannis = '5c22953a-e0b1-4699-96f3-9c57cd8ffdfe';

$mailingListIDGiannis = '4e9243e2-4a81-4c17-9672-574b61cc2560';

$moosendApiNikolas = new MoosendApi($apiKeyNikolas);
$moosendApiGiannis = new MoosendApi($apiKeyGiannis);
$moosendApiManolis = new MoosendApi($apiKeyManolis);

// ----------------------------------------------- Segments -----------------------------------------------
// // removeCriteria (pivotal bug, den doulevei to api)
// $segments = $moosendApiGiannis->segments->getSegments('32a49805-8e4f-4b07-812f-4491ca7b40f2'); 
// $aSegment = getSegmentWithName('a', $segments); 
// $criteriaID = $aSegment->getCriteria()[0]->getID();
// $removeCriteriaResponse = $moosendApiGiannis->segments->removeCriteria('32a49805-8e4f-4b07-812f-4491ca7b40f2', $aSegment->getID(), $criteriaID);

// // updateCriteria
// $segments = $moosendApiGiannis->segments->getSegments($mailingListIDGiannis); // get segments
// $iPhoneModelSegment = getSegmentWithName('iPhone 6', $segments); // get iPhone 6 segment
// $criteriaID = $iPhoneModelSegment->getCriteria()[0]->getID(); // get first criteria of iPhone 6 segment ID.
// $updateCriteriaResponse = $moosendApiGiannis->segments->updateCriteria($mailingListIDGiannis, $iPhoneModelSegment->getID(), $criteriaID, 'LinksClicked', 'Is', '100');
// var_dump($updateCriteriaResponse);

// // addCretiria with custom field
// // addCriteria(/* string */ $mailingListID, /* int */ $segmentID, /* string */ $field, /* string */ $comparer, /* string */ $value, \DateTime $dateFrom = null, \DateTime $dateTo = null) {
// $listID = '32a49805-8e4f-4b07-812f-4491ca7b40f2';
// $listSegments = $moosendApiGiannis->segments->getSegments($listID);
// $segmentID = $listSegments[0]->getID();
// $field = $moosendApiGiannis->mailingLists->getDetails($listID)->getCustomFieldsDefinition()[0]->ID;
// $comparer = 'Is';
// $value = 20000;
// $newCriteriaID = $moosendApiGiannis->segments->addCriteria($listID, $segmentID, $field, $comparer, $value);
// var_dump($newCriteriaID);

// // add criteria with dates..
// $listID = '32a49805-8e4f-4b07-812f-4491ca7b40f2';
// $listSegments = $moosendApiGiannis->segments->getSegments($listID);
// $segmentID = $listSegments[0]->getID();
// $field = 'LinksClicked';
// $comparer = 'Is';
// $value = 20;
// $dateFrom = '20/01/2015'; //DateTime::createFromFormat('d/m/Y', '20/01/2015');; 
// $dateTo = '25/01/2015'; //DateTime::createFromFormat('d/m/Y', '27/05/2015');
// $newCriteriaID = $moosendApiGiannis->segments->addCriteria($listID, $segmentID, $field, $comparer, $value, $dateFrom, $dateTo);
// var_dump($newCriteriaID);

// // getSubscribers
// $segments = $moosendApiGiannis->segments->getSegments($mailingListIDGiannis);
// $subscribers = $moosendApiGiannis->segments->getSubscribers($mailingListIDGiannis, $segments[0]->getID(), 'Removed');
// var_dump($subscribers);

// // getDetails
// $segments = $moosendApiGiannis->segments->getSegments($mailingListIDGiannis);
// $details = $moosendApiGiannis->segments->getDetails($mailingListIDGiannis, $segments[0]->getID());
// var_dump($details);

// // update
// $segments = $moosendApiGiannis->segments->getSegments('32a49805-8e4f-4b07-812f-4491ca7b40f2');
// $segments[0]->setName('updated name (segment4) segment\'s name');
// $updateResponse = $moosendApiGiannis->segments->update('32a49805-8e4f-4b07-812f-4491ca7b40f2', $segments[0]);
// var_dump($updateResponse);

// // create
// $createSegmentResponse = $moosendApiGiannis->segments->create('32a49805-8e4f-4b07-812f-4491ca7b40f2', '26/1/15');
// var_dump($createSegmentResponse);

// // delete
// $segments = $moosendApiGiannis->segments->getSegments($mailingListIDGiannis);
// $deleteResponse = $moosendApiGiannis->segments->delete('32a49805-8e4f-4b07-812f-4491ca7b40f2', 4149);
// var_dump($deleteResponse);

// // getSegments
// $segments = $moosendApiGiannis->segments->getSegments($mailingListIDGiannis);
// var_dump($segments[0]);

// ----------------------------------------------- Mailing Lists -----------------------------------------------
// // update
// $updateMailingListResponse = $moosendApiGiannis->mailingLists->update($mailingListIDGiannis, 'API: testing mailing list', 'http://Api-confirm2-page.com', 'http://Api-redirect2-page.com');
// var_dump($updateMailingListResponse);

// // deleteCustomField
// $customFieldDefinition = $moosendApiGiannis->mailingLists->getDetails($mailingListIDGiannis)->getCustomFieldsDefinition()[1];
// $deleteCustomFieldResponse = $moosendApiGiannis->mailingLists->deleteCustomField($mailingListIDGiannis, $customFieldDefinition->ID);
// var_dump($deleteCustomFieldResponse);

// // updateCustomField
// $ageCustomFieldDefinition = $moosendApiGiannis->mailingLists->getDetails($mailingListIDGiannis)->getCustomFieldsDefinition()[0];
// $ageCustomFieldDefinition->IsRequired = true;
// $updateCustomFieldResponse = $moosendApiGiannis->mailingLists->updateCustomField($mailingListIDGiannis, $ageCustomFieldDefinition);
// var_dump($updateCustomFieldResponse);

// createCustomField
// $createCustomFieldResponse = $moosendApiGiannis->mailingLists->createCustomField($mailingListIDGiannis, ' by hand to get id', 'SingleSelectDropdown', true, 'YES, NO');
// var_dump($createCustomFieldResponse); 

// // delete
// $deleteMailingListResponse = $moosendApiGiannis->mailingLists->delete('f9119fa0-e0b5-463a-881a-a6da9af3eb60');
// var_dump($deleteMailingListResponse); 

// // getDetails
// $mailingListDetails = $moosendApiGiannis->mailingLists->getDetails($mailingListIDGiannis);
// var_dump($mailingListDetails);

// // // getActiveMailingLists
// $activeMailingLists = $moosendApiManolis->mailingLists->getActiveMailingLists(1,100);
// foreach ($activeMailingLists as $list) {
//     $name = $list->getName();
//     echo "Name: {$name} </br>";
// }

// // create
// $newMailingListID = $moosendApiGiannis->mailingLists->create('Mailing List by hand', 'http://confirmationPage.com', 'http://redirectAfterUnsubscribePage.com');
// echo "Created new mailing list with ID: {$newMailingListID}";


// // // getSubscribers
// $since = new DateTime('2014-01-14');
// $subscribers = $moosendApiGiannis->mailingLists->getSubscribers('4e9243e2-4a81-4c17-9672-574b61cc2560', 'Subscribed',  $since);
// echo "Name:  {$subscribers[0]->getName()} - Email:  {$subscribers[0]->getEmail()}  </br>";

// ----------------------------------------------- Campaigns -----------------------------------------------

// // getCampaign
// $campaign = $moosendApiGiannis->campaigns->getCampaign($campaignIDGiannis);
// print_r('sender: '.$campaign->getSender()->getEmail()."<br /> ");
// echo "<br />";
// var_dump($campaign->getMailingList());

// // getCampaigns (descending order)
// $campaings = $moosendApiGiannis->campaigns->getCampaigns(1, 2, 'CreatedOn', 'DESC');
// var_dump($campaings);

// // clone
// $clonedCampaign = $moosendApiGiannis->campaigns->cloneCampaign('1711a3ea-b446-44f1-9711-0eaee3c96472');
// var_dump($clonedCampaign);

// // send
// $send = $moosendApiGiannis->campaigns->send('41820cef-439f-43a9-a542-c1981cef5538');
// var_dump($send);

// // delete
// $delete = $moosendApiGiannis->campaigns->delete('77b62d4a-2c33-42ff-afdc-cce531d17a2f');
// var_dump($delete);

// getCampaignSummary
// $campaignSummary = $moosendApiGiannis->campaigns->getCampaignSummary('c9178c20-380e-42b6-bd13-de8e82d7427a');
// var_dump($campaignSummary);

// getActivityByLocation
// $activityByLocation = $moosendApiGiannis->campaigns->getActivityByLocation('c9178c20-380e-42b6-bd13-de8e82d7427a');
// var_dump($activityByLocation);
// echo "<br/> <br/>";
// var_dump($activityByLocation[0]->Context);

// getLinkActivity
// $moosend = new MoosendApi('fb60f9bf-993c-4f79-9e57-2f742b61adde');
// $linkActivity = $moosend->campaigns->getLinkActivity('020d66d9-f1ba-47a1-a3d1-27ea9c311936');
// var_dump($linkActivity);
// echo "<br/> <br/>";
// var_dump($linkActivity[0]->getTotalCount());

// // send campaign test
// $emails = array('jtourkos@hotmail.com', 'jtourkos@gmail.com');
// $testCampaign  = $moosendApiGiannis->campaigns->sendCampaignTest('edfc5011-7541-47eb-8568-bafe14194fb9', $emails);
// var_dump($testCampaign);

// // getSenderDetails
// $senderDetails = $moosendApiGiannis->campaigns->getSenderDetails('jtourkos@gmail.com');
// var_dump($senderDetails);

// // getAllSenders
// $senders = $moosendApiGiannis->campaigns->getAllSenders();
// var_dump($senders);

// // createDraft
// $draftParams = new CampaignParams();
// $draftParams->Name = 'draft name before';
// $draftParams->Subject = 'draft Subject before';
// $draftParams->SenderEmail = 'jtourkos@gmail.com';
// $draftParams->ReplyToEmail = 'jtourkos@hotmail.com';
// $draftParams->MailingListID = 'c673e294-a68a-46de-bdbf-e2ead42679c5';
// $draftParams->ConfirmationToEmail = 'jtourkos@hotmail.com';
// $draftParams->ReplyToEmail = 'jtourkos@gmail.com';
// $draftParams->WebLocation = 'https://github.com/moosend/dotnetwrapper/blob/master/Models/CampaignParams.cs';
// $draftID = $moosendApiGiannis->campaigns->createDraft($draftParams);
// var_dump($draftID);

// // updateDraft
// $campaign = $moosendApiGiannis->getCampaign('c9b42454-80cc-48a8-8275-865fb30974fe');
// $campaign->setName('After!');
// $campaign->setSubject('After subject');
// $updateDraftResponse = $moosendApiGiannis->campaigns->updateDraft($campaign);
// var_dump($updateDraftResponse);

// ----------------------------------------------- Subscribers -----------------------------------------------

// // getSubscriberByEmail
// $subscriber = $moosendApiGiannis->subscribers->getSubscriberByEmail($mailingListIDGiannis, '3@3.com');
// echo "ID: {$subscriber->getID()} Name: {$subscriber->getName()} Email: {$subscriber->getEmail()}";

// // addSubscriber
// $member = new SubscriberParams();
// $member->email = 'autoload@example.com';
// $member->name= 'example';
// $member->customFields = array("Age=30", "Country=GREECE");
// $addedSubscriber = $moosendApiGiannis->subscribers->addSubscriber('32a49805-8e4f-4b07-812f-4491ca7b40f2', $member);
// var_dump($addedSubscriber);

// // unsubscribe
// $unsubscribe = $moosendApiGiannis->subscribers->unsubscribe('2@2.com');
// $unsubscribe = $moosendApiGiannis->subscribers->unsubscribe('autoload@example.com', null, '32a49805-8e4f-4b07-812f-4491ca7b40f2'); // unsubscribe from a specific mailing list
//  var_dump($unsubscribe);

// // removeSubscriber
// $removeSubscriber = $moosendApiGiannis->subscribers->removeSubscriber('32a49805-8e4f-4b07-812f-4491ca7b40f2', '13@13.com');
// var_dump($removeSubscriber);

// // add multiple subscribers
// $subscribers = [
//  'Subscribers[0].Email' => 'auto1@last.com', 
//  'Subscribers[0].Name' => 'lst', 
//  'Subscribers[0].CustomFields' => ['Age=22', 'Country=JAPAN'],
//  'Subscribers[1].Email' => 'auto2@last.com',
//  'Subscribers[1].Name' => 'lst',
//  'Subscribers[1].CustomFields' => ['Age=22', 'Country=USA']
// ];
// $add = $moosendApiGiannis->subscribers->addMultipleSubscribers('32a49805-8e4f-4b07-812f-4491ca7b40f2', $subscribers);
// var_dump($add);

// // removeMultipleSubscribers
// $emails = 'auto1@last.com, auto2@last.com';
// $removeMultipleSubscribers = $moosendApiGiannis->subscribers->removeMultipleSubscribers('32a49805-8e4f-4b07-812f-4491ca7b40f2', $emails);
// var_dump($removeMultipleSubscribers);

function getSegmentWithName($name, $segments) {
	foreach ($segments as $segment) {
		if ($segment->getName() == $name) {
			return  $segment;
		}
	}
}

// @codeCoverageIgnoreStop




