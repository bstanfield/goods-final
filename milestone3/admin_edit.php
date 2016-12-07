<?php
session_start();
if(empty($_REQUEST['company'])) {
    header('Location: search.php');
}

include "head.php";

?>

<br><br><br><br>
<div class="company-container">

<?php

$conn = mysqli_connect("uscitp.com", "jacksocb", "6634277976", "jacksocb_goods");

if(mysqli_connect_errno()) {
    echo "Failed to connect to mySql: " . mysqli_connect_errno();
    exit();
}

$sql = "SELECT * FROM CompanyView WHERE  company_id =" . $_REQUEST['company'];
$results = mysqli_query($conn, $sql);

//checker
if(!$results) {
    echo "Your SQL: " . $sql . "<br><br>";
    echo "SQL Error: " . mysqli_error($conn);
    exit();
}

//company information
$companyinfo = mysqli_fetch_array($results);
echo "<h1>Editing Company: $companyinfo[company_name]</h1>";
 echo "<span style='font-weight: normal'><p>$companyinfo[company_desc]</span><br></p>";
 echo "<a href='$companyinfo[company_url]' target='_blank'>$companyinfo[company_url]</a><br><br><br>";
?>


<form method = "post" action = "admin_edited.php">
    New Company Name: <input class="form-control" type="text" name ="name" value="<?php echo $companyinfo['company_name']; ?>"><br>
    New Company URL: <input class="form-control" type="text" name ="url" value="<?php echo $companyinfo['company_url']; ?>"><br>
    New Company Description: <br> <textarea class="form-control" name ="desc"><?php echo $companyinfo['company_desc']; ?></textarea>

    </select><br><br>
    <input type="hidden" name="company" value="<?php echo $companyinfo['company_id'];?>">
    <input name="getit" class="btn btn-success" type="submit">
</form>

</div>
</body>
</html>