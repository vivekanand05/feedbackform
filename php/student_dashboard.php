<?php
        session_start();
    
        require('config.php');
    
        $con = getdb();
    
        if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'STUDENT'))
        {
            header('Location: index.php');
        }
    
        $enrollment_no = $_SESSION['user_id'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DASHBOARD</title>
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

        #signout{
            width: 120px;
            height: 40px;
            border-radius: 10px;
            background-color: rgb(255, 130, 130);
            padding: 2px;
            word-spacing: 1px;
            margin-left: 3vw;
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
            <a id = "signout" href='student_signout.php'><?php echo $enrollment_no."<br>";?>SIGN OUT</a>
            </div>
        </div>
        
        
        
</header>

    <br>
    
    <h2 style = "text-align: center; word-spacing: 3px;">STUDENT DASHBOARD</h2>
    
    <br>
    <br>

            
</body>
</html>

<?php
    
    //error_reporting(0);

    // echo $enrollment_no."<br>";



    $sql1 = "SELECT `academic_session_id` FROM `academic_session_student` WHERE enrollment_no = '$enrollment_no';";

    $result1 = $con -> query($sql1);

    $data1 = $result1 -> fetch_assoc();

    $academic_session_id = $data1['academic_session_id'];

    // echo $academic_session_id."<br>";



    $sql2 = "SELECT `subject_code` FROM `academic_session_subject_faculty` WHERE `academic_session_id` = '$academic_session_id';";

    $result2 = $con -> query($sql2);

    echo "<table>";

    echo "<th>Form</th>";
    echo "<th>Give Feedback</th>";

    while($data2 = $result2 -> fetch_assoc())
    {
    
        $subject_code = $data2['subject_code'];

        //echo $subject_code;

        $sql4 = "SELECT `subject_name`FROM `subj` WHERE `subject_code` = '$subject_code'";

        $result4 = $con -> query($sql4);

        $data4 = $result4 -> fetch_assoc();

        $subject_name = $data4['subject_name'];


        $sql3 = "SELECT `form_id` FROM  `feedback_form` WHERE
        `academic_session_id` = '$academic_session_id' AND `subject_code` = '$subject_code' AND `form_status` = '1'; ";

        $result3 = $con -> query($sql3);

        $i = 1;

        while($data3 = $result3 -> fetch_assoc())
        {
            $form_id = $data3['form_id'];
            // echo $subject_name;

            
            echo "<tr>";
            echo "<td>$subject_name ($subject_code)   Feedback Form   $i  </td>";

            echo "
                <td>
                <form action='feedback.php' method = 'post'>
                    <span>
                        <input style = 'width: 100px; height: 30px;' type='submit' name ='form_id' value = '$form_id'>
                    </span>
                    
                </form>                
            </td>";
            
            echo "</tr>";

            $i = $i + 1;

        }
    }

    echo "</table>";
?>


