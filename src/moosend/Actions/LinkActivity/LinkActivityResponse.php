<?php
namespace moosend\Actions\LinkActivity;

require_once __DIR__.'/LinkActivityResponse.php';

class LinkActivityResponse  extends \ArrayObject{
public $Paging;
	public $Analytics;
	
	public function __construct(array $jsonData) {
		$this->Paging = \Paging::withJSON($jsonData['Paging']);;
	
		$this->Analytics = array();
		foreach ($jsonData['Analytics'] as $stats) {
			$entry = \AnalyticsDetails::withJSON($stats);
			array_push($this->Analytics, $entry);
		}
	}
}
