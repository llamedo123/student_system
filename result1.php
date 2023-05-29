
<?php
if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION['UserLogin'])) {
    echo 'Welcome ' . $_SESSION['UserLogin'];
} else {
    echo 'Welcome Guest';
}

include_once('connections/connection.php');
    $cons = connection();


    $search = $_GET['search'];



    $sql = "SELECT * FROM student_list WHERE first_name LIKE '%$search%' 
    || last_name LIKE '%$search%' ORDER BY id DESC";
    $students = $cons->query($sql) or die($cons->connect_error);
    $row = $students->fetch_assoc();


?>

<!DOCTYPE html> 
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">

</head>
<body>
    <h1>System Management</h1><br><br>

<form action="result.php" method="get">
    <input type="text" name="search" id="search">
    <button type="submit">Search</button>

    <?php if(isset($_SESSION['UserLogin'])) {?>
    <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a href="login.php">Login</a>
    <?php } ?>
</form>

    <a href="add.php">Add New</a>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>


<tbody>
            <?php do { ?>
            <tr>
                <td><a href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>
                <td>
                    <?php echo $row['first_name']; ?>
                </td>
                <td>
                    <?php echo $row['last_name']; ?>
                </td>
            </tr>
            <?php }while ($row = $students->fetch_assoc()); ?>
</tbody>

    </table>
    
</body>
</html>