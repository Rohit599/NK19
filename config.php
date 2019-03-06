<?php
/*
 * Basic Site Settings and API Configuration
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'anant');
define('DB_PASSWORD', 'account60');
define('DB_NAME', 'ncs_game');
define('DB_USER_TBL', 'users');

// Google API configuration
define('GOOGLE_CLIENT_ID', '939876606060-pkvadgpo10l8ddoagp0fqdfabntu7eic.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'TqlJzmfMSOyOv5dvGwDbOUeh');
define('GOOGLE_REDIRECT_URL', 'http://localhost/night_knitting/index.php');

// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Night Knitting');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gClient);