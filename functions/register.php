<?php
require_once('functions.php');
require_once('db_connection.php');

$name = $connection->real_escape_string($_POST['name']);
$email = escap_string($_POST['email']);
$password = escap_string($_POST['password']);
$role = escap_string($_POST['role']);
$register = register($name, $email, $password, $role);
echo "('Registration Successful')";