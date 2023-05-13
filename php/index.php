<?php
    
    // error_reporting(0);
    
    require('config.php');

    $con = getdb();

    if(isset($_POST['submit']))
    {
        
        $enrollment_no = $_POST['user_id'];

        $sql = "Select * from student where enrollment_no = '$enrollment_no'";

        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) == 1)
        {
            session_start();
            $_SESSION['user_id'] = $_POST['user_id'];
            $_SESSION['role'] = "STUDENT";

            header('Location:student_dashboard.php');
        }
        else
        {
            echo "<script>alert('Invalid username')</script>";
        }
    }

    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Page</title>
    <link rel = "stylesheet" href = "login_form.css">
    <link rel = "stylesheet" href = "navbar.css">
    </style>
</head>

<body>


<header>

        <div class = "header" style = "justify-content : flex-start;">

            <div class = "logo">
                <img src="bgi_logo.png" alt="">
            </div>

            <div class = "heading" >
                <h1 >SUSHILA DEVI BANSAL COLLEGE INDORE</h1>        
                <h2 >ONLINE FEEDBACK PORTAL</h2>
            </div>
        </div>
        
        
        
</header>


    <br>
    <br>
            <div class = "container">
            <form action = "index.php" method = "post">
                
                
                <img id = "student_img" src="avatar.png" alt="student">
                
                <br>
                
                <big><b><p style = "text-align: center;">Student Login Area</p></b></big><br>

                <div class="box">
                    <span style = "color: red">*</span>

                    <input type="text" id ="user_id"  name = "user_id" placeholder = "User ID" required>

                </div>

                <br>
                <input class = "btn" type="submit" value = "LOGIN" name = "submit"><br>
                <br>
                
            </form>
        </div>
</body>
</html>

