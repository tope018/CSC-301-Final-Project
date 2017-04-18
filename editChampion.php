<?php

//include configuration file
include('config.php');

//if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $championName = $_POST['championName'];
    $wins = $_POST['wins'];
    $losses = $_POST['losses'];
    $sql= file_get_contents("SQL/replaceChampion.sql");
    $params = array(
            'championname' => $championName,
            'wins' => $wins,
            'losses' => $losses,
            'username' => $_SESSION["username"]
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
        Edit Champion Page
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
            <h1>Edit Champion Data</h1>
            <form action="" method="POST">
                <div>
                    <div class="outer">
                        <h4>Champion</h4>
                        <select name="championName" style="width: 150px; height: 31px;">
                        <?php
                        $sql = file_get_contents("SQL/getChampionNames.sql");
                        $statement = $database->prepare($sql);
                        $statement->execute();
                        $champions = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($champions as $champion) : ?>
                        <option value="<?php echo $champion["ChampionName"]?>"><?php echo $champion["ChampionName"]?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="outer">
                        <h4>Wins</h4>
                        <input type="number" name="wins" style="width: 150px; height: 25px;">
                    </div>
                    <div class="outer">
                    <h4>Losses</h4>
                        <input type="number" name="losses" style="width: 150px; height: 25px;">
                    </div>
                    <div class="outer">
                        <h4> </h4>
                        <input type="submit" value="Submit" style="margin-left: 10px">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>