<?php
session_start();

include "head.php";

?>

<br><br><br><br>
<div class="company-container">

<?php
if(isset($_POST['add'])) {

    $conn = mysqli_connect("uscitp.com", "jacksocb", "6634277976", "jacksocb_goods");

    if(! get_magic_quotes_gpc() ) {
        $company_name = addslashes ($_POST['company_name']);
        $company_desc = addslashes ($_POST['company_desc']);
    }else {
        $company_name = $_POST['company_name'];
        $company_desc = $_POST['company_desc'];
    }

    $company_url = $_POST['company_url'];

    $sql = "INSERT INTO companies ". "(company_name, company_desc, company_url) ". "VALUES('$company_name','$company_desc','$company_url')";

    //results compile
    $results = mysqli_query($conn, $sql);

//checker
    if(!$results) {
        echo "Your SQL: " . $sql . "<br><br>";
        echo "SQL Error: " . mysqli_error($conn);
        exit();
    }

    echo "Added " . $_POST['company_name'] . " successfully to Database\n";

    mysqli_close($conn);
}else {
    ?>

    <form method = "post" action = "<?php $_PHP_SELF ?>">
        <table width = "400" border = "0" cellspacing = "1"
               cellpadding = "2">

            <tr>
                <td width = "200">Company Name</td>
                <td><input class="form-control" name = "company_name" type = "text"
                           id = "company_name"></td>
            </tr>

            <tr>
                <td width = "200">Company URL</td>
                <td><input class="form-control" name = "company_url" type = "text"
                           id = "company_url"></td>
            </tr>

            <tr>
                <td width = "200">Company Description</td>
                <td><textarea class="form-control" name = "company_desc" type = "text"
                           id = "company_desc"></textarea></td>
            </tr>


            <tr>
                <td width = "200"> </td>
                <td>
                    <br><br>
                    <input class="btn btn-success" name = "add" type = "submit" id = "add"
                           value = "Add Company">
                </td>
            </tr>

        </table>
    </form>

    <?php
}
?>

</div>
</body>
</html>