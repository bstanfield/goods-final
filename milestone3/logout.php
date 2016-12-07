<?php
//
//if (empty($_REQUEST["logout"])) {
//
//    echo "<form class='login'>" .
//        "<input name='logout' value='logout' hidden>" .
//        "<button type='submit' class='btn btn-success login-field'>Logout of " . $_SESSION["username"] . "</button>" .
//        "</form>";
//}
//if (!empty($_REQUEST["logout"])) {
//    unset($_SESSION["loggedin"]);
//    echo "<meta http-equiv=\"refresh\" content=\"0;url=homepage.php\" />";
//    exit();
//}
//?>

<?php

if (empty($_REQUEST["logout"])) {
    $plain = "http://bstanfie.student.uscitp.com/uploads/goods/";
    if ($_SESSION[picture_url] != $plain) {
        echo "<div id='user-box'><img id='user' src='$_SESSION[picture_url]' alt='pic' width='70px'></div>";
    } else {
        echo "<a href='edit.php'><div id='user-box'><img id='user' src='../images/upload-thumb.png'></div></a>";
    }

    echo "<div id='buttons-container'>" .
        "<form class='editAccount login'>" .
            "<input name='editAccount' value='editAccount' hidden>" .
            "<button type='submit' class='login-button'>Edit Account</button>" .
            "</form>";

        echo "<form class='login'>" .

        "<input name='logout' value='logout' hidden>" .
        "<button type='submit' 
class='login-button dark'>Logout of " . $_SESSION["username"] . "</button>";

    echo "</form>";
    echo "</div>";


}
if (!empty($_REQUEST["logout"])) {
    unset($_SESSION["loggedin"]);
    echo "<meta http-equiv=\"refresh\" content=\"0;url=homepage.php\" />";
    exit();
}

if (!empty($_REQUEST["editAccount"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=edit.php\" />";
    exit();
}
?>
