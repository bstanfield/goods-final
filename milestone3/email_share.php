<?php
session_start();

if(empty($_REQUEST['id'] || $_REQUEST['company'] || $_REQUEST['grade']) ) {
    header('Location: search.php');
}

include "head.php";

if(!empty($_REQUEST[email])) {
    $recipient = $_REQUEST[email];
    $subject = "Check out " . $_REQUEST[company] . " on Goods!";
    $message = $_REQUEST[message];
    $header = "From: $_REQUEST[name]";

    $test = mail($recipient, $subject, $message, $header);

    if ($test == 1) {
        echo "Your email was sent.";
    } else {
        echo "Error.";
    }
}

?>

<br><br><br><br>
<div class="company-container">

    <form>
        <h1>"Check out <?php echo $_REQUEST[company]; ?> on Goods!"</h1>
        Name: <input class="form-control" type="text" name="name"><br>
        Recipient: <input class="form-control" type="text" name="email"><br>
        Message: <textarea class="form-control" name="message">Goods is a website that grades companies on their ethical practices. <?php echo $_REQUEST[company]; ?> got a grade of <?php echo $_REQUEST[grade]; ?>, and I think you should check out the breakdown on why!</textarea><br>
        <br><input class="btn btn-success" type="submit" value="Send!">
    </form>


</div>
</body>
</html>