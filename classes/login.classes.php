<?php

class Login extends Dbh {

    protected function getUser($uid, $pwd) {
        session_start();
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');
        $stmt->bindParam(1, $uid);
        $stmt->bindParam(2, $uid);

        if(!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0 ) {
            $stmt = null;
            $_SESSION["usernotfound"] = true;
            header("Location: ../login.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(sha1($pwd) == $pwdHashed[0]["users_pwd"])
        {
            $checkPwd = true;
        }
        else {
            $checkPwd = false;
        }

        if($checkPwd == false) {
            $stmt = null;
            $_SESSION["wrongpassword"] = true;
            header("Location: ../login.php?error=usernotfound");
            exit();
        }
        elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');
            $stmt->bindParam(1,$uid);
            $stmt->bindParam(2,$uid);
            $stmt->bindParam(3,$pwd);

            if(!$stmt->execute()) {
                $stmt = null;
                header("Location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0 ) {
                $stmt = null;
                $_SESSION["usernotfound"] = true;
                header("Location: ../login.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
            $_SESSION["is_admin"] = $user[0]["users_is_admin"];
            $_SESSION["loggedin"] = true;

        }

        $stmt = null;
    }

}