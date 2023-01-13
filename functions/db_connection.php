<?php

define("DB_SERVER", "");
define("DB_USER", "");
define("DB_PASS", "");
define("DB_DATABASE", "");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
if (mysqli_connect_errno()) {
    die("Error connecting to database:" . mysqli_connect_errno() .
        "(" . mysqli_connect_errno() . ")");
}