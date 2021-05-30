<!DOCTYPE html>
<html>
    <head>
        <title>Receipt</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--php code starts-->
<?php

    //to connect with database
    require('dbconnect.php');

    //if register button is clicked
    if(isset($_POST['register'])){

        //to fetch data from form
        $name = $_POST['name'];
        $bloodgroup = $_POST['bloodgroup'];
        $date = $_POST['date'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        
        //query to insert data into donors table in db
       $writ = "INSERT INTO donations(Name , Bloodgroup , Date , City , Pincode) VALUES ('$name', '$bloodgroup', '$date' , '$city' , '$pincode')";

        //to add data in table and show success message
        if($connect->query($writ))
            echo "<html>
                    <body style='float:top;'>
                    <div class='alert alert-success alert-dismissible'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Success!</strong> Donation added.
                    </div>
                    </body>
                </html>";    
    
?>
        <!--Receipt generated-->
        <style>
            /*styling for the page*/
            .fancy {
                padding : 1em;
                width: 60%;
                height: 600px;
                box-sizing: border-box;
                margin-left: 300px;
                padding: 16px 25px;
                background-color: #E4E4D9;

                /*To stack linear gradients on top of each other to create color strip effect.*/
                background-image: linear-gradient(175deg, rgba(0,0,0,0) 95%, #8da389 95%),
                                    linear-gradient( 85deg, rgba(0,0,0,0) 95%, #8da389 95%),
                                    linear-gradient(175deg, rgba(0,0,0,0) 90%, #b4b07f 90%),
                                    linear-gradient( 85deg, rgba(0,0,0,0) 92%, #b4b07f 92%),
                                    linear-gradient(175deg, rgba(0,0,0,0) 85%, #c5a68e 85%),
                                    linear-gradient( 85deg, rgba(0,0,0,0) 89%, #c5a68e 89%),
                                    linear-gradient(175deg, rgba(0,0,0,0) 80%, #ba9499 80%),
                                    linear-gradient( 85deg, rgba(0,0,0,0) 86%, #ba9499 86%),
                                    linear-gradient(175deg, rgba(0,0,0,0) 75%, #9f8fa4 75%),
                                    linear-gradient( 85deg, rgba(0,0,0,0) 83%, #9f8fa4 83%),
                                    linear-gradient(175deg, rgba(0,0,0,0) 70%, #74a6ae 70%),
                                    linear-gradient( 85deg, rgba(0,0,0,0) 80%, #74a6ae 80%);
            }
        </style>    
    </head>

    <body>
        <!--receipt-->
        <div class="fancy">
            <center><h1 style='color:#8c1406;font-family: Arial, Helvetica, sans-serif;'><b>THANKS OUR HERO</b></h1></center><br>
            <h4 style='font-size:20px;color:#1f1f14;font-family: Arial, Helvetica, sans-serif;'><b>Thank you for your gift! <br>
            This receipt is an attestation that we have gratefully received your generous contribution to our humble institution. 
            Keep this receipt to remember your good deed.
            Someone is going to be really happy for the blood you have donated. </b></h4><br><br>
            
<?php
    //To print the data of donation in the page
    echo "<h3><b>Donor's Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$name."<br>
            Donor's City : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$city."  ".$pincode."<br>
            Blood Group : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$bloodgroup."<br>
            Date Received : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$date."</b></h3>";

//closing of if(isset($_POST['register'])){
}
?>
        <!--Thank you icon-->
        <img src='thank.png' style='width:30%;margin-left:500px;margin-top:-30px;'>
    </div>

        <!--Button that enables printing when clicked-->
        <button class="btn btn-primary hidden-print" onclick="window.print()" style='margin-top:-1200px;margin-left:93%'>
        <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
        
    </body>
</html>
