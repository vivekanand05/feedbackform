<?php

    session_start();
        
    require('config.php');

    $con = getdb();

    if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'STUDENT'))
    {
        header('Location: index.php');
    }

    $enrollment_no = $_SESSION['user_id'];

    if(isset($_POST['form_id']))
    {
        $form_id = $_POST['form_id'];
        $_SESSION['form_id'] = $form_id;

        $sql2 = "SELECT `subject_code` , `subject_name`, `subject_type` FROM `feedback_form` NATURAL JOIN `subj` WHERE `form_id` = '$form_id';";

        $result2 = $con -> query($sql2);

        $data2 = $result2 -> fetch_assoc();

        $subject_code = $data2['subject_code'];

        $_SESSION['subject_code'] = $subject_code;
        
        $subject_name = $data2['subject_name'];

        $_SESSION['subject_name'] = $subject_name;

        $subject_type = $data2['subject_type'];

        $_SESSION['subject_type'] = $subject_type;
    }
    
    $subject_code = $_SESSION['subject_code'];

    $subject_name = $_SESSION['subject_name'];

    $subject_type = $_SESSION['subject_type'];

    $message = " ";

    if(isset($_POST["submit"]))
    {
        $form_id = $_SESSION['form_id'] ;
        
        if($subject_type === 'theory and practical')
        {
            $a1 =  $_POST["answer1"];

            $a2 =  $_POST["answer2"];
    
            $a3 =  $_POST["answer3"];
    
            $a4 = $_POST["answer4"];
    
            $a5 = $_POST["answer5"];
            
            $a6 =  $_POST["answer6"];
            
            $a7 =  $_POST["answer7"];
            
            $a8 = $_POST["answer8"];
            
            $a9 = $_POST["answer9"];
            
            $a10 = $_POST["answer0"];
            
    
            $a11 = $_POST["answera"];
            
            $a12 = $_POST["answerb"];
            
            $a13 = $_POST["answerc"];
            
            $a14 = $_POST["answerd"];
       
            $a15 = $_POST["answere"];
    
    
            $sql = "INSERT INTO `feedback`(`form_id`, `enrollment_no`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`) VALUES ('$form_id','$enrollment_no','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15');";
    
            try
            {
                $result = $con -> query($sql);
                $message = "<h2 style = 'color : green; text-align: center;'>Feedback Form Submitted Sucessfully !!!</h2>";
            }
            catch(mysqli_sql_exception $e)
            {
                //echo $e;
                $message =  "<h2 style = 'color : red; text-align: center;'>You can submit this form only one time !!!</h2>";
            }
        }
        else if($subject_type === 'theory')
        {
            $a1 =  $_POST["answer1"];

            $a2 =  $_POST["answer2"];
    
            $a3 =  $_POST["answer3"];
    
            $a4 = $_POST["answer4"];
    
            $a5 = $_POST["answer5"];
            
            $a6 =  $_POST["answer6"];
            
            $a7 =  $_POST["answer7"];
            
            $a8 = $_POST["answer8"];
            
            $a9 = $_POST["answer9"];
            
            $a10 = $_POST["answer0"];
                
    
            $sql = "INSERT INTO `feedback`(`form_id`, `enrollment_no`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`)
             VALUES ('$form_id','$enrollment_no','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10');";
    
            try
            {
                $result = $con -> query($sql);
                $message = "<h2 style = 'color : green; text-align: center;'>Feedback Form Submitted Sucessfully !!!</h2>";
            }
            catch(mysqli_sql_exception $e)
            {
                //echo $e;
                $message =  "<h2 style = 'color : red; text-align: center;'>You can submit this form only one time !!!</h2>";
            }
        }
        else if($subject_type === 'mock drill')
        {
            $a1 =  $_POST["answer1"];

            $a2 =  $_POST["answer2"];
    
            $a3 =  $_POST["answer3"];
    
            $a4 = $_POST["answer4"];
    
            $a5 = $_POST["answer5"];
                
    
            $sql = "INSERT INTO `feedback`(`form_id`, `enrollment_no`, `a1`, `a2`, `a3`, `a4`, `a5`)
             VALUES ('$form_id','$enrollment_no','$a1','$a2','$a3','$a4','$a5');";
    
            try
            {
                $result = $con -> query($sql);
                $message = "<h2 style = 'color : green; text-align: center;'>Feedback Form Submitted Sucessfully !!!</h2>";
            }
            catch(mysqli_sql_exception $e)
            {
                //echo $e;
                $message =  "<h2 style = 'color : red; text-align: center;'>You can submit this form only one time !!!</h2>";
            }
        }
        else if($subject_type === 'practical')
        {            
    
            $a11 = $_POST["answera"];
            
            $a12 = $_POST["answerb"];
            
            $a13 = $_POST["answerc"];
            
            $a14 = $_POST["answerd"];
       
            $a15 = $_POST["answere"];
    
    
            $sql = "INSERT INTO `feedback`(`form_id`, `enrollment_no`,`a11`, `a12`, `a13`, `a14`, `a15`) VALUES ('$form_id','$enrollment_no','$a11','$a12','$a13','$a14','$a15');";
            
            try
            {
                $result = $con -> query($sql);
                $message = "<h2 style = 'color : green; text-align: center;'>Feedback Form Submitted Sucessfully !!!</h2>";
            }
            catch(mysqli_sql_exception $e)
            {
                //echo $e;
                $message =  "<h2 style = 'color : red; text-align: center;'>You can submit this form only one time !!!</h2>";
            }
        }


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel = "stylesheet" href = "navbar.css">
    <link rel = "stylesheet" href = "style.css">
    <style>
        .section
        {
            max-width: 90vw;
            margin: auto;
            margin-bottom: 20px;
            background-color: rgb(65, 160, 243);
            padding: 20px;
            border-radius: 5px;
        }
        .card
        {
            background : rgba(255, 255, 255, 0.7);
            color: black;
            padding-left: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .question
        {
            color: blue;
        }
        .btn
        {
            background-color: red;
            color: white;
            border-radius: 5px;
        }
        form
        {
            max-width: 90vw;
            margin: auto;
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

        #dashboard{
            width: 110px;
            height: 20px;
            border-radius: 10px;
            background-color:rgb(112, 224, 112);
            padding: 2px;
            word-spacing: 1px;
            margin-left: 2vw;
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

        <div class = "button">
            <a id = "dashboard" href='student_dashboard.php'>DASHBOARD</a>
        </div>
    </div>

    </header>

    <?php
    
    if($subject_type === 'theory and practical')
    {
        echo "<form action='feedback.php' method='post'>

        <br>
        <br>

        $message;

        <br>
        <br>
        
        <div class='section'>

            <br>
            <h2>$subject_name  $subject_code Theory Feedback Form</h2>
            <br>
            <br>

            <div class='card'>
                <b><p class='question'>Regular in engaging scheduled classes</p></b>
                <br>
                <input type='radio' name='answer1' id='exc1' value='e' required>
                <label for='exc1'>Excellent</label><br>
                <input type='radio' name='answer1' id='good1' value='g'>
                <label for='good1'>Good</label><br>
                <input type='radio' name='answer1' id='avg1' value='a'>
                <label for='avg1'>Average</label><br>
                <input type='radio' name='answer1' id='poor1' value='p'>
                <label for='poor1'>Poor</label><br>
                <input type='radio' name='answer1' id='vpoor1' value='v'>
                <label for='vpoor1'>Very Poor</label><br>
                <br>
            </div>
            
            <div class='card'>
                <b><p class='question'>Sincere in covering syllabus</p></b>
                <br>
                <input type='radio' name='answer2' id='exc2' value='e' required>
                <label for='exc2'>Excellent</label><br>
                <input type='radio' name='answer2' id='good2' value='g'>
                <label for='good2'>Good</label><br>
                <input type='radio' name='answer2' id='avg2' value='a'>
                <label for='avg2'>Average</label><br>
                <input type='radio' name='answer2' id='poor2' value='p'>
                <label for='poor2'>Poor</label><br>
                <input type='radio' name='answer2' id='vpoor2' value='v'>
                <label for='vpoor2'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Classes are effective and interesting</p></b>
                <br>
                <input type='radio' name='answer3' id='exc3' value='e' required>
                <label for='exc3'>Excellent</label><br>
                <input type='radio' name='answer3' id='good3' value='g'>
                <label for='good3'>Good</label><br>
                <input type='radio' name='answer3' id='avg3' value='a'>
                <label for='avg3'>Average</label><br>
                <input type='radio' name='answer3' id='poor3' value='p'>
                <label for='poor3'>Poor</label><br>
                <input type='radio' name='answer3' id='vpoor3' value='v'>
                <label for='vpoor3'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>In-Depth subject knowledge</p></b>
                <br>
                <input type='radio' name='answer4' id='exc4' value='e' required>
                <label for='exc4'>Excellent</label><br>
                <input type='radio' name='answer4' id='good4' value='g'>
                <label for='good4'>Good</label><br>
                <input type='radio' name='answer4' id='avg4' value='a'>
                <label for='avg4'>Average</label><br>
                <input type='radio' name='answer4' id='poor4' value='p'>
                <label for='poor4'>Poor</label><br>
                <input type='radio' name='answer4' id='vpoor4' value='v'>
                <label for='vpoor4'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Encourage participation in the class</p></b>
                <br>
                <input type='radio' name='answer5' id='exc5' value='e' required>
                <label for='exc5'>Excellent</label><br>
                <input type='radio' name='answer5' id='good5' value='g'>
                <label for='good5'>Good</label><br>
                <input type='radio' name='answer5' id='avg5' value='a'>
                <label for='avg5'>Average</label><br>
                <input type='radio' name='answer5' id='poor5' value='p'>
                <label for='poor5'>Poor</label><br>
                <input type='radio' name='answer5' id='vpoor5' value='v'>
                <label for='vpoor5'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Effective in maintaining discipline</p></b>
                <br>
                <input type='radio' name='answer6' id='exc6' value='e' required>
                <label for='exc6'>Excellent</label><br>
                <input type='radio' name='answer6' id='good6' value='g'>
                <label for='good6'>Good</label><br>
                <input type='radio' name='answer6' id='avg6' value='a'>
                <label for='avg6'>Average</label><br>
                <input type='radio' name='answer6' id='poor6' value='p'>
                <label for='poor6'>Poor</label><br>
                <input type='radio' name='answer6' id='vpoor6' value='v'>
                <label for='vpoor6'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Explain difficult concepts</p></b>
                <br>
                <input type='radio' name='answer7' id='exc7' value='e' required>
                <label for='exc7'>Excellent</label><br>
                <input type='radio' name='answer7' id='good7' value='g'>
                <label for='good7'>Good</label><br>
                <input type='radio' name='answer7' id='avg7' value='a'>
                <label for='avg7'>Average</label><br>
                <input type='radio' name='answer7' id='poor7' value='p'>
                <label for='poor7'>Poor</label><br>
                <input type='radio' name='answer7' id='vpoor7' value='v'>
                <label for='vpoor7'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Easily accessible in student</p></b>
                <br>
                <input type='radio' name='answer8' id='exc8' value='e' required>
                <label for='exc8'>Excellent</label><br>
                <input type='radio' name='answer8' id='good8' value='g'>
                <label for='good8'>Good</label><br>
                <input type='radio' name='answer8' id='avg8' value='a'>
                <label for='avg8'>Average</label><br>
                <input type='radio' name='answer8' id='poor8' value='p'>
                <label for='poor8'>Poor</label><br>
                <input type='radio' name='answer8' id='vpoor8' value='v'>
                <label for='vpoor8'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Attractive personality</p></b>
                <br>
                <input type='radio' name='answer9' id='exc9' value='e' required>
                <label for='exc9'>Excellent</label><br>
                <input type='radio' name='answer9' id='good9' value='g'>
                <label for='good9'>Good</label><br>
                <input type='radio' name='answer9' id='avg9' value='a'>
                <label for='avg9'>Average</label><br>
                <input type='radio' name='answer9' id='poor9' value='p'>
                <label for='poor9'>Poor</label><br>
                <input type='radio' name='answer9' id='vpoor9' value='v'>
                <label for='vpoor9'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Overall effectiveness of faculty members</p></b>
                <br>
                <input type='radio' name='answer0' id='exc0' value='e' required>
                <label for='exc0'>Excellent</label><br>
                <input type='radio' name='answer0' id='good0' value='g'>
                <label for='good0'>Good</label><br>
                <input type='radio' name='answer0' id='avg0' value='a'>
                <label for='avg0'>Average</label><br>
                <input type='radio' name='answer0' id='poor0' value='p'>
                <label for='poor0'>Poor</label><br>
                <input type='radio' name='answer0' id='vpoor0' value='v'>
                <label for='vpoor0'>Very Poor</label><br>
                <br>
            </div>
        </div>

        <div class='section'>
            <br>
            <h2>$subject_name  $subject_code Practical Feedback Form</h2>
            <br>
            <br>

            <div class='card'>
                <b><p class='question'>Availablity of faculty members in lab</p></b>
                <br>
                <input type='radio' name='answera' id='exca' value='e' required>
                <label for='exca'>Excellent</label><br>
                <input type='radio' name='answera' id='gooda' value='g'>
                <label for='gooda'>Good</label><br>
                <input type='radio' name='answera' id='avga' value='a'>
                <label for='avga'>Average</label><br>
                <input type='radio' name='answera' id='poora' value='p'>
                <label for='poora'>Poor</label><br>
                <input type='radio' name='answera' id='vpoora' value='v'>
                <label for='vpoora'>Very Poor</label><br>
                <br>
            </div>
            
            <div class='card'>
                <b><p class='question'>Working status of equipment in lab</p></b>
                <br>
                <input type='radio' name='answerb' id='excb' value='e' required>
                <label for='excb'>Excellent</label><br>
                <input type='radio' name='answerb' id='goodb' value='g'>
                <label for='goodb'>Good</label><br>
                <input type='radio' name='answerb' id='avgb' value='a'>
                <label for='avgb'>Average</label><br>
                <input type='radio' name='answerb' id='poorb' value='p'>
                <label for='poorb'>Poor</label><br>
                <input type='radio' name='answerb' id='vpoorb' value='v'>
                <label for='vpoorb'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Support of faculty members to conduct practical examinations</p></b>
                <br>
                <input type='radio' name='answerc' id='excc' value='e' required>
                <label for='excc'>Excellent</label><br>
                <input type='radio' name='answerc' id='goodc' value='g'>
                <label for='goodc'>Good</label><br>
                <input type='radio' name='answerc' id='avgc' value='a'>
                <label for='avgc'>Average</label><br>
                <input type='radio' name='answerc' id='poorc' value='p'>
                <label for='poorc'>Poor</label><br>
                <input type='radio' name='answerc' id='vpoorc' value='v'>
                <label for='vpoorc'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Support of lab assistent to conduct practical examinations</p></b>
                <br>
                <input type='radio' name='answerd' id='excd' value='e' required>
                <label for='excd'>Excellent</label><br>
                <input type='radio' name='answerd' id='goodd' value='g'>
                <label for='goodd'>Good</label><br>
                <input type='radio' name='answerd' id='avgd' value='a'>
                <label for='avgd'>Average</label><br>
                <input type='radio' name='answerd' id='poord' value='p'>
                <label for='poord'>Poor</label><br>
                <input type='radio' name='answerd' id='vpoord' value='v'>
                <label for='vpoord'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Overall status of lab</p></b>
                <br>
                <input type='radio' name='answere' id='exce' value='e' required>
                <label for='exce'>Excellent</label><br>
                <input type='radio' name='answere' id='goode' value='g'>
                <label for='goode'>Good</label><br>
                <input type='radio' name='answere' id='avge' value='a'>
                <label for='avge'>Average</label><br>
                <input type='radio' name='answere' id='poore' value='p'>
                <label for='poore'>Poor</label><br>
                <input type='radio' name='answere' id='vpoore' value='v'>
                <label for='vpoore'>Very Poor</label><br>
                <br>
            </div>
        </div>

        <input type='submit' class='btn' value='SUBMIT' name='submit'>

        <br>
        <br>
        <br>

    </form>";        
    }

    if($subject_type === 'theory')
    {
        echo "<form action='feedback.php' method='post'>

        <br>
        <br>

        $message;

        <br>
        <br>
        
        <div class='section'>

            <br>
            <h2>$subject_name  $subject_code Theory Feedback</h2>
            <br>
            <br>

            <div class='card'>
                <b><p class='question'>Regular in engaging scheduled classes</p></b>
                <br>
                <input type='radio' name='answer1' id='exc1' value='e' required>
                <label for='exc1'>Excellent</label><br>
                <input type='radio' name='answer1' id='good1' value='g'>
                <label for='good1'>Good</label><br>
                <input type='radio' name='answer1' id='avg1' value='a'>
                <label for='avg1'>Average</label><br>
                <input type='radio' name='answer1' id='poor1' value='p'>
                <label for='poor1'>Poor</label><br>
                <input type='radio' name='answer1' id='vpoor1' value='v'>
                <label for='vpoor1'>Very Poor</label><br>
                <br>
            </div>
            
            <div class='card'>
                <b><p class='question'>Sincere in covering syllabus</p></b>
                <br>
                <input type='radio' name='answer2' id='exc2' value='e' required>
                <label for='exc2'>Excellent</label><br>
                <input type='radio' name='answer2' id='good2' value='g'>
                <label for='good2'>Good</label><br>
                <input type='radio' name='answer2' id='avg2' value='a'>
                <label for='avg2'>Average</label><br>
                <input type='radio' name='answer2' id='poor2' value='p'>
                <label for='poor2'>Poor</label><br>
                <input type='radio' name='answer2' id='vpoor2' value='v'>
                <label for='vpoor2'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Classes are effective and interesting</p></b>
                <br>
                <input type='radio' name='answer3' id='exc3' value='e' required>
                <label for='exc3'>Excellent</label><br>
                <input type='radio' name='answer3' id='good3' value='g'>
                <label for='good3'>Good</label><br>
                <input type='radio' name='answer3' id='avg3' value='a'>
                <label for='avg3'>Average</label><br>
                <input type='radio' name='answer3' id='poor3' value='p'>
                <label for='poor3'>Poor</label><br>
                <input type='radio' name='answer3' id='vpoor3' value='v'>
                <label for='vpoor3'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>In-Depth subject knowledge</p></b>
                <br>
                <input type='radio' name='answer4' id='exc4' value='e' required>
                <label for='exc4'>Excellent</label><br>
                <input type='radio' name='answer4' id='good4' value='g'>
                <label for='good4'>Good</label><br>
                <input type='radio' name='answer4' id='avg4' value='a'>
                <label for='avg4'>Average</label><br>
                <input type='radio' name='answer4' id='poor4' value='p'>
                <label for='poor4'>Poor</label><br>
                <input type='radio' name='answer4' id='vpoor4' value='v'>
                <label for='vpoor4'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Encourage participation in the class</p></b>
                <br>
                <input type='radio' name='answer5' id='exc5' value='e' required>
                <label for='exc5'>Excellent</label><br>
                <input type='radio' name='answer5' id='good5' value='g'>
                <label for='good5'>Good</label><br>
                <input type='radio' name='answer5' id='avg5' value='a'>
                <label for='avg5'>Average</label><br>
                <input type='radio' name='answer5' id='poor5' value='p'>
                <label for='poor5'>Poor</label><br>
                <input type='radio' name='answer5' id='vpoor5' value='v'>
                <label for='vpoor5'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Effective in maintaining discipline</p></b>
                <br>
                <input type='radio' name='answer6' id='exc6' value='e' required>
                <label for='exc6'>Excellent</label><br>
                <input type='radio' name='answer6' id='good6' value='g'>
                <label for='good6'>Good</label><br>
                <input type='radio' name='answer6' id='avg6' value='a'>
                <label for='avg6'>Average</label><br>
                <input type='radio' name='answer6' id='poor6' value='p'>
                <label for='poor6'>Poor</label><br>
                <input type='radio' name='answer6' id='vpoor6' value='v'>
                <label for='vpoor6'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Explain difficult concepts</p></b>
                <br>
                <input type='radio' name='answer7' id='exc7' value='e' required>
                <label for='exc7'>Excellent</label><br>
                <input type='radio' name='answer7' id='good7' value='g'>
                <label for='good7'>Good</label><br>
                <input type='radio' name='answer7' id='avg7' value='a'>
                <label for='avg7'>Average</label><br>
                <input type='radio' name='answer7' id='poor7' value='p'>
                <label for='poor7'>Poor</label><br>
                <input type='radio' name='answer7' id='vpoor7' value='v'>
                <label for='vpoor7'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Easily accessible in student</p></b>
                <br>
                <input type='radio' name='answer8' id='exc8' value='e' required>
                <label for='exc8'>Excellent</label><br>
                <input type='radio' name='answer8' id='good8' value='g'>
                <label for='good8'>Good</label><br>
                <input type='radio' name='answer8' id='avg8' value='a'>
                <label for='avg8'>Average</label><br>
                <input type='radio' name='answer8' id='poor8' value='p'>
                <label for='poor8'>Poor</label><br>
                <input type='radio' name='answer8' id='vpoor8' value='v'>
                <label for='vpoor8'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Attractive personality</p></b>
                <br>
                <input type='radio' name='answer9' id='exc9' value='e' required>
                <label for='exc9'>Excellent</label><br>
                <input type='radio' name='answer9' id='good9' value='g'>
                <label for='good9'>Good</label><br>
                <input type='radio' name='answer9' id='avg9' value='a'>
                <label for='avg9'>Average</label><br>
                <input type='radio' name='answer9' id='poor9' value='p'>
                <label for='poor9'>Poor</label><br>
                <input type='radio' name='answer9' id='vpoor9' value='v'>
                <label for='vpoor9'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Overall effectiveness of faculty members</p></b>
                <br>
                <input type='radio' name='answer0' id='exc0' value='e' required>
                <label for='exc0'>Excellent</label><br>
                <input type='radio' name='answer0' id='good0' value='g'>
                <label for='good0'>Good</label><br>
                <input type='radio' name='answer0' id='avg0' value='a'>
                <label for='avg0'>Average</label><br>
                <input type='radio' name='answer0' id='poor0' value='p'>
                <label for='poor0'>Poor</label><br>
                <input type='radio' name='answer0' id='vpoor0' value='v'>
                <label for='vpoor0'>Very Poor</label><br>
                <br>
            </div>
        </div>

        <input type='submit' class='btn' value='SUBMIT' name='submit'>

        <br>
        <br>
        <br>

        </form>";
    }
    if($subject_type === 'mock drill')
    {
        echo "<form action='feedback.php' method='post'>

        <br>
        <br>

        $message;

        <br>
        <br>
        
        <div class='section'>

            <br>
            <h2>$subject_name  $subject_code Mock Drill Feedback</h2>
            <br>
            <br>

            <div class='card'>
                <b><p class='question'>Trainer/facilitator/faculty to communicate (Pre Placement Talk) the process.</p></b>
                <br>
                <input type='radio' name='answer1' id='exc1' value='e' required>
                <label for='exc1'>Excellent</label><br>
                <input type='radio' name='answer1' id='good1' value='g'>
                <label for='good1'>Good</label><br>
                <input type='radio' name='answer1' id='avg1' value='a'>
                <label for='avg1'>Average</label><br>
                <input type='radio' name='answer1' id='poor1' value='p'>
                <label for='poor1'>Poor</label><br>
                <input type='radio' name='answer1' id='vpoor1' value='v'>
                <label for='vpoor1'>Very Poor</label><br>
                <br>
            </div>
            
            <div class='card'>
                <b><p class='question'>Trainer/facilitator/faculty ability to stimulate student interest and encourage participation.</p></b>
                <br>
                <input type='radio' name='answer2' id='exc2' value='e' required>
                <label for='exc2'>Excellent</label><br>
                <input type='radio' name='answer2' id='good2' value='g'>
                <label for='good2'>Good</label><br>
                <input type='radio' name='answer2' id='avg2' value='a'>
                <label for='avg2'>Average</label><br>
                <input type='radio' name='answer2' id='poor2' value='p'>
                <label for='poor2'>Poor</label><br>
                <input type='radio' name='answer2' id='vpoor2' value='v'>
                <label for='vpoor2'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Process(GD/PI/TI) intelligent to discuss course content and problems.</p></b>
                <br>
                <input type='radio' name='answer3' id='exc3' value='e' required>
                <label for='exc3'>Excellent</label><br>
                <input type='radio' name='answer3' id='good3' value='g'>
                <label for='good3'>Good</label><br>
                <input type='radio' name='answer3' id='avg3' value='a'>
                <label for='avg3'>Average</label><br>
                <input type='radio' name='answer3' id='poor3' value='p'>
                <label for='poor3'>Poor</label><br>
                <input type='radio' name='answer3' id='vpoor3' value='v'>
                <label for='vpoor3'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Value of assigned drills and exercises.</p></b>
                <br>
                <input type='radio' name='answer4' id='exc4' value='e' required>
                <label for='exc4'>Excellent</label><br>
                <input type='radio' name='answer4' id='good4' value='g'>
                <label for='good4'>Good</label><br>
                <input type='radio' name='answer4' id='avg4' value='a'>
                <label for='avg4'>Average</label><br>
                <input type='radio' name='answer4' id='poor4' value='p'>
                <label for='poor4'>Poor</label><br>
                <input type='radio' name='answer4' id='vpoor4' value='v'>
                <label for='vpoor4'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Amount learned from the process(take away) in terns of knowledge, concepts, skills and thinking ability.</p></b>
                <br>
                <input type='radio' name='answer5' id='exc5' value='e' required>
                <label for='exc5'>Excellent</label><br>
                <input type='radio' name='answer5' id='good5' value='g'>
                <label for='good5'>Good</label><br>
                <input type='radio' name='answer5' id='avg5' value='a'>
                <label for='avg5'>Average</label><br>
                <input type='radio' name='answer5' id='poor5' value='p'>
                <label for='poor5'>Poor</label><br>
                <input type='radio' name='answer5' id='vpoor5' value='v'>
                <label for='vpoor5'>Very Poor</label><br>
                <br>
            </div>

        </div>

        <input type='submit' class='btn' value='SUBMIT' name='submit'>

        <br>
        <br>
        <br>

        </form>";
    }

    if($subject_type === 'practical')
    {
        echo "<form action='feedback.php' method='post'>

        <br>
        <br>

        $message;

        <br>
        <br> 

        <div class='section'>

            <br>

            <h2>$subject_name  $subject_code Practical Feedback</h2>
            <br>
            <br>

            <div class='card'>
                <b><p class='question'>Availablity of faculty members in lab</p></b>
                <br>
                <input type='radio' name='answera' id='exca' value='e' required>
                <label for='exca'>Excellent</label><br>
                <input type='radio' name='answera' id='gooda' value='g'>
                <label for='gooda'>Good</label><br>
                <input type='radio' name='answera' id='avga' value='a'>
                <label for='avga'>Average</label><br>
                <input type='radio' name='answera' id='poora' value='p'>
                <label for='poora'>Poor</label><br>
                <input type='radio' name='answera' id='vpoora' value='v'>
                <label for='vpoora'>Very Poor</label><br>
                <br>
            </div>
            
            <div class='card'>
                <b><p class='question'>Working status of equipment in lab</p></b>
                <br>
                <input type='radio' name='answerb' id='excb' value='e' required>
                <label for='excb'>Excellent</label><br>
                <input type='radio' name='answerb' id='goodb' value='g'>
                <label for='goodb'>Good</label><br>
                <input type='radio' name='answerb' id='avgb' value='a'>
                <label for='avgb'>Average</label><br>
                <input type='radio' name='answerb' id='poorb' value='p'>
                <label for='poorb'>Poor</label><br>
                <input type='radio' name='answerb' id='vpoorb' value='v'>
                <label for='vpoorb'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Support of faculty members to conduct practical examinations</p></b>
                <br>
                <input type='radio' name='answerc' id='excc' value='e' required>
                <label for='excc'>Excellent</label><br>
                <input type='radio' name='answerc' id='goodc' value='g'>
                <label for='goodc'>Good</label><br>
                <input type='radio' name='answerc' id='avgc' value='a'>
                <label for='avgc'>Average</label><br>
                <input type='radio' name='answerc' id='poorc' value='p'>
                <label for='poorc'>Poor</label><br>
                <input type='radio' name='answerc' id='vpoorc' value='v'>
                <label for='vpoorc'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Support of lab assistent to conduct practical examinations</p></b>
                <br>
                <input type='radio' name='answerd' id='excd' value='e' required>
                <label for='excd'>Excellent</label><br>
                <input type='radio' name='answerd' id='goodd' value='g'>
                <label for='goodd'>Good</label><br>
                <input type='radio' name='answerd' id='avgd' value='a'>
                <label for='avgd'>Average</label><br>
                <input type='radio' name='answerd' id='poord' value='p'>
                <label for='poord'>Poor</label><br>
                <input type='radio' name='answerd' id='vpoord' value='v'>
                <label for='vpoord'>Very Poor</label><br>
                <br>
            </div>

            <div class='card'>
                <b><p class='question'>Overall status of lab</p></b>
                <br>
                <input type='radio' name='answere' id='exce' value='e' required>
                <label for='exce'>Excellent</label><br>
                <input type='radio' name='answere' id='goode' value='g'>
                <label for='goode'>Good</label><br>
                <input type='radio' name='answere' id='avge' value='a'>
                <label for='avge'>Average</label><br>
                <input type='radio' name='answere' id='poore' value='p'>
                <label for='poore'>Poor</label><br>
                <input type='radio' name='answere' id='vpoore' value='v'>
                <label for='vpoore'>Very Poor</label><br>
                <br>
            </div>
        </div>

        <input type='submit' class='btn' value='SUBMIT' name='submit'>

        <br>
        <br>
        <br>

    </form>";
    }
    
    ?>



</body>
</html>