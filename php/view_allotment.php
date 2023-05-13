
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Academic Session Details</title>
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="navbar.css">
    <style>
        body{
        font-family: 'Times New Roman', Times, serif;
        background-color: rgb(139, 221, 253);
        height: 100vh;
    }

    form{
        display: inline;

        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
        margin-right: 20px;
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
                <a id = "dashboard" href='allot_subject.php'>BACK</a>
            </div>
        </div>      
        
</header>

    <hr>
    <br>
    <br>

    
    <?php

        //error_reporting(0);
        
        session_start();
        
        if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
        {
            header('Location: index.php');
        }

        require('allotment_table.php');

        if(isset($_SESSION['academic_session_id']))
        {
            $academic_session_id = $_SESSION['academic_session_id'];

            printAllotmentTable($academic_session_id);
        }
        
    ?>

    <br><br>
    
</body>
</html>



