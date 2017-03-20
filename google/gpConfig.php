<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '316682408557-k8sbs1ml963o8rk0pnrkvtk41cm780g6.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'feFSdQzio4RfDaZ82UlDAnDr'; //Google client secret
$redirectURL = 'http://localhost/recipejugaad/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Recipe Jugaad');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>