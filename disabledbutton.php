<?php
include("gamedata.php");
session_start();

$responseDisableButton = $_SESSION['hangmanObject']->getDisabledButton();
echo json_encode($responseDisableButton);
