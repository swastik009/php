<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/10/2019
 * Time: 10:43 AM
 */

//echo "We are test";

$database = new Database();

$query = "SELECT * FROM test";

$database->query($query);
$data = $database->fetchAll();
 echo $data;
echo $data->title;


