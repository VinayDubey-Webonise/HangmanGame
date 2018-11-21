<?php
include("gamedata.php");
session_start();

echo $_SESSION['hangmanObject']->getAttempts();
