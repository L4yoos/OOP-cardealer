<?php

class Signup extends Dbh {

    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES(?, ?, ?);');

        // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $stmt->bindParam(1,$uid);
        $stmt->bindParam(2,sha1($pwd));
        $stmt->bindParam(3,$email);
        if(!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        session_start();
        $_SESSION["registered"] = true;
    }

    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
        $stmt->bindParam(1, $uid);
        $stmt->bindParam(2, $email);
        if(!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}