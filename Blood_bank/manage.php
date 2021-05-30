<!DOCTYPE html>
<html lang='en'>
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

<?php

    //to connect with database
    require('dbconnect.php');

    //if Donor button is pressed
    if(isset($_POST['donorm'])){
        
        //show choices to admin
        echo "<center><div style=';margin-top:50px ;background-color:#f6f6f6; padding:20px 20px ;border-radius:5px ;border:5px ;width:50%; font-size:25px;'>
                <h1>DONORS' SECTION</h1><br>
                <div>
                    <a href='donorsee.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 24px;border-radius:3px;'>View Donors</a><br><br>
                    <a href='donoradd.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 33px;border-radius:3px;'>Add Donor</a><br><br>
                    <a href='donorremove.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 12px;border-radius:3px;'>Remove Donor</a><br><br>
                    <a href='donorupdate.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 16px;border-radius:3px;'>Update Donor</a><br><br>
                </div>
            </center>";
    }

    //if request button is pressed
    else if(isset($_POST['requestm'])){

        //show choices to admin
        echo "<center><div style=';margin-top:50px ;background-color:#f6f6f6; padding:20px 20px ;border-radius:5px ;border:5px ;width:50%; font-size:25px;'>
                <h1>REQUESTS' SECTION</h1><br>
                <div>
                    <a href='requestsee.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 24px;border-radius:3px;'>View Requests</a><br><br>
                    <a href='requestremove.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 12px;border-radius:3px;'>Remove Request</a><br><br>
                </div>
        </center>";
    }

    //if donation button is pressed
    if(isset($_POST['donationm'])){
        
        //show choices to admin
        echo "<center><div style=';margin-top:50px ;background-color:#f6f6f6; padding:20px 20px ;border-radius:5px ;border:5px ;width:50%; font-size:25px;'>
                <h1>DONATIONS' SECTION</h1><br>
                <div>
                    <a href='donationsee.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 24px;border-radius:3px;'>View Donations</a><br><br>
                    <a href='donationadd.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 33px;border-radius:3px;'>Add Donation</a><br><br>
                </div>
            </center>";
    }

    //if donee button is pressed
    if(isset($_POST['doneem'])){
        
        //show choices to admin
        echo "<center><div style=';margin-top:50px ;background-color:#f6f6f6; padding:20px 20px ;border-radius:5px ;border:5px ;width:50%; font-size:25px;'>
                <h1>DONEES' SECTION</h1><br>
                <div>
                    <a href='doneesee.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 24px;border-radius:3px;'>View Donees</a><br><br>
                    <a href='doneeadd.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 33px;border-radius:3px;'>Add Donee</a><br><br>
                </div>
            </center>";
    }

    if(isset($_POST['contactm'])){
        
        //show choices to admin
        echo "<center><div style=';margin-top:50px ;background-color:#f6f6f6; padding:20px 20px ;border-radius:5px ;border:5px ;width:50%; font-size:25px;'>
                <h1>MESSAGES' SECTION</h1><br>
                <div>
                    <a href='msgsee.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 24px;border-radius:3px;'>View Messages</a><br><br>
                    <a href='msgremove.php' style='background-color:#8c1406;font-size:25px;color:white;padding:12px 12px;border-radius:3px;'>Remove Messages</a><br><br>
                </div>
            </center>";
    }
?> 

</html>