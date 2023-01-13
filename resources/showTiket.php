<?php
require_once('../functions/functions.php');
require_once('../functions/db_connection.php');
session_status_start();
if (!isset($_SESSION['user'])) {
    header('location:loginUser.php');
}
$rows = users_check();
if ($rows['role'] == 'user') {
    header('Location: dashboard.php');
}

$tiket = showTiket();
?>
<div>
    <h2 style="color:orange">list Of Tikets </h2>
    <h4>Tiket Info: </h4>
    <div>
        <?php
        foreach ($tiket  as $tikets) {
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
            }
            ?>
        <strong> <a href="PageAnswer.php?myid=<?php echo $id; ?>">New Answer</a></strong><br /><br />
        <hr>
        <?php
        }
        ?>
    </div>
</div>