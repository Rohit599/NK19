
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Include configuration file
require_once 'config.php';


date_default_timezone_set('Asia/Kolkata');

$current_time=date('Hi');
$lockStart=1000;
$lockEnd=2200;
if($lockStart < $current_time && $current_time < $lockEnd)
{
    include 'lock.php';
    die();
}
?>

<head>
    <title>Night Knitting</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php include 'head.php'; ?>
</head>
<audio volume="0.05" loop autoplay>
  <source src="assets/audio/shinigami.mp3">
</audio>
<?php
// Include User library file
require_once 'User.class.php';

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
}

if(isset($_SESSION['token'])){
    $gClient->setAccessToken($_SESSION['token']);
}

if($gClient->getAccessToken()){
    // Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    // Initialize User class
    $user = new User();
    
    // Getting user profile info
    $gpUserData = array();
    $gpUserData['oauth_uid']  = !empty($gpUserProfile['id'])?$gpUserProfile['id']:'';
    $gpUserData['first_name'] = !empty($gpUserProfile['given_name'])?$gpUserProfile['given_name']:'';
    $gpUserData['last_name']  = !empty($gpUserProfile['family_name'])?$gpUserProfile['family_name']:'';
    $gpUserData['email']      = !empty($gpUserProfile['email'])?$gpUserProfile['email']:'';
    $gpUserData['gender']     = !empty($gpUserProfile['gender'])?$gpUserProfile['gender']:'';
    $gpUserData['locale']     = !empty($gpUserProfile['locale'])?$gpUserProfile['locale']:'';
    $gpUserData['picture']    = !empty($gpUserProfile['picture'])?$gpUserProfile['picture']:'';
    $gpUserData['link']       = !empty($gpUserProfile['link'])?$gpUserProfile['link']:'';
    
    // Insert or update user data to the database
    $gpUserData['oauth_provider'] = 'google';
    // $userData = $user->checkUser($gpUserData);

    $user->checkUser($gpUserData);
    // Storing user data in the session
    
    // Render user profile data
    if(!empty($userData)){
        $_SESSION['user']=$gpUserProfile['email'];
        echo"<script type='text/javascript'>
        window.location.href='home.php';
        </script>";
        // $output  = '<h2>Google Account Details</h2>';
        // $output .= '<div class="ac-data">';
        // $output .= '<img src="'.$userData['picture'].'">';
        // $output .= '<p><b>Google ID:</b> '.$userData['oauth_uid'].'</p>';
        // $output .= '<p><b>Name:</b> '.$userData['first_name'].' '.$userData['last_name'].'</p>';
        // $output .= '<p><b>Email:</b> '.$userData['email'].'</p>';
        // $output .= '<p><b>Gender:</b> '.$userData['gender'].'</p>';
        // $output .= '<p><b>Locale:</b> '.$userData['locale'].'</p>';
        // $output .= '<p><b>Logged in with:</b> Google</p>';
        // $output .= '<p><a href="'.$userData['link'].'" target="_blank">Click to visit Google+</a></p>';
        // $output .= '<p>Logout from <a href="logout.php">Google</a></p>';
        // $output .= '</div>';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
}else{
    // Get login url
    $authUrl = $gClient->createAuthUrl();
    
    // Render google login button
    $output = '<div class="logo">
        <img src="assets/images/nk2-logo.png">
    </div>
    <h1>
        Tread carefully on the path you choose.<br>
        He is waiting for the one who lose.
    </h1>
    <div class="sign">
    
    <a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">Sign up with Google</a>
    </div>';
}
?>

<div class="container">
    <!-- Display login button / Google profile information -->
    <?php echo $output; ?>
</div>