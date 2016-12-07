<?php
if(empty($_REQUEST['grade'])) {
    header('Location: search.php');
}

include "head.php";

?>
<br><br><br><br><br>
<div class="container results">
    <div class="results-img">
        <?php
        echo "<form action='results.php?grade='" . $_REQUEST[grade] . ">" .
             "<button type='submit' class='btn btn-success'>Back to Search</button>" .
            "</form>";
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
$sql = "SELECT * FROM CompanyView WHERE company_grade = " . "'$_REQUEST[grade]'";

//results compile
$results = mysqli_query($conn, $sql);

//checker
if(!$results) {
    echo "Your SQL: " . $sql . "<br><br>";
    echo "SQL Error: " . mysqli_error($conn);
    exit();
}

include "grading.php";

?>
<div class="container results">
    <?php




    if (empty($_REQUEST["start"])) {
        $start = 1;
    }
    else {
        $start = $_REQUEST["start"];
    }
    $count = 3;
    $end = $start+$count-1;
    $counter = $start;

    echo "Displaying records " . $start . " through " . $end . "<br>";
    echo "<em>Your results returned <strong>" . mysqli_num_rows($results) . "</strong> results.</em>";

    $searchstring = "&grade=" . $_REQUEST["grade"];

    //    echo "<hr>" . $searchstring . "<hr>";
    // data seek starts the counter of the records not at 0, but at the place you designate. Here, it's $start-1.
    mysqli_data_seek($results, $start-1);

    echo "<br><br>";

    while($currentrow = mysqli_fetch_array($results)) {
        echo "<a href='details.php?company=" . $currentrow[company_id] . "'>" .
            "<img class='thumbnail' src='../images/" . $currentrow[company_image] . "'>" .
            "<h1 class='thumbnail-h1'>" . $currentrow[company_name] . "</h1></a>";

        echo "<p>" . $currentrow[company_desc] . "</p>";

        if ($counter >= $end) {
            break;
        }

        $counter++;

    }

    echo "<hr>";

    // previous button
    if ($start != 1) {
        // if the start isn't 1, then there are previous records we can access
        echo "<a style='font-size:25px' href='results.php?start=" . ($start-$count) . $searchstring . "'>Previous Page</a> ";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }

    // next button
    if ($end < mysqli_num_rows($results)) {
        // if there are more records, then display this end button. if not, no show
        echo "<a style='font-size:25px' href='results.php?start=" . ($end+1) . $searchstring . "'>Next Page <span 
        class='glyphicon glyphicon-chevron-right'></span></a>";

    }

    echo "<br><br><br><br>";

    ?>
</div>