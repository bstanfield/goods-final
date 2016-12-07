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
    <title>Account</title>
</head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/milestone3.css">
<body>
<?php include 'navigation.php';?>
<br><br><br><br><br>
<div class="container">
    <div class="small-container">
    <?php
        echo "<h1>$_SESSION[username]'s account settings</h1><br><br>";
    ?>
    <form action="update.php">
        <?php
        if(!$results) {
            echo "Your SQL: " . $sql . "<br><br>";
            echo "SQL Error: " . mysqli_error($conn);
            exit();
        }

        while($currentrow = mysqli_fetch_array($results)) {
            if ($_SESSION["username"] == $currentrow["username"]) {
                $_SESSION["password"] = $currentrow["password"];
                $_SESSION["user_id"] = $currentrow["id"];
                $_SESSION["picture_url"] = $currentrow["picture_url"];
            }
        }
        ?>

            <input type="text" class="form-control login-field" name="username" value="<?php echo $_SESSION[username]; ?>">
            <input type="text" class="form-control login-field" name="password" value="<?php echo $_SESSION[password]; ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION[user_id]; ?>">
            <button type='submit' class='login-button large'>Update Account Info</button>
        </form><br><br><br>

        <div class="upload-container">
            <form action="uploadpic.php" method="post" enctype="multipart/form-data">
                <div class="image-upload">
                    <input type="file" id='file-input' name="picture">
                </div><br>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION[user_id]; ?>">
                <button type='submit' class='login-button large'>Submit Picture</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>