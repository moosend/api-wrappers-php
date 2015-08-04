<?php
namespace tests\Models;

require_once __DIR__.'/../../src/moosend/Models/CallContext.php';

use moosend\Models\CallContext;
use moosend\HttpClient;

class CallContextTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test constructor.
	 * @covers moosend\Models\CallContext::__construct
	 * @group CallContextTest
	 */
	public function test_Can_Create_CallContext_Instance() {
		$client = new HttpClient();
		$client->setMethod('GET');
		$callContext = new CallContext($client, $client->getMethod(), 'endpoint', 'path', 'apiKey');
		$this->assertInstanceOf( 'moosend\Models\CallContext', $callContext);
		$client = null;
	}
}