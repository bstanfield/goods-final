<?php
session_start();

echo "<br>Received " . $_FILES[picture][name] . "<br>";
$path = $_SERVER[DOCUMENT_ROOT] . "/uploads/goods/" . $_FILES[picture][name];

move_uploaded_file($_FILES[picture][tmp_name], $path);

$webpath = "http://bstanfie.student.uscitp.com/uploads/goods/" . $_FILES[picture][name];

$conn = mysqli_connect("uscitp.com", "jennylzh", "3558953462", "jennylzh_users");

if(mysqli_connect_errno()){
    echo "ERROR: " . mysqli_connect_errno();
    exit();
}

$_SESSION[picture_url] = $webpath;

$sql = "UPDATE users SET picture_url = '$_SESSION[picture_url]' WHERE id = $_REQUEST[user_id]";
$results = mysqli_query($conn, $sql);


echo "<hr>";
echo "Sent to server path: " . $path . "<br>";
echo "Uploaded to web at: <a href='" . $webpath . "'>" . $webpath . "</a>" . ". Redirecting...";
echo "<meta http-equiv=\"refresh\" content=\"1;url=edit.php\" />";

?>