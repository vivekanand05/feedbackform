<?php
    error_reporting(0);
    session_start();
    
    if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
    {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel = "stylesheet" href = "navbar.css">
    <link rel = "stylesheet" href = "style.css">
    
    <style>
        .container1{
            display: flex;
            min-height:60vh;
            margin: 10px;
            justify-content: space-around;
            align-items: center;
            margin: 10px;
        }

        .navbar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 6vh;
            background-color: rgb(251, 157, 157);
            margin: 10px;
        }

        li {
            list-style: none;
            background: white;
            color: black;
            padding: 3px;
            border-radius: 10px;
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

            </div>
            
            
            
    </header>

    <br>
    
    <h2 style = "text-align: center; word-spacing: 3px;">ADMIN DASHBOARD</h2>

    <nav>
        <div class="head">
            <ul class="navbar">

            <a href="admin_dashboard_subject.php">
                    <li>Subject</li>
                </a>

                <a href="admin_dashboard_faculty.php">
                    <li>Faculty</li>
                </a>

                <a href="admin_dashboard_session.php">
                    <li>Academic Session</li>
                </a>
                
                <a href="admin_dashboard_student.php">
                    <li>Student</li>
                </a>
                
                <a href="admin_change_password.php">
                    <li>Change Password</li>
                </a>

            </ul>
        </div>
    </nav>


    <div class="container1">

    <div style="text-align:center;"><a href="view_student.php"><img class="icon" src="view.png" alt=""></a><p>View Student</p></div>

    </div>
            
</body>
</html>

