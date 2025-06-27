<?php

define('HOST', 'localhost');
define('USER_NAME', 'root');
define('USER_PASS', '');
define('DB_NAME', 'zadanie1');

$conn = mysqli_connect(HOST, USER_NAME, USER_PASS, DB_NAME);
if (!$conn) {
    echo '<p>Failed to connect to database </p>';
}

?>