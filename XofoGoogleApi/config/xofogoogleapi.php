<?php

// $config['gapi_path'] = '';
// $config['service'] = '';
// $config['client_id'] = '';
// $config['secret'] = '';
// $config['redirect_uri'] = '';
// $config['scopes'] = '';

// Unit Test
$config['gapi_path'] = $_SERVER['DOCUMENT_ROOT'].'/trackingPerformance/application/libraries/XofoGoogleApi/';
$config['service'] = 'Analytics';
$config['client_id'] = '968045279750-69imr1a4h944cr3312ht1netcrfh9eaa.apps.googleusercontent.com';
$config['secret'] = 'n8wcZWaG2lNhgB38P1PG-Oq7';
$config['redirect_uri'] = 'http://apps.clicker360.com/trackingPerformance/index.php/login';
$config['scopes'] = array('https://www.googleapis.com/auth/analytics.readonly','https://www.googleapis.com/auth/analytics');