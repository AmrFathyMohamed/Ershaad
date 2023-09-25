<?php

// require_once './vendor/autoload.php';

// // init configuration
// $clientID = '243523636081-fr07lu284c9s9n0m1sqihll9mrqed2t5.apps.googleusercontent.com';
// $clientSecret = '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';
// $redirectUri = 'http://localhost/Ershaad/index.php';

// // create Client Request to access Google API
// $client = new Google_Client();
// $client->setClientId($clientID);
// $client->setClientSecret($clientSecret);
// $client->setRedirectUri($redirectUri);
// $client->addScope("email");
// $client->addScope("profile");
// $client->setApplicationName('Ershad');
// $client->setAccessType("offline"); // for obtaining refresh tokens
// $client->setApprovalPrompt('force'); // to force re-authentication
// $client->setIncludeGrantedScopes(true); // optional
// $client->setPrompt('consent'); // optional

// if (isset($_GET['code'])) {
//     // Exchange the authorization code for an access token.
//     $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//     print_r($token);
//     $client->setAccessToken($token['access_token']);

//     // Get the user's profile information.
//     $google_oauth = new Google_Service_Oauth2($client);
//     $google_account_info = $google_oauth->userinfo->get();

//     // Get the user's email address and name.
//     $email = $google_account_info['email'];
//     $name = $google_account_info['name'];

//     // Print the user's profile information.
//     $_SESSION['user_id'] = $google_account_info['id'];
//     $_SESSION['username'] = $google_account_info['name'];
//     $_SESSION['fullname'] = $google_account_info['name'];
//     $_SESSION['type'] = 'client';
    

//     // Now you can use this profile information to create an account in your website and make the user logged in.
// }
?>