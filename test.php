<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/3/2019
 * Time: 9:39 PM
 */

include 'namespace.php';
use \helpers\Redirect;
use AccessLayer\DAL;



?>

<html>
<head>
    <title>
        Test
    </title>
</head>

<body>

    <form method = "post" enctype="multipart/form-data">
        <label>title </label>
        <input type="text" name="title">
        <label>decription </label>
        <input type="text" name="description">
        <label>Upload image</label>
        <input type="file" name="image" value="" >

        <input type="hidden" name="id">

        <button type="submit" name="submitButton">Submit</button>
    </form>

    <?php




        $db = new DAL();
        if(isset($_POST['submitButton'])){
            $db->data = $_POST;
            $db->button = 'submitButton';
            $db->id = $_POST['id'];
            $db->tableName = 'test';
            $db->files = $_FILES;
            $db->fileHolder = "image";
            $db->imgPath = 'image/';


            if(empty($db->id)){
                $db->Save();

            }
            else
                $db->update();
        }

    ?>

</body>
</html>
