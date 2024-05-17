<!-- login system -->

<?php
include_once('connections/connection.php');
$cons = connection();

if(isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
 
    $sql = "INSERT INTO `student_list`(`first_name`, `last_name`,
      `gender`) VALUES ('$fname','$lname','$gender')";
    $cons->query($sql) or die($cons->connect_error);

    echo header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add.css">

</head>
<body>
    <h2>Student System Management</h2>
    <h4>Add New Student</h4>
    
    <form action="" method="post">

        <label>First Name</label>
        <input type="text" name="firstname" id="firstname">

        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname">

        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
            

        <input type="submit" name='submit' value="Add Student">
    </form>
    
</body>
</html>