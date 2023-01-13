<?php
require_once('functions.php');
require_once('db_connection.php');
session_status_start();

if (isset($_POST['login'])) {
    $email = $connection->real_escape_string($_POST['email']);
    $password = escap_string($_POST['password']);
    $auth = login($email, $password);

    if (!$auth) {
        $_SESSION['message'] = 'Invalid email or password';
        redirect_to('../resources/loginUser.php');
    } else {
        $_SESSION['user'] = $auth;
        $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['user'] . "'";
        $row = fetch_arrays($sql);
        if ($row['role'] == 'user') {
            redirect_to('../resources/dashboard.php');
        } else {
            redirect_to('../resources/support.php');
        }
    }
} else {
    $_SESSION['message'] = "You need to login first.";
    redirect_to('../resources/loginUser.php');
}