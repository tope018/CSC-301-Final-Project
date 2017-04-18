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
<?php include('leftBox.php') ?>
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