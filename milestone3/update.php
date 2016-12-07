<?php
session_start();

$conn = mysqli_connect("uscitp.com", "jennylzh", "3558953462", "jennylzh_users");

if(mysqli_connect_errno()){
    echo "ERROR: " . mysqli_connect_errno();
    exit();
}

$sql = "UPDATE users SET username = '$_REQUEST[username]', password = '$_REQUEST[password]' WHERE id = $_REQUEST[user_id]";
$result = mysqli_query($conn, $sql);

$_SESSION[username] = $_REQUEST[username];
$_SESSION[password] = $_REQUEST[password];

echo "Updated. Redirecting...";
echo "<meta http-equiv=\"refresh\" content=\"1;url=edit.php\" />";
?>