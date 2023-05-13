
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subject Details</title>
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
                <a id = "dashboard" href='admin_dashboard_subject.php'>Dashboard</a>
            </div>

        </div>      
        
</header>

    <hr>
    <br>
    <br>

    <form action="view_subject.php" method = "post">

        <input type="submit" name = "view_all" value = "View All Subject">

    </form>

    <form action="view_subject.php" method = "post">

        <select name="dept_name" id="dept_name" required>
            <option value="" disabled hidden selected>Select Department</option>
            <option value="CS">CS</option>
            <option value="IT">IT</option>
            <option value="ME">ME</option>
            <option value="CE">CE</option>
            <option value="EC">EC</option>
            <option value="MBA">MBA</option>
        </select>

    
        <select name="semester" id="semester" required>
            <option value="" disabled hidden selected>Select Semester</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>

        <input type="submit" name = "Search" value = "Search">

    </form>

    <br>
    <br>

    <hr>

    <?php

        //error_reporting(0);
        
        session_start();

        if((!isset($_SESSION['user_id'])) || ($_SESSION['role'] !== 'ADMIN'))
        {
            header('Location: index.php');
        }
                
        require('subject_table.php');

        if(isset($_POST['view_all']))
        {
            printSessionTable('view_all', ' ', ' ', ' ', ' ');
        }
        else if(isset($_POST['Search']))
        {
            $dept_name = $_POST['dept_name'];
            $semester = $_POST['semester'];

            printSessionTable('Search', $dept_name, $semester);
        }
        else
        {
            printSessionTable('view_all', ' ', ' ', ' ', ' ');
        }

    ?>

    <br><br>
    
</body>
</html>



