<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "student_feedback_db";

    $con = new mysqli($servername, $username, $password, $database);

    if (!$con) {
        die("Connection failed: " . $con ->connect_error);
    }

    session_start();
    
    if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
    {
        header('Location: index.php');
    }

    $message = " ";

    if(isset($_POST['submit']))
    {
        $faculty_email = $_POST['faculty_email'];

        $faculty_name = $_POST['faculty_name'];
        

        $sql = "INSERT INTO `faculty`(`faculty_email`, `name`) VALUES ('$faculty_email','$faculty_name');";

        try
        {
            $con -> query($sql);
            $message = "<p style = 'color : green'>Inserted Faculty Sucessfully</p>";
        }
        catch(exception)
        {
            $message = "<p style = 'color : red'>Error !!! Duplicate Entry</p>";
        }
    }

    $con -> close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Faculty</title>
    <!-- <link rel = "stylesheet" href = "login_form.css"> -->
    <link rel = "stylesheet" href = "navbar.css">
    <link rel = "stylesheet" href = "style.css">
    
    <style>
        .container2{

            width: 310px;
            height: 350px;
            border: 2px solid black;
            background-color: white;
            text-align: center;
            margin: auto;
        }

        #faculty_email, #faculty_name{

            width: 90%;
            height: 70%;
            margin-top: 5px;
            border : none;
            padding: 2px;
        }
        
        #signout{
            width: 90px;
            height: 20px;
            border-radius: 10px;
            background-color: rgb(255, 130, 130);
            padding: 2px;
            word-spacing: 1px;
            margin-left: 5vw;
            text-align: center;
        }

        #dashboard{
            width: 110px;
            height: 20px;
            border-radius: 10px;
            background-color:rgb(112, 224, 112);
            padding: 2px;
            word-spacing: 1px;
            margin-left: 5vw;
            text-align: center;
        }

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

                <div class = "button">
                    <a id = "signout" href='signout.php'>SIGN OUT</a>
                </div>

                <div class = "button">
                    <a id = "dashboard" href='admin_dashboard_faculty.php'>DASHBOARD</a>
                </div>
            </div>
            
            
            
    </header>
    
    <br>
    
    <h2 style = "text-align: center; word-spacing: 3px;">ADMIN DASHBOARD</h2>
    
    <br>
    <br>
    
    <div class = "container2">

        <form action="insert_faculty.php" method = "post">
        
        <h3 style = "text-align: center; word-spacing: 3px;">Insert Faculty</h3>

        <br>     
        
        <div class = "box">
            <span style = "color: red">*</span>
            <input type="email" id = "faculty_email" name = "faculty_email" placeholder = "Enter Faculty Email" required>
        </div>

        <br>

        <div class = "box">
            <span style = "color: red">*</span>
            <input type="text" id = "faculty_name" name = "faculty_name" placeholder = "Enter Faculty name" required>
        </div>

        
        <br>
        <br>

        <input class = "btn" type="submit" name = "submit" value = "Create">

        <br>
        <br>
        
        <?php
            echo $message;
        ?>

        </form>
    </div>

</body>
</html>


