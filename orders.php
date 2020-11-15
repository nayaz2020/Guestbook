<?php

/* reports form guestbook

 * Nematullah Ayaz Akhunzad

 */

// Turn on error reporting

ini_set('display_errors', 1);

error_reporting(E_ALL);


//var_dump($cnxn);
include ('head.html');
include ('dbcreds.php');
?>

<body>
<div class="jumbotron text-center bg-info" style="margin-bottom:0">
    <h4><a href="guestbook.php" class="guestbook text-light "><img src="images/back.jpeg" class="retun-img" alt="back"><span class="guestbook"></span> Guestbook </a></h4>
    <h1><br>Guestbook Report Summary</h1>

</div>

 <div class="container" id="main">
<br>
    <h3>Report Summary</h3>
    <table id="order-table" class="display" style="width:100%">
        <thead>
        <tr>
          <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Job</td>
            <td>Email</td>
            <td>Date</td>
        </tr>
        </thead>
        <tbody>

        <?php


$sql = "SELECT * FROM guestbook";
$result = mysqli_query($cnxn,$sql);

foreach ($result as $row) {

    $order_id = $row['order_id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $job = $row['job'];
    $email = $row['email'];
    //$linkedin = $row['linkedin'];
    $order_date = date("M d, Y g:i a", strtotime($row['order_date']));

    echo "<tr>";
    echo "<td>$order_id</td>";
    echo "<td>$fname</td>";
    echo "<td>$lname</td>";
    echo "<td>$job</td>";
    echo "<td>$email</td>";
   // echo "<td>$linkedin</td>";
    echo "<td>$order_date</td>";
    echo "</tr>";
}


 ?>
        </tbody>
    </table><br>
</div>
<!-- Footer -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="scripts/guest.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
   $('#order-table').DataTable();
</script>
<footer class="container-fluid bg-info text-center "><br>
    <h3></h3><br>
    <div class="item active"><br>
    </div>
</footer>
</body>

