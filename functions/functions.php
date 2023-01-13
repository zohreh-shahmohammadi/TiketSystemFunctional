<?php
function  redirect_to($location)
{
    header('Location: ' . $location);
    exit;
}

function escap_string($value)
{
    global $connection;
    return $connection->real_escape_string($value);
}

function fetch_arrays($sql)
{
    global $connection;
    $query = $connection->query($sql);
    $row = $query->fetch_array();
    return $row;
}
function session_status_start()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}
function users_check()
{
    $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['user'] . "'";
    $result = fetch_arrays($sql);
    return $result;
}
function register($name, $email, $password_hashing, $role)
{
    global $connection;
    $salt = "dwt^&5wdg$%@";
    $password_hashing = md5($salt);
    $query = "INSERT INTO users ( ";
    $query .= "name,email,password,role";
    $query .= ") VALUES (";
    $query .= "'{$name}', '{$email}', '{$password_hashing}','{$role}'";
    $query .= ")";
    $result = $connection->query($query);
    return $result;
}
function login($email, $password_hashing)
{
    global $connection;
    $salt = "dwt^&5wdg$%@";
    $password_hashing = md5($salt);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password_hashing'";
    $query = $connection->query($query);
    if ($query->num_rows > 0) {
        $row = $query->fetch_array();
        return $row['id'];
    } else {
        return false;
    }
}

function newTiket($user_id, $user_name, $title, $text)
{
    global $connection;
    $query = "INSERT INTO tikets(";
    $query .= "user_id,user_name,title,text";
    $query .= ") VALUES (";
    $query .= "'{$user_id}','{$user_name}','{$title}','{$text}'";
    $query .= ")";
    $result = $connection->query($query);
    return $result;
}

function showTiket()
{
    global $connection;
    $query = "SELECT * FROM tikets";
    $result = $connection->query($query);
    return $result;
}
function ShowTiketByUser()
{
    global $connection;
    $row = users_check();
    $user_id = $row['id'];

    $query = "SELECT * FROM tikets WHERE user_id = {$user_id}";
    $result = $connection->query($query);
    return  $result;
}
function showTiketById($id)
{
    $query = "SELECT * FROM tikets WHERE id = {$id}";
    $result = fetch_arrays($query);
    return  $result;
}
function updateTiketSatus($id)
{
    global $connection;
    $query = "UPDATE tikets SET status ='Answered'";
    $query .= "WHERE id='{$id}'";
    $result = $connection->query($query);
    return $result;
}
function newAnswers($user_id, $user_name, $tiket_id, $support_name, $title, $text)
{
    global $connection;
    $query = "INSERT INTO answers (";
    $query .= "user_id,user_name,tiket_id,support_name,title,text";
    $query .= " ) VALUES ( ";
    $query .= "'{$user_id}','{$user_name}','{$tiket_id}','{$support_name}','{$title}','{$text}'";
    $query .= ")";
    $result = $connection->query($query);
    return $result;
}

function showAnswer($tiket_id)
{
    global $connection;
    $query = "SELECT * FROM answers WHERE tiket_id = '{$tiket_id}'";
    $result = $connection->query($query);
    return $result;
}