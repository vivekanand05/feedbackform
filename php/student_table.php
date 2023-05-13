<?php
    error_reporting(0);
    require('config.php');

    function printStudentTable($view_type, $parameter)
    {
        $conn = getdb();

        if($view_type === "SearchByEnrollment")
        {
            $sql = "SELECT * FROM `student` where enrollment_no = '$parameter'";

            $result = $conn->query($sql);

            echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>LIST OF STUDENTS</h2>";
            echo "<br>";
            echo "<table>";
            echo "<th>Enrollment No</th>";
            echo "<th>Name</th>";
        
            while($data = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $data['enrollment_no'];
                echo "</td><td>";

                echo $data['name'];
                echo "</td>";
                
            }
            echo "</table>";

        }        
        else if($view_type === "SearchByName")
        {
            $sql = "SELECT * FROM `student` where name = '$parameter'";

            $result = $conn->query($sql);

            echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>LIST OF STUDENTS</h2>";
            echo "<br>";
            echo "<table>";
            echo "<th>Enrollment No</th>";
            echo "<th>Name</th>";
        
            while($data = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $data['enrollment_no'];
                echo "</td><td>";

                echo $data['name'];
                echo "</td>";
                
            }
            echo "</table>";

        }
        else if($view_type === "SearchByAcademicSessionId")
        {
            $sql = "SELECT `enrollment_no`,`name`,`academic_session_id` FROM `academic_session_student` NATURAL JOIN `student` WHERE `academic_session_id` = '$parameter';";

            $result = $conn->query($sql);

            echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>LIST OF STUDENTS</h2>";
            echo "<br>";
            echo "<table>";
            echo "<th>Enrollment No</th>";
            echo "<th>Name</th>";
        
            while($data = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $data['enrollment_no'];
                echo "</td><td>";

                echo $data['name'];
                echo "</td></tr>";
                
            }
            echo "</table>";

        }
        else if($view_type === "view_all")
        {
            $sql = "SELECT * FROM `student`";

            $result = $conn->query($sql);

            echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>LIST OF STUDENTS</h2>";
            echo "<br>";
            echo "<table>";
            echo "<th>Enrollment No</th>";
            echo "<th>Name</th>";
        
            while($data = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $data['enrollment_no'];
                echo "</td><td>";

                echo $data['name'];
                echo "</td>";
                
            }
            echo "</table>";

        }
    }
    
?>
