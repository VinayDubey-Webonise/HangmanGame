<?php
include("gamedata.php");
session_start();

$responseGuessLetter = $_SESSION['hangmanObject']->getGuessedLetters();
echo json_encode($responseGuessLetter);
