<?php
namespace moosend\Actions\CreateMailingList;

class CreateMailingListRequest {
	public $Name;
	public $ConfirmationPage;
	public $RedirectAfterUnsubscribePage;

	public function __construct($name, $confirmationPage, $redirectAfterUnsubscribePage) {
		$this->Name = $name;
		$this->ConfirmationPage = $confirmationPage;
		$this->RedirectAfterUnsubscribePage = $redirectAfterUnsubscribePage;
	}
}