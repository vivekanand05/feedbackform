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
        $subject_code = $_POST['subject_code'];

        $subject_name = $_POST['subject_name'];
        
        $subject_type = $_POST['subject_type'];

        $dept_name = $_POST['dept_name'];

        $semester = $_POST['semester'];


        $sql = "INSERT INTO `subj`(`subject_code`, `subject_name`, `subject_type`, `dept_name`, `semester`) VALUES 
        ('$subject_code','$subject_name', '$subject_type', '$dept_name','$semester');";

        try
        {
            $con -> query($sql);
            $message = "<p style = 'color : green'>Inserted Subject Sucessfully</p>";
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
    <title>Insert Subject</title>
    <link rel = "stylesheet" href = "login_form.css">
    <link rel = "stylesheet" href = "navbar.css">
    
    <style>

        body{
            font-family: 'Times New Roman', Times, serif;
            background-color: rgb(139, 221, 253);
            height: 100vh;
        }
        
        .container2{

            width: 310px;
            height: 500px;
            border: 2px solid black;
            background-color: white;
            text-align: center;
            margin: auto;
            padding: 2px;
        }

        #subject_code, #subject_name{

            width: 90%;
            height: 70%;
            margin-top: 5px;
            border : none;
            padding: 2px;
        }

        #dept_name, #semester, #subject_type{
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
                    <a id = "dashboard" href='admin_dashboard_subject.php'>DASHBOARD</a>
                </div>
            </div>
            
            
            
    </header>
    
    <br>
    
    <h2 style = "text-align: center; word-spacing: 3px;">ADMIN DASHBOARD</h2>
    
    <br>
    <br>

    <div class = "container2">
        <form action="insert_subject.php" method = "post">
            
            <h3 style = "text-align: center; word-spacing: 3px;">Insert Subject</h3>

            <br>

            <div class = "box">
                <span style = "color: red">*</span>
                <input type="text" id = "subject_code" name = "subject_code" placeholder = "Enter Subject Code" required >
            </div>

            <br>

            <div class = "box">
                <span style = "color: red">*</span>
                <input type="text" id = "subject_name" name = "subject_name" placeholder = "Enter Subject Name" required >
            </div>

                        
            <br>

            <select name="subject_type" id="subject_type" required>
                <option value=""disabled hidden selected>Select Subject Type</option>
                <option value="theory">theory</option>
                <option value="practical">practical</option>
                <option value="theory and practical">theory and practical</option>
                <option value="mock drill">mock drill</option>
            </select>
            
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


