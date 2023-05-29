<?php
if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") {
    echo 'Welcome ' . $_SESSION['UserLogin'] . '<br><br>';
} else {
    echo header("Location: index.php");
}

include_once('connections/connection.php');
$cons = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $cons->query($sql) or die($cons->connect_error);
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/view.css">
</head>
<body>
<form action="delete.php" method="post">
    <div class="container">
        <div class="header">
            <h1>Student Profile</h1>
            <div class="actions">
                <a href="index.php">Back</a>
                <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>
                <?php if($_SESSION['Access'] == 'administrator') { ?>
                        <button type="submit" name="delete">Delete</button>
                <?php } ?>
                        <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
            </div>
        </div>
    </form>
        <div class="body">
            <div class="profile-picture">
            <img src="images/<?php echo $row['id']; ?>.jpg" alt="Profile Picture">
            </div>
            <div class="details">
                <h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h2>
                <p><?php echo $row['gender']; ?></p>
                <hr>
                <div class="personal-info">
                    <h3>Personal Information</h3>
                    <p><strong>Birthday: </strong><?php echo $row['birthday']; ?></p>
                    <p><strong>Address: </strong><?php echo $row['address']; ?></p>
                    <p><strong>Email: </strong><?php echo $row['email']; ?></p>
                    <p><strong>Contact Number: </strong><?php echo $row['contact_no']; ?></p>
                    <p><strong>Course: </strong><?php echo $row['course']; ?></p>
                    <p><strong>Year Level: </strong><?php echo $row['year_level']; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
