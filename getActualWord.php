<?php
include("gamedata.php");
session_start();

$responseActualWord = $_SESSION['hangmanObject']->secretWordArray;
echo json_encode($responseActualWord);
