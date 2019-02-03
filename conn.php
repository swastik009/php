<?php

require "config.php";


$conn = mysqli_connect(ServerName,UserName,Password,DbName);

if(!$conn)
    die("Error connecting to server ".mysqli_connect_error());


echo "WERE ARE HERE";