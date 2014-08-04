<?php
class AUTH_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
		
		$domain = null;		
		if (in_array(APPLICATION_ENV, array('uat', 'local', 'development'))){		 					
			$domain='https://Domain.to.UAT.com';
		}elseif(APPLICATION_ENV == 'production'){
			$domain='https://Domain.to.PRod.com';
		}	
		//print_r($_SERVER);		
		$this->_response->setHeader('Access-Control-Allow-Origin', $domain);	
		//$this->_response->setHeader('Access-Control-Allow-Origin', $domain2);	
        $this->_response->setHeader('Access-Control-Allow-Headers', 'Authorization, X-Authorization, Origin, Accept, Content-Type, X-Requested-With, X-HTTP-Method-Override, x-api-key');
        $this->_response->setHeader('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
		
		if ($_SERVER['REQUEST_METHOD'] != 'OPTIONS' ){   
	    $controller = $request->getControllerName();
        $action = $request->getActionName();
			
		if( ($controller == 'index' && $action != 'index') || ($controller == 'store' && $action != 'dashboard-voucher')) {
		    $this->_response->setHeader('Content-type', 'application/javascript');
			if (isset($_SERVER['HTTP_X_API_KEY']))
				$api_key = $_SERVER['HTTP_X_API_KEY'];		
			else
				$api_key = 'None provided';		
			if (API_KEY != $api_key && 'local' !== APPLICATION_ENV) {
                $this->getResponse()
                        ->setHttpResponseCode(403)
                        ->setHeader('Content-Type', 'text/plain');
                $request->setControllerName('index')
                        ->setActionName('api')
                        ->setParam('api_key', $api_key)
                        ->setDispatched(true);
            }
        }
     }
	 
	}

}


