<?php

/*
 * Initialise view.
 * Since we are using a standard class for the view object,
 * it is good practice to remember to initialise any properties of the view object.

If the login button was pressed,
check the credentials provided and if they are correct,
create a session. If they are not, prepare an error message.
For the moment use a simple if statement to check the username
and password against a fixed username and password in your code.

If the logout button was pressed, delete the session.

If the user is already logged in (or just logged in successfully),
pass the right information to the view in order to print the user's name
and provide a logout button.

If any of the buy buttons were pressed,
pass the necessary information to the view in order to display the
right message to the user.

 */

require_once 'Models/User.php';

$view = new stdClass();
$view->pageTitle = 'Login';

session_start();

//Validate email

//Validate password

if(isset($_POST['login_submit'])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
//        $user = new User();
//        if ($user->checkUserExists(true)){
//            return error_log("incorrect email or password");
//        }
//        else{
            $user->loginUser($email, $password);
            header('location' . URL );
//        }
    }

    // Create Session With User Info

}

require_once('Views/login.phtml');
