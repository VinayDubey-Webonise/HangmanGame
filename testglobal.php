<?php
include("gamedata.php");
session_start();

$responseGuessLetter = $_SESSION['hangmanObject']->setGuessedLetters($_GET['']);
if ($responseGuessLetter != 0){
    echo json_encode($responseGuessLetter);
}
else{
    echo "error";
    return 0;
}
?>