<?php
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["user_pseudo"]);
unset($_SESSION["logged_in"]);
header("Location:/minichat/index.php");
