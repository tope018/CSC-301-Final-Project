<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
//include('functions.php');

//If form submitted:

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get username and password from the form as variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    //set a session variable with a key of username equal to the username returned
    $_SESSION['username'] = $username;

    //redirect to the index.php file
    header('location: index.php');

}

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <title>Login Page</title>
    <style>
        .textwrap {
            float: right;
            margin: 10px;
        }
    </style>
    <meta charset="utf-8">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
<div class="left-box">
    <div class="icon">
        <img src="Images/kalista%20icon.png" alt="Kalista Icon"
             style="width:200px; height:200px">
    </div>
    <ul class="side-nav" role="menubar" title="Link List">
        <li role="menuitem"><a class="nav" href="index.php">Home</a></li>
        <li role="menuitem"><a class="nav" href="addChampion.php">Add Champion</a></li>
        <li role="menuitem"><a class="nav" href="editChampion.php">Edit Champion</a></li>
        <li role="menuitem"><a class="nav" href="viewWinrate.php">View Winrate</a></li>
        <li role="menuitem"><a class="nav" href="logout.php">Logout</a></li>
    </ul>
</div>
<div class="right-box">
    <div class="wrapper">
    <h1>Login</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" value="Log In" />
    </form>
    </div>
</div>
</body>
</html>