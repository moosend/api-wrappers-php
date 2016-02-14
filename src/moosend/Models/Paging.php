<?php
class Paging {
		public $PageSize;
        public $CurrentPage;
        public $TotalResults;
        public $TotalPageCount;
        public $SortExpression;
        public $SortIsAscending;
	
        public static function withJSON($jsonData) {
        	$instance = new self();
        
        	if (!is_null($jsonData)) {
        		$instance->PageSize = $jsonData['PageSize'];
        		$instance->CurrentPage= $jsonData['CurrentPage'];
        		$instance->TotalResults = $jsonData['TotalResults'];
        		$instance->TotalPageCount = $jsonData['TotalPageCount'];
        		$instance->SortExpression = $jsonData['SortExpression'];
        		$instance->SortIsAscending = $jsonData['SortIsAscending'];
        	}
        
        	return $instance;
        }
}