<?php
include("gamedata.php");
session_start();

$responseGuessLetter = $_SESSION['hangmanObject']->setGuessedLetters($_GET['guessedLetter']);
echo json_encode($responseGuessLetter);
