<?php

class SignupController extends Signup {

    private $uid;
    private $pwd;
    private $pwdConfirm;
    private $email;

    public function __construct($uid, $pwd, $pwdConfirm, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdConfirm = $pwdConfirm;
        $this->email = $email;
    }

    public function signupUser() {
        session_start();
        if($this->emptyInput() == false) {
            $_SESSION["emptyinput"] = true;
            header("Location: ../signup.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false) {
            $_SESSION["invalidUid"] = true;
            header("Location: ../signup.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            $_SESSION["invalidEmail"] = true;
            header("Location: ../signup.php?error=email");
            exit();
        }
        if($this->pwdMatch() == false) {
            $_SESSION["pwdMatch"] = true;
            header("Location: ../signup.php?error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false) {
            $_SESSION["uidTakenCheck"] = true;
            header("Location: ../signup.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput() {
        $result;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdConfirm) || empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() {
        $result;
        if($this->pwd !== $this->pwdConfirm)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck() {
        $result;
        if(!$this->checkUser($this->uid, $this->email))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

}