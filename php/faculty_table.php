<?php
    //error_reporting(0);
    require('config.php');

    function printSessionTable($view_type, $parameter1, $parameter2)
    {
        $conn = getdb();

        if($view_type === "view_all")
        {

            $sql = "SELECT * FROM `faculty`";

            $result = $conn->query($sql);

            echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>LIST OF Faculty</h2>";
            echo "<br>";
            echo "<table>";
            echo "<th>Faculty Email</th>";
            echo "<th>Faculty Name</th>";
        
            while($data = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $data['faculty_email'];
                echo "</td><td>";

                echo $data['name'];
                echo "</td></tr>";

            }
            echo "</table>";

        }        
    }
    
?>
