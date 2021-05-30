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

    //if selected button is pressed
    if(isset($_POST['selected'])){
        $email = $_POST['email'];
        $extract="select * from donors where Email='$email'";
        $q = mysqli_query($connect , $extract);
        $r = mysqli_num_rows($q);
        $row=mysqli_fetch_assoc($q);
?>

<!--form-->
<div class="container" >
    <div class="col-md-12">
        <div class="row w3-border-bottom"><div><h1 style="text-align: center;">Donor Registration</h1></div></div>
        <form action="donorupdate.php" method="post" style="margin-left: 240px;margin-right:80px;width: 100%;">
            <div class ="row">
                <div class="col-md-6">
                    <div class="col-md-10" >
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control input-lg" id="name" name="name"  required value=<?php echo $row['Name']?> >
                        </div>
                        <div class="form-group">
                                <label>Gender</label><br>
                                <input type="radio" name="gender" value="m" required> Male &nbsp;&nbsp;
                                <input type="radio" name="gender" value="f" required> Female
                            </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control input-lg" id="DoB" name="DoB" required value=<?php echo $row['DoB']?> >
                        </div>
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select name="bloodgroup" class="form-control input-lg" >
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Weight</label>
                            <input type="number" class="form-control input-lg" id="weight" name="weight" value=<?php echo $row['Weight']?> required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select name="city" class="form-control input-lg" >
                            <option value="Alappuzha">Alappuzha</option>
                            <option value="Ernakulam">Ernakulam</option>
                            <option value="Idukki">Idukki</option>
                            <option value="Kannur">Kannur</option>
                            <option value="Kasaragod">Kasaragod</option>
                            <option value="Kollam">Kollam</option>
                            <option value="Kottayam">Kottayam</option>
                            <option value="Kozhikode">Kozhikode</option>
                            <option value="Mallapuram">Mallapuram</option>
                            <option value="Palakkad">Palakkad</option>
                            <option value="Pathanamthitta">Pathanamthitta</option>
                            <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                            <option value="Thrissur">Thrissur</option>
                            <option value="Wayanad">Wayanad</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pincode</label>
                            <input type="number" class="form-control input-lg" maxlength="6" id="pincode" name="pincode" value=<?php echo $row['Pincode']?> required>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="number" class="form-control input-lg" maxlength="10" id="mobile" name="mobile" value=<?php echo $row['Mobile']?> required>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control input-lg" id="email" name="email" value=<?php echo $row['Email']?> disabled>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control input-lg" id="status" name="status" value=<?php echo $row['Status']?> required>
                        </div>
                        <button type="submit" class="btn" name="updated" style='margin-left:130px;'>Update Donor</button>
                    </div>
                </div>
            </div>
        </form>

<?php } ?>

        </div>
    </div>
    </body>
</html>