<?php
include 'core/init.php';

if (empty($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (user_exists($username) === false) {
        $errors[] = 'we cant find that user, have you registered?';
    }
    else if (user_active($username) === false) {
        $errors[] = 'Account is not activated';
    }
    else {

    }

    print_r($errors);
}

?>