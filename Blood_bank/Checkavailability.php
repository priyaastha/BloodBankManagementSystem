<!--PAGE TO SHOW THE LIST OF DONORS AND SEARCH THE DONORS BY PINCODE, CITY, BLOOD GROUP-->
<!DOCTYPE html>
<html lang="en">
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

        <!--navbar-->
        <div class="topnav">
            <a href="index.html">Home</a>
            <a href="Checkavailability.php">Check Availability</a>
            <a href="Registration.php">Registration</a>
            <a href="Login.php">Login</a>
            <a href="Request.php">Request</a>
            <a href="Contact.php">Contact</a>
        </div>
        <br><br>

        <div class="container" >
            <div class="col-md-12">
                <form action="search.php" method="post">
                    <div class="form-group" style="width:40%;margin-left:2.4%;">
                        <select name="city" class="form-control input-lg" style='font-size:20px;'>
                            <option value="" disabled selected>Select a City</option>
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
                    <div class="form-group" style="width:40%;margin-left:5%;margin-left:44%;margin-top:-5.2%;">
                        <select name="bloodgroup" class="form-control input-lg" style='font-size:20px;'>
                            <option value="" disabled selected>Select a Blood Group</option>
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
                    <button type="submit" class="btn" style="margin-left:85%;margin-top:-7.7%;background-color:#8c1406;font-size:20px;color:white;padding:6px 10px;" name='search' >Search</button>
                </form>
            </div>
        </div>

        <!--php code to show list of donors-->
        <?php
            //connecting with database
            require('dbconnect.php');
        
            //to retrieve data from table
            $check='select * from donors';

            //to execute the query
            $q=mysqli_query($connect,$check);

        //to print the table
            //table head
            echo "  <center><table id='myTable' class='table table-striped table-bordered' style='width:50%;'>
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
                            </tr>
                        </thead>";

            //to fetch from database and print in the table
            while($row=mysqli_fetch_array($q)){
                echo("<tr style='font-size:18px;'><th>" .$row['Name']."</th><th>".$row['Gender']."</th><th>".$row['DoB']."</th><th>".$row['Bloodgroup']."</th><th>".$row['Weight']."</th><th>".$row['City']."</th><th>".$row['Pincode']."</th><th>".$row['Mobile']."</th><th>".$row['Email'].'<br><br>');
            }
            echo "</table></center>";
        ?>

        <!--footer-->
        <footer class="foo">Donate Blood, Save Life</footer>
        
    </body>
</html>