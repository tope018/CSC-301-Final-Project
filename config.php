<?php
//include functions.php
include('functions.php');

// Connecting to the MySQL database
$user = 'topen1';
$password = 'sJQwnaRf';

$database = new PDO('mysql:host=localhost;dbname=db_spring17_topen1', $user, $password);

//autoloader function
function my_autoloader($class) {
    include 'class.' . $class . '.php';
}

spl_autoload_register('my_autoloader');

// Start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URI']);


// if username is not set in the session and current URL not login.php redirect to login page
if (!isset($_SESSION["username"]) && $current_url != 'login.php') {
    header("Location: login.php");
}
