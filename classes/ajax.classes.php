<?php

Class Ajax extends Dbh {

    public function deleteUser(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            
            if(empty($id)){
                echo 0;
            } else {
                $stmt = $this->connect()->prepare("DELETE FROM users WHERE users_id=?");
                $stmt->bindParam(1, $id);
                $res = $stmt->execute();
            
                if($res){
                    echo 1;
                } else {
                    echo 0;
                    }
                    $stmt = null;
                    exit();
                }
            }else {
                header("Location: ../adminpanel/index.php?mess=error");
            }
    }
    
    public function editUser() {
        $id = $_POST['modalid'];
        $user = $_POST['username'];
        $email = $_POST['email'];
        $is_admin = $_POST['is_admin'];
        
        if(empty($id)){
            echo 0;
        } else {
            $stmt = $this->connect()->prepare("UPDATE users SET users_uid=?, users_email=?, users_is_admin=? WHERE users_id=?");
            $stmt->bindParam(1, $user);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $is_admin);
            $stmt->bindParam(4, $id);
            $res = $stmt->execute();
        
            if($res){
                header("Location: ../adminpanel/index.php?mess=successedit");
            } else {
                header("Location: ../adminpanel/index.php?mess=error");
            }
            $conn = null;
            exit();
        }
    }

    public function carBuy() {
        $id = $_POST['id'];
        $stmt = $this->connect()->prepare("SELECT cena FROM cars WHERE id=?");
        $stmt->bindParam(1, $id);
        $stmt->execute(); 
        $car = $stmt->fetch();
        $zakup = $car['cena'];
    
        $counter_file = "../przychod.txt"; 
        if(!file_exists($counter_file)){ 
        $f = fopen($counter_file, "w"); 
        fwrite($f,"0"); 
        fclose($f); 
        }
        $f = fopen($counter_file, "r"); 
        $cena = fread($f, filesize($counter_file));
        $cena += $zakup;
        fclose($f);
        $f = fopen($counter_file, "w"); 
        fwrite($f, $cena); 
        fclose($f);

        $stmt = $this->connect()->prepare("SELECT count FROM count");
        $stmt->execute();
        $fetch = $stmt->fetch();
        $ilosc = $fetch['count'];
        $ilosc++;
        $stmt = $this->connect()->prepare("UPDATE count SET count=?");
        $stmt->bindParam(1, $ilosc);
        $stmt->execute();

        if(empty($id)){
            echo 0;
        } else {
            $stmt = $this->connect()->prepare("DELETE FROM cars WHERE id=?");
            $stmt->bindParam(1, $id);
            $res = $stmt->execute();

            if($res != 1){
                header("Location: index.php?mess=error");
            }
            $conn = null;
            exit();
        }
    }
}