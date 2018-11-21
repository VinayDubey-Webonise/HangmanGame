<?php
unset($_SESSION['hangmanObject']);
include("secretword.php");
header('Location: index.php');
