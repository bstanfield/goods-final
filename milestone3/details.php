<?php
if(empty($_REQUEST['company'])) {
    header('Location: search.php');
}

include "head.php";

?>

<br><br><br><br><br>
<div class="container results">
    <div class="results-img">
        <?php
        echo "<form method=\"get\" action=\"search.php\">
             <button type=\"submit\" class=\"btn btn-success\">Back to Search</button>
            </form>";
        ?>
    </div>
</div>


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


include "grading.php";

$grade = $companyinfo['company_grade'];

?>

<!-- printer -->

    <div class="company-container">
        <div class="company-section">
            <div class="details-container">
                <div class="image-box">
                    <img src="http://bstanfie.student.uscitp.com/milestones/images/<?php echo $companyinfo[company_image] ?>">
                </div>
                <div class="company-score">
                    <h1><?php echo $companyinfo[company_name]; ?></h1>

                    <?php echo getBigGrade(); ?>

                    <div class="company-description">
                        <?php echo $companyinfo[company_desc]; ?>
                    </div>

                    <?php
                    $count = 1;
                    while($companyinfo = mysqli_fetch_array($ratingresults)) {
                    /* key:

                        Sustainability
                            1. Carbon Footprint
                            2. Wastefulness

                        Social Responsibility
                            3. Compensation
                            4. Conditions
                            5. Freedom

                        Political Activity
                            6. Margins
                            7. Charity
                    */

                    ?>

                    <?php if ($count == 1) : ?>
<!--                    <div class="grades">-->
<!--                        <table class="table">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th class="long">Categories</th>-->
<!--                                <th class="short">Grade</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            <tr>-->
<!--                                <td>Sustainability</td>-->
<!--                                <td><span class="B">--><?php //echo getGrade(0) ?><!--</span></td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>Social</td>-->
<!--                                <td><span class="A">--><?php //echo getGrade(0) ?><!--</span></td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <td>Policy</td>-->
<!--                                <td><span class="A">--><?php //echo getGrade(0) ?><!--</span></td>-->
<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
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
                            <td><span class="B">
                                 <?php endif; ?>
                                 <?php if ($count == 2) : ?>
                            </span></td>
                        </tr>
                        <tr>
                            <td>Wastefulness</td>
                            <td><span class="A">
                                <?php endif; ?>
                                <?php if ($count == 3) : ?>
                            </span></td>
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
                            <td><span class="B">
                                <?php endif; ?>
                                <?php if ($count == 4) : ?>
                            </span></td>
                        </tr>
                        <tr>
                            <td>Freedom</td>
                            <td><span class="A">
                                <?php endif; ?>
                                <?php if ($count == 5) : ?>
                            </span></td>
                        </tr>
                        <tr>
                            <td>Conditions</td>
                            <td><span class="A">
                                <?php endif; ?>
                                <?php if ($count == 6) : ?>
                            </span></td>
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
                            <td><span class="B">
                                <?php endif; ?>
                                <?php if ($count == 7) : ?>
                            </span></td>
                        </tr>
                        <tr>
                            <td>Charity</td>
                            <td><span class="A">
                                <?php endif;
                                echo getGrade($companyinfo['ratin_num']);
                                $count += 1;
                                }
                                ?>
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php $companyinfo = mysqli_fetch_array($results); ?>

            <form action="email_share.php">
                <input value="<?php echo $companyinfo['company_id']; ?>" name="id" hidden>
                <input value="<?php echo $companyinfo['company_name']; ?>" name="company" hidden>
                <input value="<?php echo $grade; ?>" name="grade" hidden>
                <button style="margin:20px 0 0 0" class="btn btn-info">Share by Email</button>
            </form>
            <br>
            <hr style="border-top: 3px solid #ddd">

            <?php
            $count = 1;
            mysqli_data_seek($ratingresults,0);
            while($companyinfo = mysqli_fetch_array($ratingresults)) {
            ?>
            <?php if ($count == 1) : ?>
            <div class="container-grey">
                <table class="percents">
                    <tr>

                        <th>
                <div class="compare">
                    <h2>Carbon Footprint</h2>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter">
                                <span style="width:<?php echo $companyinfo['ratin_num']; ?>%"></span>
                            </div>
                        </div>
                        <div class="number">
                            <?php echo $companyinfo['ratin_num']; endif; if ($count == 2) : ?>
                        </div>
                    </div>
                    <div class="thing"><?php echo "$companyinfo[company_name]" ?></div>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter-avg">
                                <span style="width:60%"></span>
                            </div>
                        </div>
                        <div class="number">
                            80
                        </div>
                    </div>
                    <div class="thing">List Average</div>
                </div>

                <div class="compare">
                    <h2>Wastefulness</h2>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter">
                                <span style="width:<?php echo $companyinfo['ratin_num']; ?>%"></span>
                            </div>
                        </div>
                        <div class="number">
                            <?php echo $companyinfo['ratin_num']; endif; if ($count == 3) : ?>
                        </div>
                    </div>
                    <div class="thing"><?php echo "$companyinfo[company_name]" ?></div>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter-avg">
                                <span style="width:60%"></span>
                            </div>
                        </div>
                        <div class="number">
                            80
                        </div>
                    </div>
                    <div class="thing">List Average</div>
                </div>

                        </th>

                        <th>

                <div class="compare">
                    <h2>Compensation</h2>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter">
                                <span style="width:<?php echo $companyinfo['ratin_num']; ?>%"></span>
                            </div>
                        </div>
                        <div class="number">
                            <?php echo $companyinfo['ratin_num']; endif; if ($count == 4) : ?>
                        </div>
                    </div>
                    <div class="thing"><?php echo "$companyinfo[company_name]" ?></div>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter-avg">
                                <span style="width:60%"></span>
                            </div>
                        </div>
                        <div class="number">
                            80
                        </div>
                    </div>
                    <div class="thing">List Average</div>
                </div>

                <div class="compare">
                    <h2>Freedom</h2>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter">
                                <span style="width:<?php echo $companyinfo['ratin_num']; ?>%"></span>
                            </div>
                        </div>
                        <div class="number">
                            <?php endif; if ($count == 5) : ?>
                        </div>
                    </div>
                    <div class="thing"><?php echo "$companyinfo[company_name]" ?></div>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter-avg">
                                <span style="width:71%"></span>
                            </div>
                        </div>
                        <div class="number">
                            80
                        </div>
                    </div>
                    <div class="thing">List Average</div>
                </div>

                <div class="compare">
                    <h2>Conditions</h2>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter">
                                <span style="width:<?php echo $companyinfo['ratin_num']; ?>%"></span>
                            </div>
                        </div>
                        <div class="number">
                            <?php echo $companyinfo['ratin_num']; endif; if ($count == 6) : ?>
                        </div>
                    </div>
                    <div class="thing"><?php echo "$companyinfo[company_name]" ?></div>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter-avg">
                                <span style="width:55%"></span>
                            </div>
                        </div>
                        <div class="number">
                            80
                        </div>
                    </div>
                    <div class="thing">List Average</div>
                </div>
                        </th>
                        <th>
                <div class="compare">
                    <h2>Margins</h2>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter">
                                <span style="width:<?php echo $companyinfo['ratin_num']; ?>%"></span>
                            </div>
                        </div>
                        <div class="number">
                            <?php echo $companyinfo['ratin_num']; endif; if ($count == 7) : ?>
                        </div>
                    </div>
                    <div class="thing"><?php echo "$companyinfo[company_name]" ?></div>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter-avg">
                                <span style="width:43%"></span>
                            </div>
                        </div>
                        <div class="number">
                            80
                        </div>
                    </div>
                    <div class="thing">List Average</div>
                </div>

                <div class="compare">
                    <h2>Charity</h2>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter">
                                <span style="width:<?php echo $companyinfo['ratin_num']; ?>%"></span>
                            </div>
                        </div>
                        <div class="number">
                            <?php echo $companyinfo['ratin_num']; endif; if ($count == 7) : ?>
                        </div>
                    </div>
                    <div class="thing"><?php echo "$companyinfo[company_name]" ?></div>
                    <div class="score-block">
                        <div class="meter-container">
                            <div class="meter-avg">
                                <span style="width:66%"></span>
                            </div>
                        </div>
                        <div class="number">
                            80
                        </div>
                    </div>
                    <div class="thing">List Average</div>
                </div>

                <?php
                endif;
                $count += 1;
                } ?>

                        </th>
                </tr>
                </table>

            </div>
        </div>
</div>
</body>
</html>