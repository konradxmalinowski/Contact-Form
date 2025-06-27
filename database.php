<?php

define('HOST', 'mysql.ct8.pl');
define('USER_NAME', 'm42958_admin');
define('USER_PASS', 'Adminadminadmin123');
define('DB_NAME', 'm42958_zadanie1');

$conn = mysqli_connect(HOST, USER_NAME, USER_PASS, DB_NAME);
if (!$conn) {
    echo '<p>Failed to connect to database </p>';
}

?>