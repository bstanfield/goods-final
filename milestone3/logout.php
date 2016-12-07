<?php

if (empty($_REQUEST["logout"])) {

    echo "<form class='login'>" .
        "<input name='logout' value='logout' hidden>" .
        "<button type='submit' class='btn btn-success login-field'>Logout of " . $_SESSION["username"] . "</button>" .
        "</form>";
}
if (!empty($_REQUEST["logout"])) {
    unset($_SESSION["loggedin"]);
    echo "<meta http-equiv=\"refresh\" content=\"0;url=homepage.php\" />";
    exit();
}
?>