<!--PAGE FOR ADMIN LOGIN-->
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

    <!--navbar-->
    <div class="topnav">
        <a href="index.html">Home</a>
        <a href="Checkavailability.php">Check Availability</a>
        <a href="Registration.php">Registration</a>
        <a href="Login.php">Login</a>
        <a href="Request.php">Request</a>
        <a href="Contact.php">Contact</a>
    </div><br>

    <!--form-->
    <div class="container" >
        <div class="col-md-12">
            <div class="row w3-border-bottom">
                <div><h1 style="text-align: center;">Admin Login</h1></div>
            </div><br>
            <form action="logindone.php" method="post" style="margin-left: 240px;width: 70%;">
                <div class ="row">
                    <div class="col-md-6" style="margin-left: auto;margin-right: auto;background-color: #f6f6f6;padding: 20px;border-radius: 5px;border:5px; width:80%; font-size:25px;">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn" name="login">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br><br><br><br><br>

    <!--footer-->
    <footer class="foo" style='margin-top:85px'>Donate Blood, Save Life</footer>

    </body>
</html>