<!DOCTYPE html>
<html>
    <head>
        <title>Blood Bank</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style_donors.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

    <body>
    <!--welcome text-->
    <center><h1 style='background-color:#8c1406;color:white;font-size:50px;margin-top:-10px;margin-left:-10px;width:101.5%;border-bottom:6px solid #360b07;'>Welcome to the donor management system<h1></center>       
        
    <!--navigation bar--> 
    <div class='topnav' style='margin-top:-10px;width:101%;margin-left:-10px;'>
        <table>
            <form action='manage.php' method='POST'>
                <input type='submit' value='Donors' name='donorm' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 14px;border:none;font-size:25px;'>
                <input type='submit' value='Requests' name='requestm' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 14px;border:none;font-size:25px;'>
                <input type='submit' value='Donations' name='donationm' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 14px;border:none;font-size:25px;'>
                <input type='submit' value='Donee' name='doneem' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 14px;border:none;font-size:25px;'>
                <input type='submit' value='Messages' name='contactm' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 14px;border:none;font-size:25px;'>
            </form>
            <form action='Login.php' method='POST'>
                <input type='submit' value='Log Out' name='logout' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 25px;border:none;font-size:25px;'>
            </form>
        </table>
    </div><br>

    <!--heading-->
    <center><h1>DONORS AND THEIR INFORMATION</h1>"

<!--php code starts-->
<?php

    //to connect with database
    require('dbconnect.php');

    //retrieve data from donors table in db
    $check='select * from donors';

    //to execute the query
    $q=mysqli_query($connect,$check);

        //to ptint the table
        echo "  <table id='myTable' class='table table-striped table-bordered' style='width:80%;margin-top:-220px;'>
                    <thead style='font-size:20px; background-color:#730000;color:white;'>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>DoB</th>
                            <th>Blood Group</th>
                            <th>Weight</th>
                            <th>City</th>
                            <th>Pincode</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>";
        //to fetch data row by row
        while($row=mysqli_fetch_array($q)){
            echo("<tr style='font-size:18px;'><th>" .$row['Name']."</th><th>".$row['Gender']."</th><th>".$row['DoB']."</th><th>".$row['Bloodgroup']."</th><th>".$row['Weight']."</th><th>".$row['City']."</th><th>".$row['Pincode']."</th><th>".$row['Mobile']."</th><th>".$row['Email']."</th><th>".$row['Status'].'</th><br><br>');
        }
        //table closed
        echo "</table>";
?>

</html>
