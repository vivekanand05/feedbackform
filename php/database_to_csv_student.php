<?php

error_reporting(0);
    
function export($academic_session_id)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "student_feedback_db";


    $conn = new mysqli($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . $conn ->connect_error);
    }

    header('Content-Type:text/csv;charset=utf-8');

    header('Content-Disposition: attachment; filename = student_data.csv');

        $output = fopen("php://output", "w");

        // fputcsv($output, array('enrollment_no','name', 'academic_session_id'));

        $sql = "SELECT `enrollment_no`,`name` FROM `academic_session_student` NATURAL JOIN `student` WHERE `academic_session_id` = '$academic_session_id';";

        $result = mysqli_query($conn, $sql); 

        while($row = mysqli_fetch_assoc($result))
        {
            fputcsv($output, $row);
        }

        $result -> free_result();

        fclose($output);

        exit();

}
?>
