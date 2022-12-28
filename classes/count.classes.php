<?php

Class Count {

    public function counterVisit(){
        $counter_file = "../visit.txt"; 
        if(!file_exists($counter_file)){ 
        $f = fopen($counter_file, "w"); 
        fwrite($f,"0"); 
        fclose($f); 
        } 
        $f = fopen($counter_file, "r"); 
        $visit = fread($f, filesize($counter_file)); 
        fclose($f); 
        if(!isset($_SESSION['visitedBefore'])){ 
        $_SESSION['visitedBefore'] = TRUE; 
        $visit++; 
        $f = fopen($counter_file, "w"); 
        fwrite($f, $visit); 
        fclose($f); 
        } 
    }
    
    public function allVisit() {
        $myfile = fopen("../visit.txt", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("../visit.txt"));
    }
    
    public function allMoney() {
        $myfile = fopen("../przychod.txt", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("../przychod.txt"));
    }
}