<?php
require_once('../functions/functions.php');
require_once('../functions/db_connection.php');
session_status_start();

$tiket_by_id = showTiketById($_GET["myid"]);
$support_name = users_check();

updateTiketSatus($_GET["myid"]);

if (isset($_POST['answer'])) {
    $user_id = $_SESSION['user_id'] = $tiket_by_id['user_id'];
    $user_name = $_SESSION['user_name'] = $tiket_by_id['user_name'];
    $tiket_id = $_SESSION['tiket_id'] = $tiket_by_id['id'];
    $support_name = $_SESSION['support_name'] = $support_name['name'];
    $title = $_POST['title'] = $_POST['title'];
    $text = $_POST['text'] = $_POST['text'];
    $result = newAnswers($user_id, $user_name, $tiket_id, $support_name, $title, $text);
    if ($result) {
        $_SESSION['messageNewAnswer'] = "Create Answer isSuccessfully";
        echo json_encode($result);
    } else {
        $_SESSION['messageNewAnswer'] = "Create Answer is not Successfully";
        echo json_encode($result);
    }
}