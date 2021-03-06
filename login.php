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
        $login = login($username, $password);
        if ($login === false) {
            $errors[] = 'That username/combo is incorrect';
        } else {
            $_SESSION['user_id'] = $login;
            header('Location: index.php');
            exit();
        }
    }
    include 'includes/head.php';
    include 'includes/navbar.php';
    if (empty($errors) === false) {
        ?>
        <h2>Tried to log you in but...</h2>
<?php
        echo output_errors($errors);
    }

}

?>