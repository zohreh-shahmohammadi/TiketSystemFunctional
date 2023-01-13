<?php
require_once("../functions/functions.php");
require_once('../functions/db_connection.php');
session_status_start();
if (!isset($_SESSION['user'])) {
    header('location:loginUser.php');
}
$rows = users_check();
if ($rows['role'] == 'user') {
    header('Location: dashboard.php');
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
        <h3>Yours Answers </h3>

        <h3>Answer for User::</h3>
        <?php
        foreach ($show_answer as $answer) {
            echo $answer['user_name'] . "<br /><br />";
            echo $answer['title'] . "<br /><br />";
            echo $answer['text'] . "<br /><br />";
            echo '<hr>';
            echo '<br>';
        }
        ?>
        <hr>
        <div>
            <form method="POST" action="../functions/createAnswer.php?myid=<?php echo $id; ?>">
                <fieldset>
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Title" required />
                    </div>
                    <div class="form-group">
                        <textarea name="text" type="text" placeholder="Answer" required></textarea>
                    </div>
                    <button type="submit" name="answer">save</button>
                </fieldset>
            </form>
        </div>
    </div>
    <?php
    if (isset($_SESSION['messageNewAnswer'])) {
    ?>
    <div>
        <?php echo $_SESSION['messageNewAnswer']; ?>
    </div>
    <?php
        unset($_SESSION['messageNewAnswer']);
    }
    ?>
</body>

</html>