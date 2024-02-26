<?php

if(!isset($_SESSION)){
    session_start();
}


include_once("connections/connection.php");

$con = connection();

$sql = "SELECT * FROM students ORDER BY id DESC";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <header>
    <h1>ProjectOne</h1>
    </header>
    <h1>STUDENT MANAGEMENT SYSTEM</h1>
    <br>
    <br>
    <div class="tops"><a href="about.html">ABOUT</a></div>
    <?php
    if(isset($_SESSION['UserLogin'])){
        echo "Welcome ".$_SESSION['UserLogin'];
    }else{
        echo "<h1>Welcome Guest</h1>";;
    }


    ?>

    <?php if(isset($_SESSION['UserLogin'])){?>
            <a href="logout.php">LOG OUT</a>
    <?php }else{ ?>
            <a href="login.php">LOG IN</a>
    <?php } ?>
    <br/>
    <a href="add.php">ADD STUDENT INFO</a>
    <br/>
    <form action="result.php" method="get">
    <input type="text" name="search" id="search">
    <button type="submit">Search</button>

    </form>
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
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
   
</body>
<footer class="footer">
        <h2>ProjectOne v2.</h2>
    </footer>
</html>
