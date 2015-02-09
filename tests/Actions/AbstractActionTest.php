// <?php
// namespace tests\Actions\AbstractAction;

// require_once __DIR__.'/ActionTestBase.php';

// use moosend\StubHttpClient;
// use moosend\Models\CallContext;
// use tests\Actions\ActionTestBase;
// use moosend\Models\AbstractAction;
// use moosend\Actions\Send\SendAction;

// class AbstractActionTest extends ActionTestBase {
// 	/**
// 	 * Test if SendAction constructor calls its parent constructor with the right parameters and creates a SendAction object.
// 	 * @group AbstractActionTest
// 	 * @covers moosend\Actions\AbstractAction::__execute
// 	 */
// 	public function test_OOO() {
// 		$stubHttpClient = new StubHttpClient();
// 		$stubHttpClient->setStatusCode(200);	
// 		$stubHttpClient->setBody('{
//     										"Code": 0,
//     										"Error": null,
//     										"Context": { } }');
		
// 		$callContext = new CallContext($stubHttpClient, 'GET', self::C_MOOSEND_API_ENDPOINT, 'some/path', $this->apiKey);
		
// 		$request = array('param1', 'param2');
// 		$action = new SendAction($stubHttpClient, 'endpoint', 'cmapaig', 'apiKey');
		
// 		$action->execute($request);
		
// 		$this->assertEquals('apiKey', $stubHttpClient->getApiKey());
// 	}
// }