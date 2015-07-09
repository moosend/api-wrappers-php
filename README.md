# **Moosend PHP API Wrapper** #

Moosend PHP API Wrapper allows you to connect to the [Moosend](http://www.moosend.com) API and supports the operations listed below.

Mailing Lists

- List available mailing lists

- Retrieve mailing list details

- Create, update or delete mailing lists

- Create, update or delete custom fields

- Get Subscribers in a mailing list

Subscribers

- Retrieve subscriber details

- Add multiple subscribers

- Subscribe, Unsubscribe or Remove subscribers

Campaigns 

- List available campaigns

- Retrieve campaign details

- Create draft campaigns or clone existing campaigns

- Send a campaign test

- Send a draft campaign to the linked mailing list

- Retrieve statistics and performance metrics for a sent campaign

Segments 

- Retrieve mailing list's segments

- Create, update or delete segments

- Retrieve subscribers

- Create, update or delete segment criteria

# Installation #

**Via Composer**: Add to your composer.json:

```{
"require": {
"moosend/phpwrapper": "dev-master"
}
}```

Then run php composer.phar update.

# **Usage**#

Make a declaration like the following in your class to access the API

```php
use moosend\MoosendApi;
require_once __DIR__ . '/vendor/autoload.php';

$moosendApi = new MoosendApi('YOUR_API_KEY');
```

# **Examples** #

Wrapper Examples

Subscribers

- Subscribe a subscriber to your mailing list

```php
$mailingListID = 'YOUR_MAILING_LIST_ID';

$info = new SubscriberParams();
$info->name = 'John Doe';
$info->email = 'john.doe@some-domain.com';
$info->customFields = array("Age=30", "Country=GREECE"); 

try {
$subscriber = $moosendApi->subscribers->addSubscriber($mailingListID, $info);
echo "ID: {$subscriber->getID()}, Name: {$subscriber->getName()}, Email: {$subscriber->getEmail()}";
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```


- Unsubscribe a subscriber from a mailing list

```php
$mailingListID = 'YOUR_MAILING_LIST_ID';
$campaignID = 'YOUR_CAMPAIGN_ID';
$subscriberEmail = "john.doe@some-domain.com";

try {
$moosendApi->subscribers->unsubscribe($subscriberEmail, $campaignID, $mailingListID);
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}

```


Lists

- Get all mailing lists in your account


```php
$page = 1;
$pageSize = 10;

try {
$mailingLists = $moosendApi->mailingLists->getActiveMailingLists($page, $pageSize);

foreach ($mailingList as $list) {
$name = $list->getName();
echo "Name: {$name} </br>";
}	
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```

- Get all subscribers from a mailing list

```php
$mailingListID = 'YOUR_MAILING_LIST_ID';
$since = new DateTime('2014-01-15');

try {
$subscribers = $moosendApi->mailingLists->getSubscribers($mailingListID, 'Subscribed',  $since);
foreach ($subscribers as $subscriber) {
echo "Name:  {$subscriber->getName()} - Email:  {$subscriber->getEmail()}  </br>";
}
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```

- Create a mailing list

```php
$name = 'Some new test list'; 

try {
$mailingListID = $moosendApi->mailingLists->create($name);
echo "Created new mailing list with ID: {$mailingListID}";
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```


- Get a single subscriber from a mailing list

```php
$mailingListID = 'YOUR_MAILING_LIST_ID';
$subscriberEmail = 'john.doe@some-domain.com';

try {
$subscriber = $moosendApi->subscribers->getSubscriberByEmail($mailingListID, $subscriberEmail);
echo "ID: {$subscriber->getID()} Name: {$subscriber->getName()} Email: {$subscriber->getEmail()}";
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```


Campaigns

- Create a new draft campaign (Nothing will be sent to any of your recipients)


```php
$info = new CampaignParams();
$info->Name = 'Some campaign';
$info->Subject = 'Some Subject';
$info->SenderEmail = 'YOUR_SENDER_SIGNATURE_EMAIL_ADDRESS';
$info->MailingListID = 'YOUR_MAILING_LIST_ID';
$info->ConfirmationToEmail = 'SOME_CONFIRMATION_EMAIL_ADDRESS';
$info->WebLocation = 'THE_WEB_LOCATION_OF_YOUR_CAMPAIGN';

try {
$draftCampaignID = $moosendApi->campaigns->createDraft($info);
echo "Created new campaign with ID: {$draftCampaignID}";
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```


- Send a set of test emails of a given campaign

```php
$campaignID = 'YOUR_CAMPAIGN_ID';
$emails = array('someone@example.com", "somebody@other.com');

try {
$moosendApi->campaigns->sendCampaignTest($campaignID, $emails);
echo 'Send test completed successfully';
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```


- Send the given campaign to all active subscribers in the linked mailing list

```php
$campaignID = 'YOUR_CAMPAIGN_ID';

try {
$moosendApi->campaigns->send('$campaignID');
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```

- Get a summary of statistics for the given campaign (assuming you have sent the campaign already). For more detailed statistics look at the other methods in the moosend\Wrappers\CampaignsWrapper class (e.g. getCampaign, getActivityByLocation, getLinkActivity)

```php
$campaignID = 'YOUR_CAMPAIGN_ID';

try {
$summary = $moosendApi->campaigns->getCampaignSummary($campaignID);
echo "Total Opens: {$summary->getTotalOpens()}, Total Clicks: {$summary->getTotalLinkClicks()}, Total Bounces: {$summary->getTotalBounces()}";
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```

Segments

- Create a new Segment


```php
$mailingListID = 'YOUR_MAILING_LIST_ID';
$name = 'new segment';

try {
$segmentID = $moosendApiGiannis->segments->create($mailingListID, $name);
echo "Created new Segment with ID: {$segmentID}";
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```

- Get mailing list's segments

```php
$mailingListID = 'YOUR_MAILING_LIST_ID';

try {
$segments = $moosendApi->segments->getSegments($mailingListID);
foreach ($segments as $segment) {
echo "ID: {$segment->getID()}, Name: {$segment->getName()} </br>";
}	
} catch (moosend\ApiException $e) {
echo "Error: {$e->getMessage()}";
}
```
