<?php
    error_reporting(0);

    session_start();

    if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
    {
        header('Location: index.php');
    }

    require('config.php');
        
    $con = getdb();

    if(!$con)
    {
        die("Connection failed: ".$con -> connect_error);
    }

    $message = "";

    if(isset($_POST['submit']))
    {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $admin_email = $_SESSION['user_id'];


        $sql = "SELECT * FROM `admin` WHERE `admin_email` = '$admin_email' AND  `password` = '$old_password'";

        $res = $con -> query($sql);

        if(mysqli_num_rows($res) == 1)
        {

            if($new_password === $confirm_password)
            {
                $sql1 = "UPDATE `admin` SET `password`='$new_password' WHERE `admin_email` = '$admin_email'";

                $res1 = $con -> query($sql1);

                if($res1)
                {
                    $message = "<p style = 'color: green;'>Password updated sucessfully</p>";
                }
            }
            else
            {
                $message = "<p style = 'color: red'>New Password and Confirm Password do not match</p>";
            }
        }
        else
        {
            $message = "<p style = 'color: red'>Incorrect Old Password</p>";
        }

    }

?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel = "stylesheet" href = "login_form.css">
    <link rel = "stylesheet" href = "navbar.css">


    <style>

        .container{

            width: 300px;
            height: 400px;
            border: 2px solid black;
            background-color: white;
            text-align: center;
            margin: auto;
        }

        #old_password, #new_password, #confirm_password{

            width: 90%;
            height: 70%;
            margin-top: 5px;
            border : none;
            padding: 2px;
        }

        #dashboard{
            width: 110px;
            height: 20px;
            border-radius: 10px;
            background-color:rgb(112, 224, 112);
            padding: 2px;
            word-spacing: 1px;
            text-align: center;
        }

    </style>
</head>
<body>
    <header>

        <div class = "header">

            <div class = "logo">
                <img src="bgi_logo.png" alt="">
            </div>

            <div class = "heading">
                <h1 >SUSHILA DEVI BANSAL COLLEGE INDORE</h1>        
                <h2 >ONLINE FEEDBACK PORTAL</h2>
            </div>

            <div class = "button">
                    <a class = "signout" href='signout.php'>SIGN OUT</a>
            </div>

            <div class = "button">
                    <a id = "dashboard" href='admin_dashboard_subject.php'>DASHBOARD</a>
            </div>

        </div>
            
    </header>

    <br>
    <br>
            <div class = "container" >
            <form action = "admin_change_password.php" method = "post">
                
                <h4 style = "color: rgb(139, 221, 253);">ADMIN UPDATE PASSWORD</h4>
                
                
                <br>
                
                <div class="box">
                    <span style = "color: red">*</span>

                    <input type="password" id ="old_password"  name = "old_password"  maxlength = "20" placeholder = "Old Password" required>

                </div>
                
                <div class="box">
                    <span style = "color: red">*</span>

                    <input type="password" id ="new_password"  name = "new_password"  maxlength = "20" placeholder = "New Password" required>

                </div>

                <div class="box">
                    <span style = "color: red">*</span>

                    <input type="password" id ="confirm_password"  name = "confirm_password"  maxlength = "20" placeholder = "Confirm Password" required>

                </div>
                
                <br>

                <input class = "btn" type="submit" value = "Save" name = "submit"><br>

                <br>
                <br>

                <?php
                echo $message;
                ?>

            </form>
        </div>

</body>
</html>