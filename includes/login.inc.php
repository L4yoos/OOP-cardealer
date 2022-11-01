<?php

if(isset($_POST["submit"]))
{

    session_start();

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-controller.classes.php";
    $login = new LoginController($uid, $pwd);

    $login->loginUser();
    if($_SESSION["is_admin"] == 1) {
        header("Location: ../adminpanel/index.php");
    }
    else {
        header("Location: ../index.php?error=none");
    }
}

?>