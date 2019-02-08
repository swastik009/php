<?php


namespace AccessLayer;

require "config.php";




Class Conn
{


public function connect(){
    $conn = mysqli_connect(ServerName, UserName, Password, DbName);

    if (!$conn)
        die("Error connecting to server ".mysqli_connect_error());
    return $conn;

}

}
