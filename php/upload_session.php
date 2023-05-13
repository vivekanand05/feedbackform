
<?php

error_reporting(0);

session_start();

if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
{
    header('Location: index.php');
}

require('config.php');
    
$con = getdb();

$inserted_count = 0;
$excluded_count = 0;

$message = " ";

if(isset($_POST["import"]))
{
    $filename = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");

        while(($data = fgetcsv($file, 1000, ",")) !== FALSE)
        {
            $dept_name = $data[0];
            $semester = $data[1];
            $section = $data[2];
            $duration = $data[3];
            $year = $data[4];

            $sql = "INSERT INTO `academic_session`(`dept_name`, `semester`, `section`, `duration`, `year`) VALUES
            ('$dept_name','$semester','$section','$duration','$year')";
            
    
            try
            {
                $result = mysqli_query($con, $sql);
                $inserted_count++;     
            }
            catch(mysqli_sql_exception $e)
            {
                $excluded_count++;
                continue;
            }

            if(!isset($result))
            {
                break;
            }

        }

    }

    $message = "<br><br><p style = 'color: green';>CSV file has been sucessfully uploaded. <br> $excluded_count duplicates excluded.<br> $inserted_count tuples inserted<p>";
    

}

$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Academic Session Details</title>
<link rel="stylesheet" href="navbar.css">
        <style>

        body{
            font-family: 'Times New Roman', Times, serif;
            background-color: rgb(139, 221, 253);
            height: 100vh;
        }
        .guidelines{

            width: 600px;
            max-height: 700px;
            padding: 10px;
            border: 2px solid black;
            background-color: rgb(223, 221, 221);
            text-align: center;
            margin: auto;
            font-size: 20px;
        }


        #dashboard{
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
            <a id = "dashboard" href='admin_dashboard_session.php'>DASHBOARD</a>
        </div>

    </div>      
    
</header>


<br>
<br>

<div class = "guidelines">
    <br>
    <h3>UPLOAD CSV FILE</h3>
    <br><br>

    <p>Follow below steps to upload Academic Session details from CSV file.</p>
    <br>
    <p>Don't include column header in CSV file</p>
    <br>
    <p>In CSV file write fields in given order <br>(dept_name, semester, section, duration, year)</p>
    <br>
    <p>Then upload the CSV file.</p>

    <br>
    <br>

    <form action="upload_session.php" method = "post" name = "upload_excel" enctype="multipart/form-data">

    <input style ="background-color: "type="file" name = "file" accept =".csv">

    <input type="submit" name ="import" value ="Upload to Database">
    <br>
    <br>

    <?php
    echo $message;
    ?>
    </form>

</div>    
    
</body>
</html>


