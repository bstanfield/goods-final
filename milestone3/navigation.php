<?php

$conn = mysqli_connect("uscitp.com", "jennylzh", "3558953462", "jennylzh_users");

if(mysqli_connect_errno()){
    echo "ERROR: " . mysqli_connect_errno();
    exit();
}

$sql = "SELECT * FROM users";
$results = mysqli_query($conn, $sql);
?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
    .login {
        position: relative;
        margin: 5px;
    }

    .login-field {
        height: 30px;
        width: 100%;
        padding: 8px;
        font-size: 0.9em;
    }

    .login button {
        margin: -2px 0 2px 0;
        width: 100%;
        line-height: 0;
    }

    a {
        padding-left: 10px;
    }
</style>

<div class="navigator">
      <div class="container">
        <a href="homepage.php"><img src="../images/goods-logo1.png"></a>
        <div class="nav-items">
          <ul id="special-ul">
            <a href="search.php"><li>Search</li></a>
              <a href="analytics.php"><li>Site Analytics</li></a>
                <a href="about.php"><li>About</li></a>
          </ul>

                <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" id="menu1" type="button"
                            data-toggle="dropdown">Account
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li><?php

                        if ($_SESSION[loggedin] == false) {

                            if (!empty($_REQUEST[login])) {

                                // while goes through all usernames in DB, if there is a match
                                while ($currentrow = mysqli_fetch_array($results)) {
                                    if ($_REQUEST[username] == $currentrow[username] && $_REQUEST[password] == $currentrow[password]) {
                                        $_SESSION[loggedin] = true;
                                        $_SESSION[username] = $currentrow[username];
                                        $_SESSION[admin] = $currentrow[admin];
                                        echo "<meta http-equiv='refresh' content='0;url = homepage.php' />";
                                        exit();
                                    }
                                };

                                // if no matches
                                echo "<script>alert('Wrong username/password!')</script>";
                                echo "<meta http-equiv='refresh' content='0;url = homepage.php'/>";

                            }

                            else {
                                include 'form.php';
                            }

                        }

                        else {
                            // display logout button if you're logged in
                            include 'logout.php';
                        }
                        ?></li>
                    </ul>
                </div>
        </div>
      </div>
    </div>
