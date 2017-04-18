<?php

//include configuration file
include('config.php');

//if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION["champion"] = $_POST['champion'];
    header("Location: viewWinrate.php");

}

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
    <?php include('leftBox.php') ?>
    <div class="right-box">
        <div class="wrapper">
            <h1>View Champion Data For <?php echo $_SESSION["username"] ?></h1>
            <table>
                <tr>
                    <th>Champion Name</th>
                    <th>Position</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Win Rate</th>
                </tr>
                <?php
                $userData = new UserData($_SESSION["username"], $database);
                $data = $userData->getArray();
                $totalWinrate = calculateOverallWinrate($data);
                foreach($data as $array) : ?>
                <tr>
                    <td><?php echo $array["ChampionName"] ?></td>
                    <td><?php echo $array["Position"] ?></td>
                    <td><?php echo $array["Win"] ?></td>
                    <td><?php echo $array["Loss"] ?></td>
                    <td><?php echo calculateWinrate($array) ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4">Overall</td>
                    <td><?php echo $totalWinrate ?></td>
                </tr>
            </table>
            <br><br>
            <h2>Champion Data For All Users</h2>
            <form action="" method="POST">
                <input type="text" name="champion" style="width: 150px; height: 25px;">
                <div class="outer">
                    <input type="submit" value="Lookup" style="margin-left: 10px">
                </div>
            </form>
            <table style="margin-top: 15px">
                <tr>
                    <th>Champion Name</th>
                    <th>Username</th>
                    <th>Position</th>
                    <th>Win Rate</th>
                </tr>
                <?php
                if (isset($_SESSION["champion"])) : ?>
                    <?php
                    $sql = file_get_contents("SQL/getAllChampionInfo.sql");
                    $params = array(
                            'championName' => $_SESSION["champion"]
                    );
                    $statement = $database->prepare($sql);
                    $statement->execute($params);
                    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach($data as $array) : ?>
                <tr>
                    <td><?php echo $_SESSION["champion"] ?></td>
                    <td><?php echo $array["Username"] ?></td>
                    <td><?php echo $array["Position"] ?></td>
                    <td><?php echo calculateWinrate($array) ?></td>
                </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>

        </div>
    </div>
</body>
</html>