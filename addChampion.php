<?php

//include configuration file
include('config.php');

//if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $championName = $_POST['championName'];
    $position = $_POST['position'];
    $sql = file_get_contents("SQL/insertChampion.sql");
    $params = array(
            'championName' => $championName,
            'position' => $position
    );
    $statement = $database->prepare($sql);
    $statement->execute($params);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <title>
        Add Champion Page
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
            <div class="outer">
                <h1>Add Champion</h1>
                <form action="" method="POST">
                    <div class="outer">
                        <h4>Champion Name</h4>
                        <input type="text" name="championName" style="width: 150px; height: 25px;">
                    </div>
                    <div class="outer">
                        <h4>Position</h4>
                        <input type="text" name="position" style="width: 150px; height: 25px;">
                    </div>
                    <div class="outer">
                        <h4> </h4>
                        <input type="submit" value="Add" style="margin-left: 10px">
                    </div>
                </form>
            </div>
            <br><br><br>
            <h2>Current Champions</h2>
            <table>
                <tr>
                    <th>Champion Name</th>
                    <th>Position</th>
                </tr>
                <?php
                $sql = file_get_contents("SQL/getChampionInfo.sql");
                $statement = $database->prepare($sql);
                $statement->execute();
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach($data as $array) : ?>
                    <tr>
                        <td><?php echo $array["ChampionName"] ?></td>
                        <td><?php echo $array["Position"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</body>
</html>