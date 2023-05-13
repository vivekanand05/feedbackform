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
        $dept_name = $_POST['dept_name'];
        
        $semester = $_POST['semester'];

        $section = $_POST['section'];

        $duration = $_POST['duration'];

        $year = $_POST['year'];

        $sql = "INSERT INTO `academic_session`(`dept_name`, `semester`, `section`, `duration`, `year`) VALUES ('$dept_name','$semester','$section','$duration','$year')";

        try
        {
            $con -> query($sql);
            $message = "<p style = 'color : green'>Created Academic Sesssion Sucessfully</p>";
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
    <title>Insert Session</title>
    <link rel = "stylesheet" href = "login_form.css">
    <link rel = "stylesheet" href = "navbar.css">
    
    <style>
        .container2{

            width: 310px;
            height: 400px;
            border: 2px solid black;
            background-color: white;
            text-align: center;
            margin: auto;
        }

        #dept_name, #semester, #section, #duration, #year{
            padding : 10px;
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
                    <a id = "dashboard" href='admin_dashboard_session.php'>DASHBOARD</a>
                </div>

            </div>
            
            
            
    </header>
    
    <br>
    
    <h2 style = "text-align: center; word-spacing: 3px;">ADMIN DASHBOARD</h2>
    
    <br>
    <br>
    
    

    <div class = "container2">

    <form action="insert_session.php" method = "post">

        <h3 style = "text-align: center; word-spacing: 3px;">Create Academic Session</h3>

        <br>
        <br>

        <select name="dept_name" id="dept_name" required>
            <option value="" disabled hidden selected>Select Department</option>
            <option value="CS">CS</option>
            <option value="IT">IT</option>
            <option value="ME">ME</option>
            <option value="CE">CE</option>
            <option value="EC">EC</option>
            <option value="MBA">MBA</option>
        </select>

        <br>
        <br>

        <select name="semester" id="semester" required>
            <option value="" disabled hidden selected>Select Semester</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>

        <br>
        <br>

        <select name="section" id="section" required>

            <option value="" disabled hidden selected>Select Section</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="G">G</option>
        </select>

        <br>
        <br>

        <select name="duration" id="duration" required>

            <option value="" disabled hidden selected>Select Duration</option>
            <option value="JAN-JUN">JAN-JUN</option>
            <option value="JUL-DEC">JUL-DEC</option>
        </select>

        <input type="number" id = "year" name = "year" min="2022" max="2099" step="1" value="2022" required><br><br>

        <input class = "btn"  id = "submit" type="submit" name = "submit" value="Create">

        <br>
        <br>

        <?php
            echo $message;
        ?>

        </form>
    </div>

</body>
</html>


