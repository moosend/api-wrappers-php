<?php
namespace moosend\Actions\UpdateMailingList;

class UpdateMailingListRequest {
	public $Name;
	public $ConfirmationPage;
	public $RedirectAfterUnsubscribePage;

	public function __construct($name, $confirmationPage, $redirectAfterUnsubscribePage) {
		$this->Name = $name;
		$this->ConfirmationPage = $confirmationPage;
		$this->RedirectAfterUnsubscribePage = $redirectAfterUnsubscribePage;
	}
}