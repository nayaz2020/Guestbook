<?php

/* confirmation.php


 */

// Turn on error reporting

ini_set('display_errors', 1);

error_reporting(E_ALL);

//dbreds.php
// Connect to database

//redirect if the form has not been submited
if(empty($_POST)){
   header("location: guestbook.php");
}
//Set the time zone
date_default_timezone_set('America/Los_Angeles');

//Include header file
include('head.html');
include('dbcreds.php');
?>

<body>

<div class="container" id="main">

    <!-- Jumbotron header -->

    <div class="jumbotron">
        <h5><a href="orders.php" class="admin text-dark"> <span class="admin"></span> Admin Page </a></h5><br>
        <h1 class="display-3">Thanks you</h1>

    </div>

    <h2> Summary Report</h2>

    <?php

    // Get Data From Post Array
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $job = $_POST['title'];
    $company = $_POST['cname'];
    $email = $_POST['email'];
    $link = $_POST['linked'];
    $fromName = $fname." ".$lname;
    $fromName = 'Nemat'; // getting email from the form on kentOutReach "$_post..."
    $fromEmail = 'nematullah_ayaz@yahoo.com'; // post email "getting email from the form"


    // Save request to Database
    $sql = "INSERT INTO guestbook(`fname`, `lname`, `job`, `company`, `email`) VALUES 
('$fname','$lname','$job','$company','$email')";
    $success = mysqli_query($cnxn, $sql);
    if (!$success){
        echo"<p>Sorry... something went wrong<p>";
        return;
    }

    // Print Guestbook Summary Report

    echo"<p> Name: $fname $lname</p>";
    echo"<p> Job title: $job</p>";
    echo"<p> Company: $company</p>";
    echo"<p> Email: $email</p>";



    //sent Email
    $to = "nematullah_ayaz@yahoo.com";
    $subject = "A message from Guestbook";
    $headers = "Name: $fromName <$fromEmail\r\n>";
    $message = "Company: $company\r\n";
    $message = "Tob Title: $job";
    $message = "from $fname $lname\r\n";

    // Sheck success
    $success = mail($to, $subject, $message, $headers);
    //Shortcut
        echo $success ? "<p>Your order has been placed.</p>" :
             "<p>Sorry... there was a problem.</p>";


    ?>

</div>

</body>


