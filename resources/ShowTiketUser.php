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

$query = ShowTiketByUser();
?>
<h1 class="page-header text-center">Lsit Of Tiket</h1>
<div>
    <h2 style="color:orange">list Of Tikets </h2>
    <h4>Tiket Info: </h4>
    <div>
        <?php
        foreach ($query as $tikets) {
            echo $tikets['user_name'] . "<br /><br/>";
            echo $tikets['title'] . "<br /><br />";
            echo $tikets['text'] . "<br /><br />";
            $id = $tikets['id'];
        ?>
        <?php
            if ($tikets['status'] == 'pending') {
                echo '<h2 style="color:red">';
                echo $tikets['status'] . "<br /><br />";
                echo   '</h2>';
            } else {
                echo '<h2 style="color:green">';
                echo $tikets['status'] . "<br /><br />";
                echo   '</h2>';
            ?>
        <strong> <a href="showAnswersUser.php?myid=<?php echo $id ?> ">Show Answers</a></strong>
        <?php
            }
            ?>
        <?php
        }
        ?>
    </div>
</div>