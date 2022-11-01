<?php

Class Ajax extends Dbh {

    public function deleteUser(){
        
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            
            if(empty($id)){
                echo 0;
            } else {
                $stmt = $this->connect()->prepare("DELETE FROM users WHERE users_id=?");
                $res = $stmt->execute([$id]);
            
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
}