<?php

function user_exists($username) {
    $username = sanitize($username);

    $query = sprintf("SELECT COUNT(user_id) FROM users WHERE username = '%s'", $username);
    $result = mysql_query($query);

//    if (!$result) {
//        $message = 'invalid query: ' . mysql_error() . "\n";
//        $message .= 'whole query: ' . $result;
//        die($message);
//    }

    if (mysql_result($result,0) == 0)
    {
        echo "no results returned";
    }
    else
    {
        echo "results returned";
    }
    return (mysql_result($result,0) == 1) ? true : false;
}

function user_active($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT('user_id') FROM 'users' WHERE 'username' AND 'active' = 1 = '$username'");
    return (mysql_result($query,0) == 1) ? true : false;
}
?>