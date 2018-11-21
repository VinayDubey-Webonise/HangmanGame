<?php
include("gamedata.php");
session_start();

// select random word from the array

$randomWordArray = array("forgetful","grandmother","river","lucky","record","suggestion","unknown","notebook","sulky");
$randomKey = array_rand($randomWordArray,1);

$gameData = new GameData($randomWordArray[$randomKey]);
$_SESSION['hangmanObject'] = $gameData;
