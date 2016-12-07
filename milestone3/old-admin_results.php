<?php
if(empty($_REQUEST['company'])) {
    header('Location: search.php');
}

?>
<html>
<head><title>Goods</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/milestone2.css">
<style>
    .search-form {
        width: 500px;
        margin: auto;
        text-align: center;
    }

    button {
        width: 100%;
    }

    .btn {
        margin-top: -20px;
    }

    select {
        margin-bottom: 0px;
    }

</style>
<body>
<?php include 'navigation.php';?>
<br><br><br><br><br>
<div class="container results">
    <div class="results-img">
        <?php
        echo "<form method=\"get\" action=\"http://bstanfie.student.uscitp.com/milestones/milestone2/search.php\">
             <button type=\"submit\" class=\"btn btn-success\">Back to Search</button>
            </form>";
        ?>
    </div>
</body>
<?php

//connection established
$conn = mysqli_connect("uscitp.com", "jacksocb", "6634277976", "jacksocb_goods");

//conneciton error checker
if(mysqli_connect_errno()) {
    echo "Failed to connect to mySql: " . mysqli_connect_errno();
    exit();
}

//pull from database
$sql =      "SELECT * FROM CompanyView WHERE  company_id =" . $_REQUEST['company'];
$sqlp =     "SELECT * FROM ProductView WHERE company_id =" . $_REQUEST['company'];
$sqlr =     "SELECT * FROM RatingView2 WHERE company_id =" . $_REQUEST['company'];

/*
 *
     //get company names
    if($_REQUEST['company'] != "ALL") {
        $sql .= " AND company_name ='" . $_REQUEST["company"] . "'";
    }
*/

//results compile
$results = mysqli_query($conn, $sql);

//checker
if(!$results) {
    echo "Your SQL: " . $sql . "<br><br>";
    echo "SQL Error: " . mysqli_error($conn);
    exit();
}

//company information
$companyinfo = mysqli_fetch_array($results);

//results recompile
$results = mysqli_query($conn, $sqlp);

//results rerecompile
$ratingresults = mysqli_query($conn, $sqlr);

//checker
if(!$results) {
    echo "Your SQL: " . $sql . "<br><br>";
    echo "SQL Error: " . mysqli_error($conn);
    exit();
}

//overall score
$overall = ($companyinfo['footp_rate'] + $companyinfo['waste_rate'] + $companyinfo['compe_rate'] +
    $companyinfo['freed_rate'] + $companyinfo['condi_rate'] + $companyinfo['margi_rate'] +
    $companyinfo['chari_rate']);

//printer
echo "<div> <img src='../images/" . $companyinfo['company_image'] . "'>" . "</div>";

echo  "<h1>" . $companyinfo["company_name"] . "</h1>";
echo "<div class='larger'>". $companyinfo['company_desc']."</div>";
echo "<br>";

echo "<div>Industry: ". $companyinfo['type_name']."</div>";
echo "<div>Overall Ethics Rating: ". $overall ."</div>";

echo "Products: ";
while($companyinfo = mysqli_fetch_array($results)) {
    echo "<div>" . $companyinfo['product_name'] . "</div>";
}

echo "Ratings: ";


$count = 1;
while($companyinfo = mysqli_fetch_array($ratingresults)) {

    if ($count == 1) {
        echo "<br><div> Environmental </div>";
        echo "<div> Footprint Rating: </div>";
    }

    if($count == 2)
        echo "<div> Waste Rating: </div>";

    if($count == 3) {
        echo "<br><div> People-Related </div>";
        echo "<div> Compensation Rating: </div>";
    }

    if($count == 4)
        echo "<div> Conditions Rating: </div>";

    if($count == 5)
        echo "<div> Freedom Rating: </div>";

    if($count == 6) {
        echo "<br><div> Policy </div>";
        echo "<div> Margins Rating: </div>";
    }

    if($count == 7)
        echo "<div> Freedom Rating: </div>";


        echo "<div>" . $companyinfo['ratin_num'] . "</div>";
        $count += 1;
}


if(mysqli_num_rows($ratingresults) == 1) {
    while($companyinfo = mysqli_fetch_array($result)) { echo "<div> Whatever Rating: " . $companyinfo['ratin_num'] . " </div>"; }
}

echo "<button type='submit' class='btn btn-success'>Learn more about " . $_REQUEST['company'] ."</button>";
echo "<br><br><br><br><br><br>";
echo "<br style='clear:both;'/>";


exit();
?>
</div>

</html>