<?php
    session_start();

    if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
    {
        header('Location: index.php');
    }
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "student_feedback_db";

    $conn = mysqli_connect($server,$username,$password,$db);

    if(isset($_POST['academic_session_id']))
    {
        $academic_session_id = $_POST['academic_session_id'];
        $_SESSION['academic_session_id'] = $academic_session_id;
    }

    $academic_session_id = $_SESSION['academic_session_id'];

    $sql2 = "SELECT `subject_code`,`subject_name` FROM `academic_session_subject_faculty` NATURAL JOIN `subj` WHERE academic_session_id = '$academic_session_id';";

    $result = $conn->query($sql2);


    $message = " ";
    $message2 = " ";


    if(isset($_POST['submit']))
    {
        $subject_code = $_POST['subject_code'];

        date_default_timezone_set('Asia/Kolkata');

        $form_date = date('Y-m-d');

        $sql4 = "INSERT INTO `feedback_form`(`academic_session_id`, `subject_code`, `form_date`)
        VALUES ('$academic_session_id','$subject_code', '$form_date');";

        

        try
        {
            $result4 = $conn -> query($sql4);
        }
        catch(mysqli_sql_exception $e)
        {
            $message2 = "<p>exception occured</p>";
        }

        $message = "<p>Feedback Form Created Sucessfully</p>";
        
    }
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Feedback Form</title>
    <link rel = "stylesheet" href = "login_form.css">
    <link rel = "stylesheet" href = "navbar.css">

    <style>
        .container2{

            width: 600px;
            height: 370px;
            border: 2px solid black;
            background-color: white;
            text-align: center;
            margin: auto;
            padding: 2px;
        }

        #subject_code, #faculty_name{
            padding: 2px;
        }

        #subject_code{
            margin-right : 30px;
        }

        .btn{
            width: 200px;
            height: 40px;
            border-radius: 10px;
            background-color: skyblue;
            padding: 5px;
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

        #back{
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
                    <a id = "back" href='view_session.php'>BACK</a>
                </div>

            </div>
            
            
            
    </header>
    
    <br>
    
    <h2 style = "text-align: center; word-spacing: 3px;">ADMIN DASHBOARD</h2>
    
    <br>
    <br>
    <div class = "container2">
        <form action="create_feedback_form.php" method = "post">

            <br>
            <h3 style = "text-align: center; word-spacing: 3px;">Academic Session Id : <?php echo $academic_session_id;?></h3>
            <br>

            <h3 style = "text-align: center; word-spacing: 3px;">Create Feedback Form</h3>

            <br>
            <br>

            <?php

                echo "<select name='subject_code' id = 'subject_code' required>";

                echo "<option value='' disabled hidden selected>Select Subject</option>";

                while($data = $result->fetch_array())
                {
                    echo "<option value='$data[0]'>$data[1]</option>";
                }
                echo "</select>";
            ?>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <input class = "btn" type="submit" id = "submit" name = "submit" value = "Create Feedback Form">
            
            <br>
            <br>
            <br>
            <?php
                echo $message2;
                echo $message;
            ?>
            <br>
            <br>
        </form>
    </div>
</body>
</html>