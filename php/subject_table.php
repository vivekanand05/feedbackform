<?php
    //error_reporting(0);
    require('config.php');

    function printSessionTable($view_type, $parameter1, $parameter2)
    {
        $conn = getdb();

        if($view_type === "Search")
        {

            $sql = "SELECT * FROM `subj` WHERE `dept_name` = '$parameter1' and `semester` = '$parameter2'";

            $result = $conn->query($sql);

            echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>LIST OF SUBJECT</h2>";
            echo "<br>";
            echo "<table>";
            echo "<th>Subject Code</th>";
            echo "<th>Subject Name</th>";
            echo "<th>Subject Type</th>";
            echo "<th>Department Name</th>";
            echo "<th>Semester</th>";
     

            while($data = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $data['subject_code'];
                echo "</td><td>";

                echo $data['subject_name'];
                echo "</td><td>";

                echo $data['subject_type'];
                echo "</td><td>";

                echo $data['dept_name'];
                echo "</td><td>";

                echo $data['semester'];
                echo "</td></tr>";

            }
            echo "</table>";
        }        
        else if($view_type === "view_all")
        {

            $sql = "SELECT * FROM `subj`";

            $result = $conn->query($sql);

            echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>LIST OF SUBJECT</h2>";
            echo "<br>";
            echo "<table>";
            echo "<th>Subject Code</th>";
            echo "<th>Subject Name</th>";
            echo "<th>Subject Type</th>";
            echo "<th>Department Name</th>";
            echo "<th>Semester</th>";
        
            while($data = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $data['subject_code'];
                echo "</td><td>";

                echo $data['subject_name'];
                echo "</td><td>";

                echo $data['subject_type'];
                echo "</td><td>";

                echo $data['dept_name'];
                echo "</td><td>";

                echo $data['semester'];
                echo "</td></tr>";

            }
            echo "</table>";

        }
    }
    
?>
