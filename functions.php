<?php

function calculateWinrate($array) {
    if ($array["Win"] == 0 && $array["Loss"] == 0)
        return "0%";
    else {
        $winRate = $array["Win"] / ($array["Loss"] + $array["Win"]) * 100;
        return round($winRate) . "%";
    }
}

function calculateOverallWinrate($array) {
    $wins = 0;
    $losses = 0;
    foreach ($array as $arrayData) {
        $wins = $wins + $arrayData["Win"];
        $losses = $losses + $arrayData["Loss"];
    }
    if ($wins == 0 && $losses == 0)
        return "0%";
    else {
        return round($wins / ($losses + $wins) * 100) . "%";
    }
}