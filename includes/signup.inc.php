<?php

if(isset($_POST["submit"]))
{

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdConfirm = $_POST["pwdconfirm"];
    $email = $_POST["email"];

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/singup-controller.classes.php";
    $signup = new SignupController($uid, $pwd, $pwdConfirm, $email);

    $signup->signupUser();

    header("Location: ../index.php?error=none");
}

?>