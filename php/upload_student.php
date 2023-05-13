
<?php

    //error_reporting(0);

    session_start();

    if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
    {
        header('Location: index.php');
    }

    require('config.php');
        
    $con = getdb();

    $student_inserted_count = 0;
    $student_excluded_count = 0;

    $student_enrolled = 0;

    $message = " ";
    $message2 = " ";

    if(isset($_POST['academic_session_id']))
    {
        $academic_session_id = $_POST['academic_session_id'];
        $_SESSION['academic_session_id'] = $academic_session_id;
    }

    $academic_session_id = $_SESSION['academic_session_id'];

    if(isset($_POST['import']))
    {
        $filename = $_FILES["file"]["tmp_name"];

        if($_FILES["file"]["size"] > 0)
        {
            $file = fopen($filename, "r");

            while(($data = fgetcsv($file, 1000, ",")) !== FALSE)
            {
                $enrollment_no = $data[0];
                $name = $data[1];

                $sql1 = "INSERT INTO `student`(`enrollment_no`, `name`) VALUES ('$enrollment_no','$name')";
                
                $sql2 = "INSERT INTO `academic_session_student`(`enrollment_no`,`academic_session_id`)
                VALUES ('$enrollment_no','$academic_session_id');";
        
                try
                {
                    $result1 = mysqli_query($con, $sql1);
                    $student_inserted_count++;     

                    try
                    {
                        $result2 = mysqli_query($con, $sql2);
                        $student_enrolled++;
                    }
                    catch(mysqli_sql_exception $e)
                    {
                        break;
                    }
                }
                catch(mysqli_sql_exception $e)
                {
                    $student_excluded_count++;
                    continue;
                }

            }

        }
        
        $message = "<br><p style = 'color: green';>CSV file has been sucessfully uploaded.<br>$student_inserted_count student inserted
        <br>$student_enrolled student enrolled in $academic_session_id <br> $student_excluded_count duplicates excluded<p>";
    }

    $con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Student Details</title>
    <link rel="stylesheet" href="navbar.css">
    <style>
    
    body{
        font-family: 'Times New Roman', Times, serif;
        background-color: rgb(139, 221, 253);
        height: 100vh;
    }
    .guidelines{

        width: 600px;
        max-height: 700px;
        padding: 10px;
        border: 2px solid black;
        background-color: rgb(223, 221, 221);
        text-align: center;
        margin: auto;
        font-size: 20px;
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
                <a id = "dashboard" href='view_session.php'>BACK</a>
            </div>

        </div>      
        
</header>


    <br>
    <br>

    <div class = "guidelines">
        <br>
        <h3>UPLOAD CSV FILE</h3>
        <br><br>

        <p>Follow below steps to upload students details from CSV file.</p>
        <br>
        <p>Don't include column header in CSV file</p>
        <br>
        <p>In CSV file write fields in given order <br>(enrollment No., name, academic_session_id)</p>
        <br>
        <p>Then upload the CSV file.</p>

        <br>
        <br>

        <form action="upload_student.php" method = "post" name = "upload_excel" enctype="multipart/form-data">

        <input style ="background-color: "type="file" name = "file" accept =".csv">

        <input type="submit" name ="import" value ="Upload to Database">
        <br>

        <?php
            echo $message;
        ?>
        </form>

    </div>    
        
</body>
</html>


