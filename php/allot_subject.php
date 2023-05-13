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

    $sql2 = "SELECT `dept_name`, `semester`FROM `academic_session` WHERE academic_session_id = '$academic_session_id'";
    $result2 = $conn->query($sql2);

    $dept_name = "";
    $semester = "";

    $message = " ";

    while($data = $result2->fetch_array())
    {
        $dept_name = $data[0];
        $semester = $data[1];

        $sql = "SELECT * FROM `subj` WHERE dept_name = '$dept_name' and semester = '$semester';";
        $result = $conn->query($sql);

        $sql1 = "SELECT * FROM `faculty`";
        $result1 = $conn->query($sql1);

    }

    if(isset($_POST['submit']))
    {
        $subject_code = $_POST['subject_code'];

        $faculty_email = $_POST['faculty_email'];

        $sql4 = "SELECT * FROM `academic_session_subject_faculty` WHERE `academic_session_id` = '$academic_session_id' 
        and `subject_code` = '$subject_code'";

        $result4 = $conn -> query($sql4);

        if(mysqli_num_rows($result4) == 1)
        {
            $message = "<p>Subject Already Alloted !!!</p>";
        }
        else
        {
            $sql3 = "INSERT INTO `academic_session_subject_faculty`(`academic_session_id`, `subject_code`, `faculty_email`)
            VALUES ('$academic_session_id','$subject_code','$faculty_email')";
            $conn -> query($sql3);
            $message = "<p>Subject Alloted Sucessfully</p>";
        }
        
    }
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allot Subject</title>
    <link rel = "stylesheet" href = "login_form.css">
    <link rel = "stylesheet" href = "navbar.css">

    <style>
        .container2{

            width: 600px;
            height: 450px;
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
        <form action="Allot_subject.php" method = "post">

            <br>
            <h3 style = "text-align: center; word-spacing: 3px;">Academic Session Id : <?php echo $academic_session_id;?></h3>
            <br>
            
            <h3 style = "text-align: center; word-spacing: 3px;">Allot Subject To Faculty</h3>

            <!-- <label for="course">Select Course : </label> -->

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


            <!-- <label for="faculty">Select Course : </label> -->

            <?php

                echo "<select name='faculty_email' id = 'faculty_email' required>";

                echo "<option value='' disabled hidden selected>Select Faculty</option>";

                while($data = $result1->fetch_array())
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
            <br>
            <input class = "btn" type="submit" id = "submit" name = "submit" value = "Allot Subject">
            
            <br>
            <br>
            <?php
                echo $message;
            ?>
            <br>
            <br>
            
        </form>

        <a href="view_allotment.php"><button class ="btn">View Allotment</button></a>        
        
    </div>
</body>
</html>