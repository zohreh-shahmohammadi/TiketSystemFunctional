<?php
require_once('functions.php');
session_status_start();
unset($_SESSION["user"]);
redirect_to("../resources/loginUser.php");