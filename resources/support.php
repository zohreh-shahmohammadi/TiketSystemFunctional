<?php
require_once('../functions/functions.php');
require_once('../functions/db_connection.php');
session_status_start();
if (!isset($_SESSION['user'])) {
    header('location:loginUser.php');
}
$rows = users_check();
?>
<h1 class="page-header text-center">you are Admin </h1>
<div>
    <?php
    if ($rows['role'] == 'support') {
        echo '<a href="showTiket.php">ShowTiket</a>';
    } else {
        header('location:dashboard.php');
    }
    ?>

    <h2 style="color: blue;">You are Support </h2>
    <h4>User Info: </h4>
    <p>Name: <?php echo $rows['name']; ?></p>
    <p>Username: <?php echo $rows['email']; ?></p>
    <p>Password: <?php echo $rows['password']; ?></p>
    <p>ROLE: <?php echo $rows['role']; ?></p>
    <a href="../functions/logout.php">Logout</a>
</div>