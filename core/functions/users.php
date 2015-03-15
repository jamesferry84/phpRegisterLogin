<?php

function logged_in() {
    return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username) {
    $username = sanitize($username);

    $query = sprintf("SELECT COUNT(user_id) FROM users WHERE username = '%s'", $username);
    $result = mysql_query($query);
    return (mysql_result($result,0) == 1) ? true : false;
}

function user_active($username) {
    $username = sanitize($username);

    $query = sprintf("SELECT COUNT(user_id) FROM users WHERE username = '%s' AND active = 1", $username);
    $result = mysql_query($query);
    return (mysql_result($result,0) == 1) ? true : false;
}

function user_id_from_username($username) {
    $username = sanitize($username);
    $query = sprintf("SELECT user_id from users where username = '%s'", $username);
    $result = mysql_query($query);
    return mysql_result($result, 0, 'user_id');
}

function login($username, $password) {
    $user_id = user_id_from_username($username);
    $username = sanitize($username);
    $password = md5($password);

    $query = sprintf("SELECT COUNT(user_id) FROM users WHERE username = '%s' AND password = '%s'", $username, $password);
    $result = mysql_query($query);

    return (mysql_result($result,0) == 1) ? $user_id : false;
}

?>