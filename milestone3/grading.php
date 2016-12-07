<?php

function getGrade($score) {
    if ($score >= 0 && $score <= 24) {
        echo "<span style='color:#ba2626'>F</span>";
    }
    else if ($score >= 25 && $score <= 29) {
        echo "<span style='color:#ce7729'>D</span>";
    }
    else if ($score >= 30 && $score <= 49) {
        echo "<span style='color:#d8b831'>C</span>";
    }
    else if ($score >= 50 && $score <= 84) {
        echo "<span style='color:#bcc44d'>B</span>";
    }
    else if ($score >= 85 && $score <= 100) {
        echo "<span style='color:#327b3c'>A</span>";
    }
}

function getBigGrade() {
    $conn = mysqli_connect("uscitp.com", "jacksocb", "6634277976", "jacksocb_goods");

    //conneciton error checker
        if(mysqli_connect_errno()) {
            echo "Failed to connect to mySql: " . mysqli_connect_errno();
            exit();
        }

    //pull from database
        $sql =      "SELECT * FROM CompanyView WHERE  company_id =" . $_REQUEST['company'];
        $sqlr =     "SELECT * FROM RatingView2 WHERE company_id =" . $_REQUEST['company'];

    //results compile
    $results = mysqli_query($conn, $sql);
    $ratingresults = mysqli_query($conn, $sqlr);

    //checker
        if(!$results) {
            echo "Your SQL: " . $sql . "<br><br>";
            echo "SQL Error: " . mysqli_error($conn);
            exit();
        }

    //company information
        $companyinfo = mysqli_fetch_array($results);

    $total = 0;
    while($companyinfo = mysqli_fetch_array($ratingresults)) {
        $total = $total+$companyinfo['ratin_num'];
    }

    $score = $total/7;

    if ($score >= 0 && $score <= 24) {
        echo "<div class='big-grade' style='background:#ba2626;'>"
            . "<img src='../images/overall-grade-heart.png'>"
            . "<div class='overall-score'>F</a>"
            . "</div></div>";
    }
    else if ($score >= 25 && $score <= 29) {
        echo "<div class='big-grade' style='background:#ce7729;'>"
            . "<img src='../images/overall-grade-heart.png'>"
            . "<div class='overall-score'>D</a>"
            . "</div></div>";
    }
    else if ($score >= 30 && $score <= 49) {
        echo "<div class='big-grade' style='background:#d8b831;'>"
            . "<img src='../images/overall-grade-heart.png'>"
            . "<div class='overall-score'>C</a>"
            . "</div></div>";
    }
    else if ($score >= 50 && $score <= 84) {
        echo "<div class='big-grade' style='background:#bcc44d;'>"
            . "<img src='../images/overall-grade-heart.png'>"
            . "<div class='overall-score'>B</a>"
            . "</div></div>";
    }
    else if ($score >= 85 && $score <= 100) {
        echo "<div class='big-grade' style='background:#327b3c;'>"
            . "<img src='../images/overall-grade-heart.png'>"
            . "<div class='overall-score'>A</a>"
            . "</div></div>";
    }
    else {
        echo "<div class='big-grade' style='background:#ce7729;'>"
            . "<img src='../images/overall-grade-heart.png'>"
            . "<div class='overall-score'>D</a>"
            . "</div></div>";
    }
}

?>