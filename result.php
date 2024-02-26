<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo "Welcome ".$_SESSION['UserLogin'];
}else{
    echo "Welcome Guest";
}

include_once("connections/connection.php");

$con = connection();
$search = $_GET['search'];
$sql = "SELECT * FROM students WHERE firstname LIKE '%$search%' || lastname LIKE '%$search%' ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT SYSTEM</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>STUDENT MANAGEMENT SYSTEM</h1>
    <br>
    <br>
    <form action="result.php" method="get">
    <input type="text" name="search" id="search">
    <button type="submit">Search</button>

    </form>

    <?php if(isset($_SESSION['UserLogin'])){?>
            <a href="logout.php">LOG OUT</a>
    <?php }else{ ?>
            <a href="login.php">LOG IN</a>
    <?php } ?>
    <br/>
    <a href="add.php">ADD STUDENT INFO</a>
    <br/>
    <table>
    <thead>
        <tr>
            <th></th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
        </tr>
    </thead>
    <?php do{ ?>
    <tbody>
        <tr>
            <td><a href="details.php?ID=<?php echo $row['id'];?>">View</a></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
        </tr>
    <?php }while($row = $students->fetch_assoc()); ?>
    </tbody>
    </table>
</body>
</html>
