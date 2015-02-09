<?php
namespace tests;

require_once __DIR__.'/../src/moosend/StubHttpClient.php';

use moosend\HttpClient;
use moosend\StubHttpClient;

class HttpClientTest extends \PHPUnit_Framework_TestCase {
	const 	C_MOOSEND_API_ENDPOINT = 'http://api.moosend.com/v2';
	
	private $_httpClient;
	
	public function setUp() {
		$this->_httpClient = new HttpClient();
	}
	
	public function tearDown() {
		$this->_httpClient = null;
	}
	
	/**
	 * Test HttpClient constructor.
	 * @covers moosend\HttpClient::__construct
	 * @group HttpClientTest
	 */
	public function test_Can_Create_HttpClient_Instance() {
		$httpClient = new HttpClient();
		$this->assertInstanceOf( 'moosend\HttpClient', $httpClient);
	}
	
	/**
	 * Test build URL with GET request / no parameters.
	 * @covers moosend\HttpClient::setUrl
	 * @group HttpClientTest
	 */
	public function test_Can_Build_Valid_Url_For_GET_Request_When_No_Parameters_Are_Provided() {
		$httpClient = new StubHttpClient();
		$httpClient->setApiKey('myApiKey');
		$expectedUrl= self::C_MOOSEND_API_ENDPOINT . '/campaigns/myCampaignID/view.json?apikey=myApiKey';
		$this->assertEquals($expectedUrl, $httpClient->setUrl(self::C_MOOSEND_API_ENDPOINT . '/campaigns/myCampaignID/view.json')->getUrl());
	}
	
	/**
	 * Test build URL with GET request / and parameters.
	 * @covers moosend\HttpClient::setUrl
	 * @group HttpClientTest
	 */
	public function test_Can_Build_Valid_Url_With_Query_When_Parameters_Are_Provided() {
		$httpClient = new StubHttpClient();
		$httpClient->setApiKey('myApiKey')->setParams(array('foo' => 'bar'));
		$expectedUrl= self::C_MOOSEND_API_ENDPOINT . '/campaigns/myCampaignID/view.json?apikey=myApiKey&foo=bar';
		$this->assertEquals($expectedUrl, $httpClient->setUrl(self::C_MOOSEND_API_ENDPOINT . '/campaigns/myCampaignID/view.json')->getUrl());
	}
	
	 /**
     * Test unsuccesfull request error.
     * @covers moosend\HttpClient::getResponse
     * @group HttpClientTest
     * @expectedException \Exception
     */
    public function test_Throws_Exception_When_Status_Code_Is_Not_200() {
    	$httpClient = new StubHttpClient();
    	$httpClient->setStatusCode(400)->setBody('{"foo": "bar"}');
    	$httpClient->setUrl('http://moosend.com')->makeRequest()->getResponse();
    }
    
    /**
     * Test Api error response.
     * @covers moosend\HttpClient::getResponse
     * @group HttpClientTest
     * @expectedException \moosend\ApiException
     */
    public function test_Throws_ApiException_When_Api_Response_Code_Is_Not_0() {
    	$httpClient = new StubHttpClient();
    	$httpClient->setStatusCode(200)->setBody('{"Code":501, "Error":"VALIDATION_ERROR", "Context":null}');
    	$httpClient->setUrl('http://moosend.com')->makeRequest()->getResponse();
    }
    
    /**
     * Test getting json response.
     * @covers moosend\HttpClient::getResponse
     * @group HttpClientTest
     */
    public function test_Should_Return_JSON_Context_From_Response_Object_When_Request_Is_Successful() {
    	$httpClient = new StubHttpClient();
    	$httpClient->setStatusCode(200)
    	->setBody('{"Code":0, "Error":null, "Context":{
    																											"ID": 123,
    	    																									 "Name": "John"
    																												}}');
    	$httpClient->setUrl('http://moosend.com')->makeRequest();
    	$this->assertEquals($httpClient->getResponse(), array('ID' => 123, 'Name' => 'John'));
    }
}