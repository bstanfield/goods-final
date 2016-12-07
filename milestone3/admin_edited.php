<?php

$conn = mysqli_connect("uscitp.com", "jacksocb", "6634277976", "jacksocb_goods");

if (isset($_POST['getit'])) {

    $company_name = $_POST['name'];
    $company_desc = $_POST['desc'];
    $company_url = $_POST['url'];


    $queryr = mysqli_query($conn, "UPDATE companies SET company_name = '$company_name', company_desc = '$company_desc', company_url = '$company_url' WHERE  company_id =" . $_REQUEST['company']);
}

header( 'Location: search.php' ) ;

?>