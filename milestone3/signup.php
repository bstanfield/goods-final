<?php
session_start();

$conn = mysqli_connect("uscitp.com", "jennylzh", "3558953462", "jennylzh_users");

if(mysqli_connect_errno()){
    echo "ERROR: " . mysqli_connect_errno();
    exit();
}

$sql = "SELECT * FROM users";
$results = mysqli_query($conn, $sql);
?>

<html>
<head>
    <title>Goods - Dashboard</title>
</head>
<link rel="stylesheet" type="text/css" href="http://bstanfie.student.uscitp.com/milestones/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="http://bstanfie.student.uscitp.com/milestones/css/milestone2.css">

<body>
<div class="navigation">
    <div class="container">
        <a href="homepage.html"><img src="http://bstanfie.student.uscitp.com/milestones/images/goods-icon.png"></a>
        <div class="nav-items">
            <ul>
                <a href="dash.php"><li>Dashboard</li></a>

                <?php
                if ($_SESSION["loggedin"] == true) {
                    // display logout button if you're logged in
                    include "logout.php";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<br><br><br><br>
<div style="width: 80%; margin: auto">
    <form action="create_account.php">
        <input type="text" name="username" placeholder="Username" value="">
        <input type="text" name="password" placeholder="Password" value="">
        <button type='submit' class='btn btn-success login-field'>Create Account</button>
    </form>
</div>
</body>
</html>