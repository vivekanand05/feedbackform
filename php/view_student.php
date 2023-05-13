<?php

    require('database_to_csv_student.php');

    if(isset($_POST['submit']))
    {
        $academic_session_id = $_POST['academic_session_id'];

        export($academic_session_id);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="navbar.css">
    <style>
        body{
        font-family: 'Times New Roman', Times, serif;
        background-color: rgb(139, 221, 253);
        height: 100vh;
    }

    form{
        display: inline;

        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
        margin-right: 20px;
    }

    #academic_session_id{
        width: 200px;
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
                <a id = "dashboard" href='admin_dashboard_student.php'>DASHBOARD</a>
            </div>

        </div>      
        
</header>

    <hr>
    <br>
    <br>

    <form action="view_student.php" method = "post">

    <input type="submit" name = "view_all" value = "View All Student">

    </form>

    <form action="view_student.php" method = "post">

    <input type="text" id = "enrollment_no" name ="enrollment_no" placeholder = "Search By Enrollment No.">

    <input type="submit" name = "SearchByEnrollment" value = "Search">

    </form>

    <form action="view_student.php" method = "post">

    <input type="text" id = "name" name = "name" placeholder = "Search By Name">

    <input type="submit" name = "SearchByName" value = "Search">
    </form>

    <!-- <form action="view_student.php" method = "post">

        <input type="text" id = "academic_session_id" name = "academic_session_id" placeholder = "Search By Academic Session ID">

        
    </form> -->

    <form action="view_student.php" method = "post">
        
        <input type="text" id = "academic_session_id" name = "academic_session_id" placeholder = "Search By Academic Session ID" required>

        <input type="submit" name = "SearchByAcademicSessionId" value = "Search">

        <input style = "padding: 3px; height: 25px; background-color: rgb(233, 142, 142); " type="submit" id = "submit" name = "submit" value = "Export All Students Details">

        
    </form>

    <br>
    <br>

    <hr>

    <?php

        error_reporting(0);
        
        session_start();

        if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
        {
            header('Location: index.php');
        }
                
        require('student_table.php');

        if(isset($_POST['view_all']))
        {
            printStudentTable('view_all', ' ');
        }
        else if(isset($_POST['SearchByEnrollment']))
        {
            $enrollment_no = $_POST['enrollment_no'];

            printStudentTable('SearchByEnrollment', $enrollment_no);
        }
        else if(isset($_POST['SearchByName']))
        {
            $name = $_POST['name'];

            printStudentTable('SearchByName', $name);
        }
        else if(isset($_POST['SearchByAcademicSessionId']))
        {
            $academic_session_id = $_POST['academic_session_id'];

            printStudentTable('SearchByAcademicSessionId', $academic_session_id);
        }
        else
        {
            printStudentTable('view_all', ' ');
        }

    ?>

    <br><br>
    
</body>
</html>



