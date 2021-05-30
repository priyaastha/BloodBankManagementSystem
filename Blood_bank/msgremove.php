<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blood Bank</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style_donors.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

    <body>
    <!--welcome text-->
    <center><h1 style='background-color:#8c1406;color:white;font-size:50px;margin-top:-10px;margin-left:-10px;width:101.5%;border-bottom:6px solid #360b07;'>Welcome to the donor management system<h1></center>       
        
    <!--navigation bar--> 
    <div class='topnav' style='margin-top:-25px;width:101%;margin-left:-10px;'>
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
    
<!--php code starts-->
<?php

    //to connect with database
    require('dbconnect.php');

    //if remove button is pressed
    if(isset($_POST['removed'])){

      //fetch email from form
      $msgid = $_POST['msgid'];
  
      //retrieve data with given email
      $exist="select * from contact where Msgid = '$msgid' ";

      //query to delete the row with that email
      $q="delete from contact where Msgid = '$msgid' ";
  
      //to execute the query
      $qt=mysqli_query($connect,$exist);

      //to delete and print success message
      if($connect->query($q)){
      echo "<html>
              <body style='float:top;'>
                <div class='alert alert-success alert-dismissible'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> Data removed.
                </div>
              </body>
          </html>";
      } 
   }
?>
  
      <!--form-->
      <div class="container" >
          <div class="col-md-12">
              <div class="row w3-border-bottom">
                  <div><h1 style="text-align: center;">Remove Messages</h1></div>
              </div>
              <form action="msgremove.php" method="post" style="margin-left: 300px;width:80%;">
                  <div class ="row">
                      <div class="col-md-6">
                          <div class="col-md-10" >
                              <div class="form-group">
                                  <label for="msgid">Message ID</label>
                                    <select name="msgid" class="form-control input-lg">
                                    <!--php code to show id of messages as options from db-->
                                    <?php
                                      //to retrieve data from contact table
                                      $extract="select * from contact";

                                      //to execute the query
                                      $q = mysqli_query($connect , $extract);

                                      //count no. of rows
                                      $r = mysqli_num_rows($q);

                                      //to get all the msgid as option
                                      while($row=mysqli_fetch_assoc($q)){
                                        $id=$row['Msgid'];
                                        echo "<option value='$id'>$id</option>";
                                      }                                      
                                    ?>
                                    </select>
                              </div>
                              <button type="submit" class="btn" style="margin-left:70px;" name='removed' >Remove Message</button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
    </body>
</html>