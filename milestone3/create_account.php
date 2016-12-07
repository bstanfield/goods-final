<?php
session_start();

$conn = mysqli_connect("uscitp.com", "jennylzh", "3558953462", "jennylzh_users");

if(mysqli_connect_errno()){
    echo "ERROR: " . mysqli_connect_errno();
    exit();
}

$sql = "INSERT INTO users (username, password) VALUES ('$_REQUEST[username]', '$_REQUEST[password]')";
$result = mysqli_query($conn, $sql);

$_SESSION["loggedin"] = true;
$_SESSION[username] = $_REQUEST[username];
$_SESSION[password] = $_REQUEST[password];

echo "Account created. Redirecting...";
echo "<meta http-equiv=\"refresh\" content=\"1;url=homepage.php\" />";
?>