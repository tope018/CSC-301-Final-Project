<?php

//include configuration file
include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <title>
        View Winrate Page
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
            <h1>View Champion Data</h1>
            <table>
                <tr>
                    <th>Champion Name</th>
                    <th>Position</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Win Rate</th>
                </tr>
                <?php
                $sql = file_get_contents("SQL/getUserData.sql");
                $params = array(
                        'username' => $_SESSION["username"]
                );
                $statement = $database->prepare($sql);
                $statement->execute($params);
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach($data as $array) : ?>
                <tr>
                    <td><?php echo $array["ChampionName"] ?></td>
                    <td><?php echo $array["Position"] ?></td>
                    <td><?php echo $array["Win"] ?></td>
                    <td><?php echo $array["Loss"] ?></td>
                    <?php $winrate = $array["Win"] /($array["Loss"] + $array["Win"]) * 100 ?>
                    <td><?php echo round($winrate) . "%" ?></td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</body>
</html>