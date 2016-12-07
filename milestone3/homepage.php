<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Homepage</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/milestone2.css">
    </head>
    <body>
    <?php include_once("analyticstracking.php") ?>
    <?php include 'navigation.php';?>
    <div class="milestone1">
    </div>
    <div class="hero">
      <div class="spotlight">
        <div class="row">
          <div class="col-md-7">
            <img class="houdini" src="../images/spotlight-toms.png">
              <h1><strong><em>Goods</em></strong> Weekly Company Spotlight</h1>
                <p>Each bag of TOMS Roasting Co. coffee provides 140 liters of safe water, equal to a week's supply, to a person in need.</p>
                <form method="get" action="http://bstanfie.student.uscitp.com/milestones/milestone2/admin_hub.php">
                  <button type="submit" class="btn btn-success">See TOMS in our database</button>
                </form>
          </div>
          <div class="col-md-5">
            <img class="show" src="../images/spotlight-toms.png">
          </div>
        </div>
      </div>
    </div>
      <div class="container">
        <div class="intro">
          <img src="../images/goods.png">
          <h1>Welcome to <strong>Goods</strong></h1>
          <p>Goods is a database that stores and categorizes companies by ethical and unethical business practices.</p>
          <form method="get" action="http://bstanfie.student.uscitp.com/milestones/milestone2/admin_hub.php">
            <button type="submit" class="btn btn-success">View our company search</button>
          </form>
        </div>
      </div>
  <div class="section-split"></div>
    <div class="container">
      <div class="intro">
        <h1>The Process</h1>
          <div class="row">
            <div class="col-md-4">
              <div class="panel">
              </div>
              <h3>Shop</h3>
              <p>Shop like you normally would. No need to think about Goods just yet.</p>
            </div>
            <div class="col-md-4">
              <div class="panel">
              </div>
              <h3>Look</h3>
              <p>Compare what’s in your cart with what companies we recommend.</p>
            </div>
            <div class="col-md-4">
              <div class="panel">
              </div>
              <h3>Learn</h3>
              <p>Find out what brands you should and shouldn’t be buying from!</p>
            </div>
          </div>
      </div>
    </div>
  <div class="section-split"></div>
    <div class="container">
      <div class="intro">
        <h1>The Extension</h1>
          <p>Download the <strong>Goods Chrome Extension</strong> from the Google Play Store to compare items faster (coming soon).</p>
          <button class="btn btn-success">Download Extension</button>
      </div>
    </div>
    <div class="footer">
    </div>
    </body>
</html>
