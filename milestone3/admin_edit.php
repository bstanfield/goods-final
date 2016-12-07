<?php
//print_r($_REQUEST);
//exit();

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
echo "<br><br>Editing Company: <strong>$companyinfo[company_name]</strong><br>";
 echo "<span>$companyinfo[company_desc]</span><br>";
 echo "<span>$companyinfo[company_url]</span><br><br><br>";
?>


<form method = "post" action = "admin_edited.php">
    New Company Name: <input type="text" name ="name" placeholder="<?php echo $companyinfo['company_name']; ?>"><br>
    New Company URL: <input type="text" name ="url" placeholder="<?php echo $companyinfo['company_url']; ?>"><br>
    New Company Description: <br> <textarea name ="desc" placeholder="<?php echo $companyinfo['company_desc']; ?>"></textarea>

    </select><br><br>
    <input type="hidden" name="company" value="<?php echo $companyinfo['company_id'];?>">
    <input name="getit" type="submit">
</form>