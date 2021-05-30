<?php

    //to connect with database
    require('dbconnect.php');

    //if login button is pressed
    if(isset($_POST['login'])){

        //fetch data from form
        $email=$_POST['email'];
        $password=$_POST['password'];
    
        //to retrieve data that has email and password same as that in form
        $query="select * from admins where Email='$email' and Password='$password'";

        //to execute the query
        $q = mysqli_query($connect,$query);

        //to count number of rows for the query 
        $row=mysqli_num_rows($q); 

        //if such data exists
        if($row>0){
            
            //show page 
            echo "  <!DOCTYPE html>
                    <html>
                        <head>
                            <title>Admin Page</title><link rel='stylesheet' href='style_donors.css'>
                            
                            <style>
                                .card {
                                    box-shadow: 0 4px 8px 0 grey;
                                    transition: 0.3s;
                                    width: 25%;
                                    margi
                                }
                                .card:hover {
                                    box-shadow: 0 20px 20px 0 grey;
                                }
                            </style>
                        </head>

                        <body>
                        <center><h1 style='background-color:#8c1406;color:white;font-size:50px;margin-top:-10px;margin-left:-10px;width:101.5%;border-bottom:7px solid #360b07;'>Welcome to the donor management system<h1></center>       
                        <div class='topnav' style='margin-top:-40px;width:101.5%;margin-left:-10px;'>
                            <table>
                                <form action='manage.php' method='POST'>
                                    <input type='submit' value='Donors' name='donorm' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 25px;border:none;font-size:25px;'>
                                    <input type='submit' value='Requests' name='requestm' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 25px;border:none;font-size:25px;'>
                                    <input type='submit' value='Donations' name='donationm' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 25px;border:none;font-size:25px;'>
                                    <input type='submit' value='Donee' name='doneem' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 25px;border:none;font-size:25px;'>
                                    <input type='submit' value='Messages' name='contactm' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 25px;border:none;font-size:25px;'>
                                </form>
                                <form action='Login.php' method='POST'>
                                    <input type='submit' value='Log Out' name='logout' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 25px;border:none;font-size:25px;'>
                                </form>
                            </table>
                        </div>

                        <br>
                        <center>
                        <div class='card'>
                            <img src='icon.jpg' alt='Icon' style='width:100%'> 
                            <div class='container' style='padding: 10px 16px;background-color: #ffe0cc;'>
                                <h1><b>Welcome to donor management system<br></b></h1>
                                <table>
                                <form action='manage.php' method='POST'>
                                </form>

                                <form action='login.php' method:'POST'>
                                    <input type='submit' value='Log Out' name='logout' style='background-color:#8c1406;font-size:15px;color:white;padding:12px 14px;border:2px solid black;'>
                                </form>
                                ";
                        
                        //to fetch the data of admin with the email id and password used to login
                        while($row=mysqli_fetch_array($q)){        
                            echo "<h3 style='margin-left:-110px;'>Name : ".$row['Name']."</h3>
                                  <h3 style='margin-left:10px;'>Email ID : ".$row['Email']."</h3>
                                  <h3 style='margin-left:-80px;'>Mobile :".$row['Mobile']."</h3> 
                                  <h3 style='margin-left:-20px;'>Joining Date : ".$row['Join_date']."</h3>
                                  <h3 style='margin-left:-20px;'>Logged in : ".date('Y/m/d') . " " . date('h:i:sa')."</h3>
                                </div>
                            </div>
                            </center>
                            ";
                        }
                echo"</body>
                </html>";
        }

        //if no such data exists, show an error message
        else{
            echo "<html>
                    <style>
                        body {
                            text-align: center;
                            padding: 40px 0;
                            background: #EBF0F5;
                        }
                        h1 {
                        color: #800000;
                        font-family: 'Nunito Sans', 'Helvetica Neue', sans-serif;
                        font-weight: 900;
                        font-size: 40px;
                        margin-bottom: 10px;
                        }
                        p {
                        color: #404F5E;
                        font-family: 'Nunito Sans', 'Helvetica Neue', sans-serif;
                        font-size:20px;
                        margin: 0;
                        }
                        i {
                            color: #800000;
                            font-size: 250px;
                            line-height: 200px;
                            margin-left:-15px;
                        }
                        .card {
                            background: white;
                            padding: 60px;
                            border-radius: 4px;
                            box-shadow: 0 2px 3px #C8D0D8;
                            display: inline-block;
                            margin: 0 auto;
                        }
                    </style>
                    <body>
                        <div class='card'>
                            <div style='border-radius:200px; height:200px; width:200px; background: #FFA07A; margin:0 auto;'>
                                <i class='checkmark'>×</i>
                            </div>
                            <h1>OOPS!</h1> 
                            <h4>Invalid Username or Password</h4>
                            <p>Please contact the head department if you lost your password</p>
                        </div>
                        <br><br><br>
                        <a href='Login.php' style='background-color:#8c1406;font-size:15px;color:white;padding:20px 25px;margin-left:10px;text-decoration:none;border-radius:4px;'>Go To Login Page</a>
                    </body>
                </html>";
        }
    }
?>