<!--PAGE FOR PEOPLE TO POST REQUEST OF THEIR BLOOD REQUIREMENT-->
<!DOCTYPE html>
<html lang='en'>
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

    <!--navbar-->
    <div class="topnav">
        <a href="index.html">Home</a>
        <a href="Checkavailability.php">Check Availability</a>
        <a href="Registration.php">Registration</a>
        <a href="Login.php">Login</a>
        <a href="Request.php">Request</a>
        <a href="Contact.php">Contact</a>
    </div><br>

<?php

    //to connect with database
    require('dbconnect.php');

    //if request button is pressed
    if(isset($_POST['request'])){

        //to fetch data from form
        $name = $_POST['name'];
        $bloodgroup = $_POST['bloodgroup'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        //format for date
        $DoB = date("Y-m-d");

        //query to insert into table
        $write = "INSERT INTO requests(Name,Bloodgroup,City,Pincode,Mobile,Email) VALUES ('$name', '$bloodgroup', '$city', '$pincode', '$mobile', '$email')";

        //retrieve data which has email same to the email written in form
        $duplicate="select * from donors where Email='$email'";

        //to execute the query
        $q=mysqli_query($connect,$duplicate);

        //to find number of rows of that query
        $r=mysqli_num_rows($q);
        
        //if number of rows > 0 i.e., if there already exists such email
        if($r>0){

            //print a warning message 
            echo "  <html>
                        <body style='float:top;'>
                            <div class='alert alert-danger alert-dismissible'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Warning!</strong> Request already exists with the given EmailID. Please contact us if urgent.
                            </div>
                        </body>
                    </html>";
        }

        //if no such email is registered
        else{

            //if connection for this doesn't fail, execute the query
            if($connect->query($write))

                //print successfully registered
                echo "  <html>
                            <body>
                            <div class='alert alert-success alert-dismissible'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Your request is posted. We will try to help you as soon as possible.
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
                <div><h1 style="text-align: center;">Post a Request</h1></div>
            </div>
            <form action="Request.php" method="post" style="margin-left: 240px;width: 100%;">
                <div class ="row">
                    <div class="col-md-6">
                        <div class="col-md-10" >
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control input-lg" id="name" name="name" placeholder="Enter Name" required>
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
                                <label>City</label>
                                <select name="city" class="form-control input-lg">
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
                                <input type="number" class="form-control input-lg" maxlength="6" id="pincode" name="pincode" placeholder="Enter pincode" required>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="number" class="form-control input-lg" maxlength="10" id="mobile" name="mobile" placeholder="Enter mobile number" required>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <button type="submit" class="btn" name="request" style='margin-left:180px;'>Post</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>

    <!--footer-->
    <footer class="foo">Donate Blood, Save Life</footer>

    </body>
</html>