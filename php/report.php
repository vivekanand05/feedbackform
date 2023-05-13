<?php

    session_start();

    if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
    {
        header('Location: index.php');
    }
    
    require('config.php');

    $con = getdb();

    //echo "reached report page<br>";

    if(isset($_POST['form_id']))
    {
        //echo "inside<br>";

        $form_id = $_POST['form_id'];

        $sql = "SELECT `name` FROM `feedback_form`  NATURAL JOIN `academic_session_subject_faculty` NATURAL JOIN faculty where `form_id` = '$form_id'";

        $result = $con -> query($sql);

        $data  = $result -> fetch_assoc();

        $faculty_name = $data['name'];

        //echo "Faculty Name : ".$faculty_name;
        // var_dump($form_id);

        // echo "Form id :".$form_id."<br>";

        $sql = "SELECT `subject_code`, `subject_type`,`dept_name`, `semester`, `section`,`form_date` FROM `feedback_form`  NATURAL JOIN `subj` NATURAL JOIN `academic_session` WHERE `form_id` = '$form_id'";

        $result = $con -> query($sql);

        $data  = $result -> fetch_assoc();

        $subject_code = $data['subject_code'];

        $subject_type = $data['subject_type'];

        $dept_name = $data['dept_name'];

        $semester = $data['semester'];

        $section = $data['section'];

        $form_date = $data['form_date'];

        $sql = "SELECT count(enrollment_no) FROM `feedback_form` NATURAL JOIN `academic_session_student` where `form_id` = '$form_id'";

        $result = $con -> query($sql);

        $data  = $result -> fetch_assoc();

        $total_student_count = $data["count(enrollment_no)"];


        if($subject_type === 'theory and practical')
        {
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1e = $data["count(a1)"]; 
    
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1g = $data["count(a1)"]; 
            
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1a = $data["count(a1)"]; 
            
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1p = $data["count(a1)"]; 
            
            
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1v = $data["count(a1)"]; 
    
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1r = $data["count(a1)"]; 
    
    
    
    
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2e = $data["count(a2)"]; 
    
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2g = $data["count(a2)"]; 
            
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2a = $data["count(a2)"]; 
            
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2p = $data["count(a2)"]; 
            
            
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2v = $data["count(a2)"]; 
    
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2r = $data["count(a2)"]; 
    
    
    
    
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3e = $data["count(a3)"]; 
    
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3g = $data["count(a3)"]; 
            
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3a = $data["count(a3)"]; 
            
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3p = $data["count(a3)"]; 
            
            
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3v = $data["count(a3)"]; 
    
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3r = $data["count(a3)"];
    
    
    
    
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4e = $data["count(a4)"]; 
    
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4g = $data["count(a4)"]; 
            
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4a = $data["count(a4)"]; 
            
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4p = $data["count(a4)"]; 
            
            
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4v = $data["count(a4)"]; 
    
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4r = $data["count(a4)"];
    
    
    
    
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5e = $data["count(a5)"]; 
    
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5g = $data["count(a5)"]; 
            
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5a = $data["count(a5)"]; 
            
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5p = $data["count(a5)"]; 
            
            
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5v = $data["count(a5)"]; 
    
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5r = $data["count(a5)"];
    
    
    
    
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6e = $data["count(a6)"]; 
    
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6g = $data["count(a6)"]; 
            
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6a = $data["count(a6)"]; 
            
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6p = $data["count(a6)"]; 
            
            
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6v = $data["count(a6)"]; 
    
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6r = $data["count(a6)"];
    
    
    
    
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7e = $data["count(a7)"]; 
    
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7g = $data["count(a7)"]; 
            
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'a';";
            
            $result = $con -> query($sql);
            $data  = $result -> fetch_assoc();
    
            $a7a = $data["count(a7)"]; 
            
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7p = $data["count(a7)"]; 
            
            
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7v = $data["count(a7)"]; 
    
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7r = $data["count(a7)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8e = $data["count(a8)"]; 
    
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8g = $data["count(a8)"]; 
            
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8a = $data["count(a8)"]; 
            
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8p = $data["count(a8)"]; 
            
            
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8v = $data["count(a8)"]; 
    
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8r = $data["count(a8)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9e = $data["count(a9)"]; 
    
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9g = $data["count(a9)"]; 
            
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9a = $data["count(a9)"]; 
            
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9p = $data["count(a9)"]; 
            
            
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9v = $data["count(a9)"]; 
    
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9r = $data["count(a9)"];
    
    
    
    
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10e = $data["count(a10)"]; 
    
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10g = $data["count(a10)"]; 
            
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10a = $data["count(a10)"]; 
            
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10p = $data["count(a10)"]; 
            
            
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10v = $data["count(a10)"]; 
    
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10r = $data["count(a10)"];
    
    
    
    
    
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11e = $data["count(a11)"]; 
    
    
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11g = $data["count(a11)"]; 
            
    
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11a = $data["count(a11)"]; 
            
    
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11p = $data["count(a11)"]; 
            
            
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11v = $data["count(a11)"]; 
    
    
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11r = $data["count(a11)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12e = $data["count(a12)"]; 
    
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12g = $data["count(a12)"]; 
            
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12a = $data["count(a12)"]; 
            
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12p = $data["count(a12)"]; 
            
            
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12v = $data["count(a12)"]; 
    
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12r = $data["count(a12)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13e = $data["count(a13)"]; 
    
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13g = $data["count(a13)"]; 
            
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13a = $data["count(a13)"]; 
            
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13p = $data["count(a13)"]; 
            
            
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13v = $data["count(a13)"]; 
    
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13r = $data["count(a13)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14e = $data["count(a14)"]; 
    
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14g = $data["count(a14)"]; 
            
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14a = $data["count(a14)"]; 
            
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14p = $data["count(a14)"]; 
            
            
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14v = $data["count(a14)"]; 
    
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14r = $data["count(a14)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15e = $data["count(a15)"]; 
    
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15g = $data["count(a15)"]; 
            
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15a = $data["count(a15)"]; 
            
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15p = $data["count(a15)"]; 
            
            
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15v = $data["count(a15)"]; 
    
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15r = $data["count(a15)"];
        }
        else if($subject_type === 'theory')
        {
    
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1e = $data["count(a1)"]; 
    
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1g = $data["count(a1)"]; 
            
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1a = $data["count(a1)"]; 
            
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1p = $data["count(a1)"]; 
            
            
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1v = $data["count(a1)"]; 
    
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1r = $data["count(a1)"]; 
    
    
    
    
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2e = $data["count(a2)"]; 
    
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2g = $data["count(a2)"]; 
            
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2a = $data["count(a2)"]; 
            
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2p = $data["count(a2)"]; 
            
            
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2v = $data["count(a2)"]; 
    
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2r = $data["count(a2)"]; 
    
    
    
    
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3e = $data["count(a3)"]; 
    
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3g = $data["count(a3)"]; 
            
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3a = $data["count(a3)"]; 
            
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3p = $data["count(a3)"]; 
            
            
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3v = $data["count(a3)"]; 
    
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3r = $data["count(a3)"];
    
    
    
    
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4e = $data["count(a4)"]; 
    
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4g = $data["count(a4)"]; 
            
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4a = $data["count(a4)"]; 
            
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4p = $data["count(a4)"]; 
            
            
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4v = $data["count(a4)"]; 
    
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4r = $data["count(a4)"];
    
    
    
    
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5e = $data["count(a5)"]; 
    
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5g = $data["count(a5)"]; 
            
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5a = $data["count(a5)"]; 
            
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5p = $data["count(a5)"]; 
            
            
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5v = $data["count(a5)"]; 
    
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5r = $data["count(a5)"];
    
    
    
    
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6e = $data["count(a6)"]; 
    
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6g = $data["count(a6)"]; 
            
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6a = $data["count(a6)"]; 
            
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6p = $data["count(a6)"]; 
            
            
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id' and a6 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6v = $data["count(a6)"]; 
    
    
            $sql = "SELECT  count(a6) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a6r = $data["count(a6)"];
    
    
    
    
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7e = $data["count(a7)"]; 
    
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7g = $data["count(a7)"]; 
            
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7a = $data["count(a7)"]; 
            
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7p = $data["count(a7)"]; 
            
            
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id' and a7 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7v = $data["count(a7)"]; 
    
    
            $sql = "SELECT  count(a7) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a7r = $data["count(a7)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8e = $data["count(a8)"]; 
    
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8g = $data["count(a8)"]; 
            
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8a = $data["count(a8)"]; 
            
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8p = $data["count(a8)"]; 
            
            
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id' and a8 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8v = $data["count(a8)"]; 
    
    
            $sql = "SELECT  count(a8) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a8r = $data["count(a8)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9e = $data["count(a9)"]; 
    
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9g = $data["count(a9)"]; 
            
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9a = $data["count(a9)"]; 
            
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9p = $data["count(a9)"]; 
            
            
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id' and a9 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9v = $data["count(a9)"]; 
    
    
            $sql = "SELECT  count(a9) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a9r = $data["count(a9)"];
    
    
    
    
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10e = $data["count(a10)"]; 
    
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10g = $data["count(a10)"]; 
            
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10a = $data["count(a10)"]; 
            
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10p = $data["count(a10)"]; 
            
            
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id' and a10 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10v = $data["count(a10)"]; 
    
    
            $sql = "SELECT  count(a10) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a10r = $data["count(a10)"];
    
        }
        else if($subject_type === 'mock drill')
        {
    
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1e = $data["count(a1)"]; 
    
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1g = $data["count(a1)"]; 
            
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1a = $data["count(a1)"]; 
            
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1p = $data["count(a1)"]; 
            
            
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id' and a1 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1v = $data["count(a1)"]; 
    
    
            $sql = "SELECT  count(a1) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a1r = $data["count(a1)"]; 
    
    
    
    
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2e = $data["count(a2)"]; 
    
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2g = $data["count(a2)"]; 
            
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2a = $data["count(a2)"]; 
            
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2p = $data["count(a2)"]; 
            
            
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id' and a2 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2v = $data["count(a2)"]; 
    
    
            $sql = "SELECT  count(a2) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a2r = $data["count(a2)"]; 
    
    
    
    
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3e = $data["count(a3)"]; 
    
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3g = $data["count(a3)"]; 
            
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3a = $data["count(a3)"]; 
            
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3p = $data["count(a3)"]; 
            
            
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id' and a3 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3v = $data["count(a3)"]; 
    
    
            $sql = "SELECT  count(a3) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a3r = $data["count(a3)"];
    
    
    
    
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4e = $data["count(a4)"]; 
    
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4g = $data["count(a4)"]; 
            
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4a = $data["count(a4)"]; 
            
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4p = $data["count(a4)"]; 
            
            
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id' and a4 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4v = $data["count(a4)"]; 
    
    
            $sql = "SELECT  count(a4) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a4r = $data["count(a4)"];
    
    
    
    
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5e = $data["count(a5)"]; 
    
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5g = $data["count(a5)"]; 
            
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5a = $data["count(a5)"]; 
            
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5p = $data["count(a5)"]; 
            
            
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id' and a5 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5v = $data["count(a5)"]; 
    
    
            $sql = "SELECT  count(a5) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a5r = $data["count(a5)"];
    
    
        }
        else if($subject_type === 'practical')
        {
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11e = $data["count(a11)"]; 
    
    
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11g = $data["count(a11)"]; 
            
    
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11a = $data["count(a11)"]; 
            
    
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11p = $data["count(a11)"]; 
            
            
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id' and a11 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11v = $data["count(a11)"]; 
    
    
            $sql = "SELECT  count(a11) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a11r = $data["count(a11)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12e = $data["count(a12)"]; 
    
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12g = $data["count(a12)"]; 
            
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12a = $data["count(a12)"]; 
            
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12p = $data["count(a12)"]; 
            
            
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id' and a12 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12v = $data["count(a12)"]; 
    
    
            $sql = "SELECT  count(a12) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a12r = $data["count(a12)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13e = $data["count(a13)"]; 
    
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13g = $data["count(a13)"]; 
            
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13a = $data["count(a13)"]; 
            
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13p = $data["count(a13)"]; 
            
            
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id' and a13 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13v = $data["count(a13)"]; 
    
    
            $sql = "SELECT  count(a13) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a13r = $data["count(a13)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14e = $data["count(a14)"]; 
    
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14g = $data["count(a14)"]; 
            
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14a = $data["count(a14)"]; 
            
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14p = $data["count(a14)"]; 
            
            
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id' and a14 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14v = $data["count(a14)"]; 
    
    
            $sql = "SELECT  count(a14) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a14r = $data["count(a14)"];
    
    
    
    
    
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'e';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15e = $data["count(a15)"]; 
    
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'g';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15g = $data["count(a15)"]; 
            
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'a';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15a = $data["count(a15)"]; 
            
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'p';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15p = $data["count(a15)"]; 
            
            
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id' and a15 = 'v';";
            
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15v = $data["count(a15)"]; 
    
    
            $sql = "SELECT  count(a15) from `feedback` WHERE form_id = '$form_id';";
    
            $result = $con -> query($sql);
    
            $data  = $result -> fetch_assoc();
    
            $a15r = $data["count(a15)"];
        }

    }

    //echo "reached outside";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Report</title>
    
    <style>

        table 
        {
            border-collapse: collapse;
            width: 95%;
            color:black;
            font-size: 15px;
            text-align: left;
            border: 1px solid black;
            margin: auto;
        }

        th {
            background-color: rgb(255, 159, 159);
            text-align : center;
            padding: 3px;
            border: 1.5px solid black;
        }

        tr:nth-child(even)
        {
            background-color: white;
        }

        tr:nth-child(odd)
        {
            background-color: bisque;
        }


        td
        {
            padding: 4px;
            text-align : left;
            border: 1.5px solid black;
        }

        #print-button{
            width: 110px;
            height: 30px;
            border-radius: 10px;
            background-color: rgb(139, 221, 253);
            padding: 2px;
            margin-left: 70vw;
            text-align: center;
        }

        #back{
            width: 120px;
            height: 30px;
            border-radius: 10px;
            text-decoration: none;
            background-color:rgb(112, 224, 112);
            padding: 4px;
            margin-left: 5vw;
            text-align: center;
        }

    </style>
</head>
<body id = "body">
    

    <div>
        <button id = "print-button" onclick="pagePrint()">Print</button>
        <a id = "back" href='view_feedback_forms.php'>BACK</a>
    </div>

    <script>
        function pagePrint()
        {
            const body = document.getElementById('body');
            const backup = body.innerHTML;
            const main = document.getElementById('con').innerHTML;

            body.innerHTML = main;
            print();
            body.innerHTML = backup;
        }
    </script>


    <div class = "con" id = "con">
        
        <h1 style = "text-align : center;">Sushila Devi Bansal College, Indore</h1>
        
        <div class = "details">

            <span style = "margin-left: 40px; margin-right: 20px;">Faculty Name : <?php echo $faculty_name?></span>

            <span style = "margin-right: 20px;">(<?php echo $subject_code ?>)</span>
            
            <span style = "margin-right: 20px;">Branch : <?php echo $dept_name?></span>

            <span style = "margin-right: 20px;">Sem : <?php echo $semester?></span>

            <span style = "margin-right: 20px;">Sec: <?php echo $section?></span>

            <span style = "margin-right: 20px;">Total Student : <?php echo $total_student_count?></span>
            
            <span>Date : <?php echo $form_date?></span>
            

        <div>

        <?php

            if($subject_type === 'theory and practical')
            {
                echo "        <h2 style = 'margin-left: 40px;'>Theory Feedback</h2>


                <div>
                    <table>
                        <th>S.No.</th>
                        <th>Parameter</th>
                        <th>Excellent</th>
                        <th>Good</th>
                        <th>Average</th>
                        <th>Poor</th>
                        <th>Very Poor</th>
                        <th>Response</th>
        
                        <tr>
                            <td>1</td>
                            <td>Regular in engaging scheduled classes</td>
                            <td>$a1e</td>
                            <td>$a1g</td>
                            <td>$a1a</td>
                            <td>$a1p</td>
                            <td>$a1v</td>
                            <td>$a1r</td>
                        </tr>
        
                        <tr>
                            <td>2</td>
                            <td>Sincere in covering syllabus</td>
                            <td>$a2e</td>
                            <td>$a2g</td>
                            <td>$a2a</td>
                            <td>$a2p</td>
                            <td>$a2v</td>
                            <td>$a2r</td>
                        </tr>
        
                        <tr>
                            <td>3</td>
                            <td>Classes are effective and interesting</td>
                            <td>$a3e</td>
                            <td>$a3g</td>
                            <td>$a3a</td>
                            <td>$a3p</td>
                            <td>$a3v</td>
                            <td>$a3r</td>
                        </tr>
        
                        <tr>
                            <td>4</td>
                            <td>In-Depth subject knowledge</td>
                            <td>$a4e</td>
                            <td>$a4g</td>
                            <td>$a4a</td>
                            <td>$a4p</td>
                            <td>$a4v</td>
                            <td>$a4r</td>
                        </tr>
        
                        <tr>
                            <td>5</td>
                            <td>Encourage participation in the class</td>
                            <td>$a5e</td>
                            <td>$a5g</td>
                            <td>$a5a</td>
                            <td>$a5p</td>
                            <td>$a5v</td>
                            <td>$a5r</td>
                        </tr>
        
        
                        <tr>
                            <td>6</td>
                            <td>Effective in maintaining discipline</td>
                            <td>$a6e</td>
                            <td>$a6g</td>
                            <td>$a6a</td>
                            <td>$a6p</td>
                            <td>$a6v</td>
                            <td>$a6r</td>
                        </tr>
        
                        <tr>
                            <td>7</td>
                            <td>Explain difficult concepts</td>
                            <td>$a7e</td>
                            <td>$a7g</td>
                            <td>$a7a</td>
                            <td>$a7p</td>
                            <td>$a7v</td>
                            <td>$a7r</td>
                        </tr>
        
                        <tr>
                            <td>8</td>
                            <td>Easily accessible to student</td>
                            <td>$a8e</td>
                            <td>$a8g</td>
                            <td>$a8a</td>
                            <td>$a8p</td>
                            <td>$a8v</td>
                            <td>$a8r</td>
                        </tr>
        
                        <tr>
                            <td>9</td>
                            <td>Attractive personality</td>
                            <td>$a9e</td>
                            <td>$a9g</td>
                            <td>$a9a</td>
                            <td>$a9p</td>
                            <td>$a9v</td>
                            <td>$a9r</td>
                        </tr>
        
                        <tr>
                            <td>10</td>
                            <td>Overall effectiveness of faculty member</td>
                            <td>$a10e</td>
                            <td>$a10g</td>
                            <td>$a10a</td>
                            <td>$a10p</td>
                            <td>$a10v</td>
                            <td>$a10r</td>
                        </tr>
        
                    </table>
        
                </div>
        
                <h2 style = 'margin-left: 40px;'>Practical Feedback</h2>
        
                <div>
                    <table>
        
                        <th>S.No.</th>
                        <th>Parameter</th>
                        <th>Excellent</th>
                        <th>Good</th>
                        <th>Average</th>
                        <th>Poor</th>
                        <th>Very Poor</th>
                        <th>Response</th>
        
                        <tr>
                            <td>1</td>
                            <td>Availability of faculty members in lab</td>
                            <td>$a11e</td>
                            <td>$a11g</td>
                            <td>$a11a</td>
                            <td>$a11p</td>
                            <td>$a11v</td>
                            <td>$a11r</td>
                        </tr>        
        
                        <tr>
                            <td>2</td>
                            <td>Working status of equipment in lab</td>
                            <td>$a12e</td>
                            <td>$a12g</td>
                            <td>$a12a</td>
                            <td>$a12p</td>
                            <td>$a12v</td>
                            <td>$a12r</td>
                        </tr>
        
                        <tr>
                            <td>3</td>
                            <td>Support of faculty members to conduct practical examinations</td>
                            <td>$a13e</td>
                            <td>$a13g</td>
                            <td>$a13a</td>
                            <td>$a13p</td>
                            <td>$a13v</td>
                            <td>$a13r</td>
                        </tr>
        
                        <tr>
                            <td>4</td>
                            <td>Support of lab assistent to conduct practical examinations</td>
                            <td>$a14e</td>
                            <td>$a14g</td>
                            <td>$a14a</td>
                            <td>$a14p</td>
                            <td>$a14v</td>
                            <td>$a14r</td>
                        </tr>
        
        
                        <tr>
                            <td>5</td>
                            <td>Overall status of lab</td>
                            <td>$a15e</td>
                            <td>$a15g</td>
                            <td>$a15a</td>
                            <td>$a15p</td>
                            <td>$a15v</td>
                            <td>$a15r</td>
                        </tr>
                        <table>
                </div>";
            }
            else if($subject_type === 'theory')
            {
                echo "        <h2 style = 'margin-left: 40px;'>Theory Feedback</h2>


                <div>
                    <table>
                        <th>S.No.</th>
                        <th>Parameter</th>
                        <th>Excellent</th>
                        <th>Good</th>
                        <th>Average</th>
                        <th>Poor</th>
                        <th>Very Poor</th>
                        <th>Response</th>
        
                        <tr>
                            <td>1</td>
                            <td>Regular in engaging scheduled classes</td>
                            <td>$a1e</td>
                            <td>$a1g</td>
                            <td>$a1a</td>
                            <td>$a1p</td>
                            <td>$a1v</td>
                            <td>$a1r</td>
                        </tr>
        
                        <tr>
                            <td>2</td>
                            <td>Sincere in covering syllabus</td>
                            <td>$a2e</td>
                            <td>$a2g</td>
                            <td>$a2a</td>
                            <td>$a2p</td>
                            <td>$a2v</td>
                            <td>$a2r</td>
                        </tr>
        
                        <tr>
                            <td>3</td>
                            <td>Classes are effective and interesting</td>
                            <td>$a3e</td>
                            <td>$a3g</td>
                            <td>$a3a</td>
                            <td>$a3p</td>
                            <td>$a3v</td>
                            <td>$a3r</td>
                        </tr>
        
                        <tr>
                            <td>4</td>
                            <td>In-Depth subject knowledge</td>
                            <td>$a4e</td>
                            <td>$a4g</td>
                            <td>$a4a</td>
                            <td>$a4p</td>
                            <td>$a4v</td>
                            <td>$a4r</td>
                        </tr>
        
                        <tr>
                            <td>5</td>
                            <td>Encourage participation in the class</td>
                            <td>$a5e</td>
                            <td>$a5g</td>
                            <td>$a5a</td>
                            <td>$a5p</td>
                            <td>$a5v</td>
                            <td>$a5r</td>
                        </tr>
        
        
                        <tr>
                            <td>6</td>
                            <td>Effective in maintaining discipline</td>
                            <td>$a6e</td>
                            <td>$a6g</td>
                            <td>$a6a</td>
                            <td>$a6p</td>
                            <td>$a6v</td>
                            <td>$a6r</td>
                        </tr>
        
                        <tr>
                            <td>7</td>
                            <td>Explain difficult concepts</td>
                            <td>$a7e</td>
                            <td>$a7g</td>
                            <td>$a7a</td>
                            <td>$a7p</td>
                            <td>$a7v</td>
                            <td>$a7r</td>
                        </tr>
        
                        <tr>
                            <td>8</td>
                            <td>Easily accessible to student</td>
                            <td>$a8e</td>
                            <td>$a8g</td>
                            <td>$a8a</td>
                            <td>$a8p</td>
                            <td>$a8v</td>
                            <td>$a8r</td>
                        </tr>
        
                        <tr>
                            <td>9</td>
                            <td>Attractive personality</td>
                            <td>$a9e</td>
                            <td>$a9g</td>
                            <td>$a9a</td>
                            <td>$a9p</td>
                            <td>$a9v</td>
                            <td>$a9r</td>
                        </tr>
        
                        <tr>
                            <td>10</td>
                            <td>Overall effectiveness of faculty member</td>
                            <td>$a10e</td>
                            <td>$a10g</td>
                            <td>$a10a</td>
                            <td>$a10p</td>
                            <td>$a10v</td>
                            <td>$a10r</td>
                        </tr>
        
                    </table>
        
                </div>";
            }
            else if($subject_type === 'mock drill')
            {
                echo "        <h2 style = 'margin-left: 40px;'>Mock Drill Feedback</h2>


                <div>
                    <table>
                        <th>S.No.</th>
                        <th>Parameter</th>
                        <th>Excellent</th>
                        <th>Good</th>
                        <th>Average</th>
                        <th>Poor</th>
                        <th>Very Poor</th>
                        <th>Response</th>
        
                        <tr>
                            <td>1</td>
                            <td>Trainer/facilitator/faculty to communicate (Pre Placement Talk) the process.</td>
                            <td>$a1e</td>
                            <td>$a1g</td>
                            <td>$a1a</td>
                            <td>$a1p</td>
                            <td>$a1v</td>
                            <td>$a1r</td>
                        </tr>
        
                        <tr>
                            <td>2</td>
                            <td>Trainer/facilitator/faculty ability to stimulate student interest and encourage participation.</td>
                            <td>$a2e</td>
                            <td>$a2g</td>
                            <td>$a2a</td>
                            <td>$a2p</td>
                            <td>$a2v</td>
                            <td>$a2r</td>
                        </tr>
        
                        <tr>
                            <td>3</td>
                            <td>Process(GD/PI/TI) intelligent to discuss course content and problems.</td>
                            <td>$a3e</td>
                            <td>$a3g</td>
                            <td>$a3a</td>
                            <td>$a3p</td>
                            <td>$a3v</td>
                            <td>$a3r</td>
                        </tr>
        
                        <tr>
                            <td>4</td>
                            <td>Value of assigned drills and exercises.</td>
                            <td>$a4e</td>
                            <td>$a4g</td>
                            <td>$a4a</td>
                            <td>$a4p</td>
                            <td>$a4v</td>
                            <td>$a4r</td>
                        </tr>
        
                        <tr>
                            <td>5</td>
                            <td>Amount learned from the process(take away) in terns of knowledge, concepts, skills and thinking ability.</td>
                            <td>$a5e</td>
                            <td>$a5g</td>
                            <td>$a5a</td>
                            <td>$a5p</td>
                            <td>$a5v</td>
                            <td>$a5r</td>
                        </tr>
        
                    </table>
        
                </div>";
            }
            else if($subject_type === 'practical')
            {
                echo "                <h2 style = 'margin-left: 40px;'>Practical Feedback</h2>
        
                <div>
                    <table>
        
                        <th>S.No.</th>
                        <th>Parameter</th>
                        <th>Excellent</th>
                        <th>Good</th>
                        <th>Average</th>
                        <th>Poor</th>
                        <th>Very Poor</th>
                        <th>Response</th>
        
                        <tr>
                            <td>1</td>
                            <td>Availability of faculty members in lab</td>
                            <td>$a11e</td>
                            <td>$a11g</td>
                            <td>$a11a</td>
                            <td>$a11p</td>
                            <td>$a11v</td>
                            <td>$a11r</td>
                        </tr>        
        
                        <tr>
                            <td>2</td>
                            <td>Working status of equipment in lab</td>
                            <td>$a12e</td>
                            <td>$a12g</td>
                            <td>$a12a</td>
                            <td>$a12p</td>
                            <td>$a12v</td>
                            <td>$a12r</td>
                        </tr>
        
                        <tr>
                            <td>3</td>
                            <td>Support of faculty members to conduct practical examinations</td>
                            <td>$a13e</td>
                            <td>$a13g</td>
                            <td>$a13a</td>
                            <td>$a13p</td>
                            <td>$a13v</td>
                            <td>$a13r</td>
                        </tr>
        
                        <tr>
                            <td>4</td>
                            <td>Support of lab assistent to conduct practical examinations</td>
                            <td>$a14e</td>
                            <td>$a14g</td>
                            <td>$a14a</td>
                            <td>$a14p</td>
                            <td>$a14v</td>
                            <td>$a14r</td>
                        </tr>
        
        
                        <tr>
                            <td>5</td>
                            <td>Overall status of lab</td>
                            <td>$a15e</td>
                            <td>$a15g</td>
                            <td>$a15a</td>
                            <td>$a15p</td>
                            <td>$a15v</td>
                            <td>$a15r</td>
                        </tr>
                        <table>
                </div>";         
            }
        ?>


    </div>    
</body>
</html>