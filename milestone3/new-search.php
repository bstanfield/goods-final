<?php
session_start();
?>

<html>
<head>
    <title>Goods - Search</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/milestone2.css">
<style>
</style>

<body>
<?php include 'navigation.php';?>
<?php

$conn = mysqli_connect("uscitp.com", "jacksocb", "6634277976", "jacksocb_goods");

if(mysqli_connect_errno()) {
    echo mysqli_connect_errno();
    exit();
}
?>

<br><br><br><br><br><br>
    <div class="container search-container">
        <div class="search-form">
            <form action = "details.php" method = "post" target="_blank">
                <div class="row">
                    <div class="col-sm-9">
                        <select class="form-control" name="company">

                            <option value="ALL">Select a Company</option>
                            <?php
                            $companies = "SELECT company_name FROM companies";
                            $results = mysqli_query($conn, $companies);

                            if(!$results) {
                                echo "db error " . mysqli_error($results);
                                exit();
                            };
                            while($currentrow = mysqli_fetch_array($results)) {

                                echo "<option value='" . $currentrow['company_name'] . "'>"
                                    . $currentrow['company_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success">Search!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="company-container">
            <div class="company-section">
                <div class="details-container">
                    <div class="image-box">
                    </div>
                    <div class="company-score">
                        <h1>Nike</h1>
                            <div class="grades">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="long">Categories</th>
                                        <th class="short">Grade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Sustainability</td>
                                        <td><span class="B">B+</span></td>
                                    </tr>
                                    <tr>
                                        <td>Social</td>
                                        <td><span class="A">A</span></td>
                                    </tr>
                                    <tr>
                                        <td>Policy</td>
                                        <td><span class="A">A</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="big-grade">
                                    <img src="../images/a-grade.png">
                                </div>
                            </div>
                        <div class="company-description">
                            Nike, Inc. is an American multinational corporation that is engaged in the
                            design, development, manufacturing and worldwide marketing and sales of footwear, apparel, equipment, accessories and services.
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-xs-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="long">Sustainability</th>
                        <th class="short"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Carbon Footprint</td>
                        <td><span class="B">B+</span></td>
                    </tr>
                    <tr>
                        <td>Wastefullness</td>
                        <td><span class="A">A</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="long">Social Responsibility</th>
                        <th class="short"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Compensation</td>
                        <td><span class="B">B+</span></td>
                    </tr>
                    <tr>
                        <td>Freedom</td>
                        <td><span class="A">A</span></td>
                    </tr>
                    <tr>
                        <td>Conditions</td>
                        <td><span class="A">A</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="long">Political Activity</th>
                        <th class="short"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Margins</td>
                        <td><span class="B">B+</span></td>
                    </tr>
                    <tr>
                        <td>Charity</td>
                        <td><span class="A">A</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container-grey">
            <div class="compare">
                <h2>Carbon Footprint</h2>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter">
                                <span style="width: 90%"></span>
                            </div>
                        </div>
                        <div class="number">90</div>
                    </div>
                    <div class="thing">Nike</div>
                <div class="score-block">
                    <div class="meter-container">
                        <div class="meter-avg">
                            <span style="width: 70%"></span>
                        </div>
                    </div>
                    <div class="number">70</div>
                </div>
                <div class="number">List Average</div>
            </div>

            <div class="compare">
                <h2>Wastefulness</h2>
                <div class="score-block">
                    <div class="meter-container">
                        <div class="meter">
                            <span style="width: 95%"></span>
                        </div>
                    </div>
                    <div class="number">95</div>
                </div>
                <div class="thing">Nike</div>
                <div class="score-block">
                    <div class="meter-container">
                        <div class="meter-avg">
                            <span style="width: 80%"></span>
                        </div>
                    </div>
                    <div class="number">80</div>
                </div>
                <div class="number">List Average</div>
            </div>
        </div>
    </div>
</html>
