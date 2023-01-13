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
?>
<form method="POST" action="../functions/createTiket.php">
    <fieldset>
        <div class="form-group">
            <input type="text" name="title" placeholder="Title" required />
        </div>
        <div class="form-group">
            <textarea name="text" type="text" placeholder="Tiket" required></textarea>
        </div>

        <button type="submit" name="tiket">save</button>
    </fieldset>
</form>
<div>
    <?php
    if (isset($_SESSION['messageTiket'])) {
    ?>
    <div>
        <?php echo $_SESSION['messageTiket']; ?>
    </div>
    <?php
        unset($_SESSION['messageTiket']);
    }
    ?>
</div>