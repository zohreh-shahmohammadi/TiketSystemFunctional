<?php

require_once('../functions/functions.php');
require_once('../functions/db_connection.php');

session_status_start();
if (!isset($_SESSION['user'])) {
    header('location:loginUser.php');
}

$rows = users_check();
if ($rows['role'] == 'support') {
    header('Location: support.php');
}

$tiket_by_id = showTiketById($_GET["myid"]);

$show_answer = showAnswer($_GET["myid"]);
?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP Tiket </title>
</head>

<body>
    <h1 class="page-header text-center">Lsit Of Tiket</h1>
    <div>
        <h2 style="color:orange">list Of Tikets </h2>
        <h4>Tiket Info: </h4>
        <?php
        echo $tiket_by_id['user_name'] . "<br /><br />";
        echo $tiket_by_id['title'] . "<br /><br />";
        echo $tiket_by_id['text'] . "<br /><br />";
        if ($tiket_by_id['status'] == 'Answered') {
            echo '<h3 style="color:green">Answered</h5>';
        } else {
            echo '<h3 style="color:red">Pending</h5>';
        }
        $id = $tiket_by_id['id'];
        echo '<hr>';
        echo '<br>';
        ?>
        <h2 style="color:blue">list Of Answers </h2>
        <h3>Yours Answers </h3>

        <h3>Answer for User::</h3>
        <?php
        foreach ($show_answer as $answer) {
            echo $answer['user_name'] . "<br /><br />";
            echo $answer['support_name'] . "<br /><br />";
            echo $answer['title'] . "<br /><br />";
            echo $answer['text'] . "<br /><br />";
            echo '<hr>';
            echo '<br>';
        }
        ?>
        <hr>
    </div>

</body>

</html>