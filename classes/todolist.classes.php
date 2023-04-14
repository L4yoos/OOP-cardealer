<?php

class Todolist extends Dbh {

    public function todoCount() {
        $todos = $this->connect()->prepare("SELECT * FROM todos ORDER BY id DESC");
        $todos->execute();

        $todos->rowCount();

        return $todos;
    }

    public function todoAdd() {
        if(isset($_POST['title'])){
        
            $title = $_POST['title'];
        
            if(empty($title)){
                header("Location: ../adminpanel/list.php?mess=error");
            } else {
                $stmt = $this->connect()->prepare("INSERT INTO todos(title) VALUE(?)");
                $stmt->bindParam(1, $title);
                $res = $stmt->execute();
        
                if($res){
                    header("Location: ../adminpanel/list.php?mess=success");
                } else {
                    header("Location: ../adminpanel/list.php");
                }
                $conn = null;
                exit();
            }
        }else {
            header("Location: ../adminpanel/list.php?mess=error");
        }
    }

    public function todoCheck() {
        if(isset($_POST['id'])){
        
            $id = $_POST['id'];
        
            if(empty($id)){
                echo 'error';
            } else {
                $todos = $this->connect()->prepare("SELECT id, checked FROM todos WHERE id=?");
                $todos->bindParam(1, $id);
                $todos->execute();
        
                $todo = $todos->fetch();
                $uID = $todo['id'];
                $checked = $todo['checked'];
        
                $uChecked = $checked ? 0 : 1; 
        
                $res = $this->connect()->prepare("UPDATE todos SET checked=? WHERE id=?");
                $res->bindParam(1, $uChecked);
                $res->bindParam(2, $uID);
                $res->execute();
                
                if($res){
                    echo $checked;
                } else {
                    echo "error";
                }
                $conn = null;
                exit();
            }
        }else {
            header("Location: ../adminpanel/list.php?mess=error");
        }
    }

    public function todoRemove() {
        if(isset($_POST['id'])){
        
            $id = $_POST['id'];
        
            if(empty($id)){
                echo 0;
            } else {
                $stmt = $this->connect()->prepare("DELETE FROM todos WHERE id=?");
                $stmt->bindParam(1, $id);
                $res = $stmt->execute();
        
                if($res){
                    echo 1;
                } else {
                    echo 0;
                }
                $conn = null;
                exit();
            }
        }else {
            header("Location: ../adminpanel/list.php?mess=error");
        }
    }

}