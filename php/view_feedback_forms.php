<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback Forms</title>
    <link rel = "stylesheet" href = "navbar.css">
    <link rel = "stylesheet" href = "style.css">
    <link rel="stylesheet" href="view.css">
    
    <style>
        .container1{
            display: flex;
            height: 70vh;
            margin: 10px;
            justify-content: space-around;
            align-items: center;
            margin: 10px;
        }

        #back{
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
                <a id = "back" href='view_session.php'>BACK</a>
            </div>

        </div>
        
        
        
</header>

    <br>
    
    <h2 style = "text-align: center; word-spacing: 3px;">ADMIN DASHBOARD</h2>
    
    <br>

    
            
</body>
</html>

<?php
    
    //error_reporting(0);

    session_start();
    
    require('config.php');

    $con = getdb();

    if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
    {
        header('Location: index.php');
    }

    if(isset($_POST['academic_session_id']))
    {
        $academic_session_id = $_POST['academic_session_id'];
        $_SESSION['$academic_session_id'] =  $academic_session_id;
    }

    $academic_session_id = $_SESSION['$academic_session_id'];

    if(isset($_POST['form_id']))
    {
        $form_id = $_POST['form_id'];

        $sql = "UPDATE `feedback_form` SET `form_status`='1' WHERE `form_id` = '$form_id';";

        $result10 = $con -> query($sql);

    }

    $sql2 = "SELECT `subject_code` FROM `academic_session_subject_faculty` WHERE `academic_session_id` = '$academic_session_id';";

    $result2 = $con -> query($sql2);

    echo "<table>";

    echo "<th>Form</th>";
    echo "<th>Activate Feedback Form</th>";
    echo "<th>Form Status</th>";
    echo "<th>Generate Feedback Report</th>";

    while($data2 = $result2 -> fetch_assoc())
    {
    
        $subject_code = $data2['subject_code'];


        $sql4 = "SELECT `subject_name`FROM `subj` WHERE `subject_code` = '$subject_code'";

        $result4 = $con -> query($sql4);

        $data4 = $result4 -> fetch_assoc();

        $subject_name = $data4['subject_name'];

        $sql3 = "SELECT `form_id`, `form_status` FROM  `feedback_form` WHERE
        `academic_session_id` = '$academic_session_id' AND `subject_code` = '$subject_code'";

        $result3 = $con -> query($sql3);

        $i = 1;

        while($data3 = $result3 -> fetch_assoc())
        {
            $form_id = $data3['form_id'];
            $form_status = $data3['form_status'];

            if($form_status === '1')
            {
                $status = "Active";
            }
            else
            {
                $status = "Not Active";
            }

            // echo $subject_name;

            
            echo "<tr>";
            echo "<td>$subject_name ($subject_code)   Feedback Form   $i  </td>";

            echo "<td>
                <form action='view_feedback_forms.php' method = 'post'>
                <span>
                    <input style = 'width : 50px; color : green;' type='submit' name ='form_id' value = '$form_id'>
                </span>
                
                </form>     
            </td>";

            echo "<td>$status</td>";
            echo "
                <td>
                <form action='report.php' method = 'post'>
                    <span>
                        <input style = 'width : 50px;' type='submit' name ='form_id' value = '$form_id'>
                    </span>
                    
                </form>                
            </td>";
            echo "</tr>";

            $i = $i + 1;

        }
    }

    echo "</table>";
    
?>


