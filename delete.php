<?php

include_once('connections/connection.php');
    $cons = connection();

if(isset($_POST['delete'])) {

    $id = $_POST['ID'];
    $sql = "DELETE FROM student_list WHERE id = '$id'";
    $cons->query($sql) or die($cons->connect_error);
    echo header("Location: index.php");

}

?>