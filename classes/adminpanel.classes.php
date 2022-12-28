<?php

class AdminPanel extends Dbh {

    public function countUsers() {
        $stmt = $this->connect()->prepare("SELECT COUNT(users_id) as 'liczba' FROM USERS;");
        $stmt->execute();

        $countUsers = $stmt->fetch();

        return $countUsers['liczba'];
    }

    public function countCars() {
        $stmt = $this->connect()->prepare("SELECT COUNT(id) as 'liczba' FROM cars;");
        $stmt->execute();

        $cars = $stmt->fetch();
        
        echo $cars["liczba"];
    }

    public function usersAll() {
        $stmt = $this->connect()->prepare("SELECT * FROM USERS ORDER BY users_id ASC;");
        $stmt->execute();

        $user = $stmt->fetchAll();

        return $user;
        
    }
    public function addCar() {
        $marka = $_POST['marka'];
        $model = $_POST['model'];
        $cena = $_POST['cena'];
        $pojemnosc = $_POST['pojemnosc'];
        $paliwo = $_POST['paliwo'];
        $moc = $_POST['moc'];
        $rocznik = $_POST['rocznik'];
        $przebieg = $_POST['przebieg'];
        $description = $_POST["description"];
        $filename = $_POST["file"];

        $pname = $_FILES["file"]["name"];
    
        $tname = $_FILES["file"]["tmp_name"];
    
        $uploads_dir = 'images';

        move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    
        $sql = $this->connect()->prepare("INSERT INTO cars (marka,model,description,cena,pojemnosc,paliwo,moc,rocznik,przebieg,filename) VALUES('$marka', '$model', '$description', '$cena', '$pojemnosc', '$paliwo', '$moc', '$rocznik', '$przebieg', '$pname')");
        $sql->execute();
        
        $conn = null;
        header("Location: ../adminpanel/car.php");
        exit();
}
}