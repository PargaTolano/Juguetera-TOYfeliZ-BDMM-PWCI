<?php

class Dbh {
    protected function connect(){
        try{
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "TOYfeliZ";

            $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
            return $conn;
        }
        catch (PDOException $error)
        {
            die("Connection failed" . $error->getMessage()); //exit();
            
        }
    }

}

?>