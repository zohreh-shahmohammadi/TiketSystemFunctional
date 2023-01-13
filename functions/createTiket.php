<?php
require_once('functions.php');
require_once('../functions/db_connection.php');
session_status_start();
$row = users_check();

if (isset($_POST['tiket'])) {
    $user_id = $_SESSION['user_id'] = $row['id'];
    $user_name = $_SESSION['user_name'] = $row['name'];
    $title = escap_string($_POST['title']);
    $text = escap_string($_POST['text']);
    $query = newTiket($user_id, $user_name, $title, $text);
    if (!$query) {
        $_SESSION['messageTiket'] = 'Create Tiket is not sucessfuly';
        redirect_to('../resources/TiketForm.php');
    } else {
        $_SESSION['messageTiket'] = 'Create Tiket is sucessfuly';
        redirect_to('../resources/TiketForm.php');
    }
}