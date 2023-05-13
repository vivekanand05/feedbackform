<?php
    error_reporting(0);
    
    function getdb()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "student_feedback_db";
    
        $con = new mysqli($servername, $username, $password, $database);
    
        if (!$con) {
            die("Connection failed: " . $con ->connect_error);
        }
        
        return $con;
    }
?>