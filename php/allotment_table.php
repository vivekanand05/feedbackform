<?php
    //error_reporting(0);
    require('config.php');

    function printAllotmentTable($academic_session_id)
    {
        $conn = getdb();

        $sql = "SELECT `academic_session_id`, `subject_code`, `faculty_email`, `name` from `academic_session_subject_faculty` NATURAL JOIN `faculty` WHERE `academic_session_id` = '$academic_session_id';";

        $result = $conn->query($sql);


        echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>Faculty Allotment</h2>";

        echo "<br>";
        echo "<table>";

        echo "<th>Academic Session</th>";
        echo "<th>Subject Code</th>";
        echo "<th>Subject Name</th>";
        echo "<th>Faculty Email</th>";
        echo "<th>Faculty Name</th>";
        

        while($data = $result->fetch_assoc())
        {
            echo "<tr><td>";
            echo $data['academic_session_id'];
            echo "</td><td>";

            $subject_code = $data['subject_code'];

            echo $subject_code;
            echo "</td><td>";

            $sql2 = "SELECT `subject_name`FROM `subj` WHERE `subject_code` ='$subject_code';";
        
            $result2 = $conn->query($sql2);

            $data2 = $result2->fetch_assoc();

            $subject_name = $data2['subject_name'];

            echo $subject_name;
            echo "</td><td>";


            echo $data['faculty_email'];
            echo "</td><td>";

            echo $data['name'];
            echo "</td></tr>";
        }


    }
    
?>



