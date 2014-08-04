<?php
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Include Zend Framework
	require_once 'phar://../library/Zend.phar';

$api = '407e09cd';
defined('API_KEY') || define('API_KEY', $api);

if(APPLICATION_ENV == 'local'){
    $_SERVER['HTTP_GEORACLEHRID'] = '502151344';
}
	
// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    realpath(APPLICATION_PATH . '/models'),
    get_include_path(),
)));
/** Zend_Application */
require_once 'Zend/Application.php';
// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
 
if ('/' !== $_SERVER['REQUEST_URI']) {
/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();
			exit;
}
echo '
<!doctype html>
<html ng-app="phonecatApp">
<head>
<meta charset="utf-8">
<title>Textilera</title>
<!-- prefix free to deal with vendor prefixes -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="lib/angular/angular.js"></script>

<script src="js/controllers.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular-sanitize.js"></script>
</head>
<body ng-controller="ContentDCCCtrl">
  <div class="content" ng-bind-html="contentMenuSelected">
  
  </div>     
</body>
</html>

';

