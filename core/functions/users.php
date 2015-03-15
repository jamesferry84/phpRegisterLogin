<?php
function user_exists($username) {
    $username = sanitize($username);
    echo $username;
    $query = mysql_query("SELECT COUNT('user_id') FROM 'users' WHERE 'username' = '$username'");
    if (mysql_result($query,0) == 0)
    {
        echo "no results returned";
    }
    else
    {
        echo "results returned";
    }
    return (mysql_result($query,0) == 1) ? true : false;
}

function user_active($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT('user_id') FROM 'users' WHERE 'username' AND 'active' = 1 = '$username'");
    return (mysql_result($query,0) == 1) ? true : false;
}
?>