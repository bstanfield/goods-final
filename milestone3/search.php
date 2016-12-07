<?php
/**
 * Administration back-end: You will begin to build out the "admin" of the site, where high-level
 * users can add, edit and delete site content... basically can edit the underlying site data
 * from db tables. For this build this includes:
Admin "main page" and navigation: Special admin nav for editing site data. Typically, the admin "main page" will list out most of the same options/links that are in the admin navigation. So for instance, if this were the admin for the DVD site, this admin main menu and nav might have entries like:
Movie: Add, Edit, Delete
Genres: Add, Edit, Delete
Ratings: Add, Edit, Delete
Users: Add, Edit, Delete
Top/Features Movies: Add, Edit, Delete
Etc.
Please note: You do NOT have to build out all of these admin modules yet. But the navigation and the
 * "Administration landing page" should list out all of the potential/planned admin modules
Working add, edit, delete modules one CORE site data type. If this were the DVD site, it would be the
 * "titles" admin. More periphery CRUD modules (such as for look-up tables) can come later.
It is recommended you build out the amdin in its own directory of the site (i.e. /admin/) to make it
 * easier/clearer to secure that site area later.
In a later build, you will be required to secure the admin area (require login and a specific security level) \
 * but you do not have to secure the admin yet.
 */

include "head.php";
?>

<?php

$conn = mysqli_connect("uscitp.com", "jacksocb", "6634277976", "jacksocb_goods");
$conn2 = mysqli_connect("uscitp.com", "jacksocb", "6634277976", "jacksocb_goods");

if(mysqli_connect_errno()) {
    echo mysqli_connect_errno();
    exit();
}
?>

<br><br><br><br>
<div>
    <div class="search-form">
        <h1>Goods by Rating</h1>
        <form action = "results.php">
            <br>
            <select class="form-control" name="grade">
                <option value="" hidden>Select a Company</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="F">F</option>
            </select>

            </br>
            <button type="submit" class="btn btn-success">Search!</button>
            </form>

            <div class="section-split"></div><br><br>
        
        <h1>Goods by Company</h1>
        <form action = "details.php">
            <br>
            <select class="form-control" name="company">

                <option value="ALL" hidden>Select a Company</option>
                <?php
                $companies = "SELECT company_name, company_id FROM companies";
                $results = mysqli_query($conn, $companies);

                if(!$results) {
                    echo "db error " . mysqli_error($results);
                    exit();
                };
                while($currentrow = mysqli_fetch_array($results)) {

                    echo "<option value='" . $currentrow['company_id'] . "'>"
                        . $currentrow['company_name'] . "</option>";
                }
                ?>
            </select>

            </br>
            <button type="submit" class="btn btn-success">Search!</button>

        </form>
        <div class="section-split"></div>
        <br><br>
        <?php
        if($_SESSION[admin] == 1) {

            echo "<h1>Edit Companies</h1>
        <form action = 'admin_edit.php' method = 'post' target='_blank'>
            <br>
            <select class='form-control' name='company'>

                <option value='' hidden>Select a Company</option>";

            $companies = "SELECT company_name, company_id FROM companies";
            $results = mysqli_query($conn, $companies);

            if (!$results) {
                echo "db error " . mysqli_error($results);
                exit();
            };
            while ($currentrow = mysqli_fetch_array($results)) {

                echo "<option value='" . $currentrow['company_id'] . "'>"
                    . $currentrow['company_name'] . "</option>";
            }

            echo "</select>
            </br>
            <button type='submit' class='btn btn-success'>Edit Companies</button>
        </form>

        <form action = 'admin_add.php' method = 'post' target='_blank'>
            <button type='submit' class='btn btn-success'>Add Companies</button>
        </form>";
        }
        ?>
        <br><br>

    </div>
</div>
</html>