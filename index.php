<?php

//include configuration file
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <title>
        Home Page
    </title>
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
        <ul role="menubar" title="Link List">
            <li role="menuitem"><a class="nav" href="index.php">Home</a></li>
            <li role="menuitem"><a class="nav" href="addChampion.php">Add Champion</a></li>
            <li role="menuitem"><a class="nav" href="editChampion.php">Edit Champion</a></li>
            <li role="menuitem"><a class="nav" href="viewWinrate.php">View Winrate</a></li>
            <li role="menuitem"><a class="nav" href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="right-box">
        <div class="wrapper">
        <h1>Welcome <?php echo $_SESSION["username"] ?>!!</h1>
        <br>
        <img src="Images/ekko.jpg" style="width:297px; height:167px">
        <img src="Images/caitlyn.jpg" style="width:297px; height:167px">
        <img src="Images/braum.jpg" style="width:297px; height:167px">
        <img src="Images/ahri.jpg" style="width:297px; height:167px">
        <br>
        <h2>Champion Info At Your FingerTips</h2>
        <p>
            Playing champions is fun, but how do your different champions compare?
            Which champion do you play the best? Which champion do you play the worst?
            Through the use of this website, you are able to input any champion you play,
            along with updating how many times you win and lose for each champion. Using the
            side navigation bar, you can view your winrates for each champion, allowing you to
            see which champions you perform best with.
        </p>
        </div>
    </div>
    
</body>
</html>