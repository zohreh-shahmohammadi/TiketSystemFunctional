<?php
require_once('../functions/functions.php');
require_once('../functions/db_connection.php');
session_status_start();
if (!isset($_SESSION['user'])) {
    header('location:loginUser.php');
}
$rows = users_check();
?>
<h1 class="page-header text-center">you are User </h1>
<div>
    <?php
    if ($rows['role'] == 'user') {
        echo '<a href="TiketForm.php">New Tiket</a>';
        echo '<br>';
        echo '<a href="ShowTiketUser.php">Show Tiket User</a>';
        echo '   <h2 style="color:green">You are User </h2>';
    } else {
        header('Location: support.php');
    }
    ?>
</div>
<a href="../functions/logout.php">Logout</a>