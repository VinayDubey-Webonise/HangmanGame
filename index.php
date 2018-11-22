<?php
if(!isset($_SESSION['hangmanObject'])){
  include("secretword.php");
}
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>Crawl task</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js" ></script>
  </head>

  <body>
    <header class="container">
      <h1 class="mainHeader text-dark">Hangman Word Game</h1>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php" id="newWordButton">New Word</a>
          </li>
        </ul>  
      </nav>
    </header>
    
    <div class="container formBody">
    <form action="crawlweb.php" method="GET">
      <div class="form-group">
        <label for="text">Guess the Secret Word</label>
        <h2 id="guessedWord">
          <!-- print the letters guessed by the user using ajax -->
        </h2>
      </div>
      <div class="alert alert-info" role="alert">
        Attempts Remaining:
        <strong id="attempts">
          <!-- number of attempts will be printed here -->
        </strong>
        <br>
        <strong>
           <span id="actualWord">Secret word: </span>
        </strong>
      </div>
    </form>
    </div>

    <div class="container">
      <div class="btn-toolbar">
        <div class="btn-group btn-group-sm mx-auto">
          <button class="btn btn-default keypad" id="a">A</button>
          <button class="btn btn-default keypad" id="b">B</button>
          <button class="btn btn-default keypad" id="c">C</button>
          <button class="btn btn-default keypad" id="d">D</button>
          <button class="btn btn-default keypad" id="e">E</button>
          <button class="btn btn-default keypad" id="f">F</button>
          <button class="btn btn-default keypad" id="g">G</button>
          <button class="btn btn-default keypad" id="h">H</button>
          <button class="btn btn-default keypad" id="i">I</button>
          <button class="btn btn-default keypad" id="j">J</button>
          <button class="btn btn-default keypad" id="k">K</button>
          <button class="btn btn-default keypad" id="l">L</button>
          <button class="btn btn-default keypad" id="m">M</button>
          <button class="btn btn-default keypad" id="n">N</button>
          <button class="btn btn-default keypad" id="o">O</button>
          <button class="btn btn-default keypad" id="p">P</button>
          <button class="btn btn-default keypad" id="q">Q</button>
          <button class="btn btn-default keypad" id="r">R</button>
          <button class="btn btn-default keypad" id="s">S</button>
          <button class="btn btn-default keypad" id="t">T</button>
          <button class="btn btn-default keypad" id="u">U</button>
          <button class="btn btn-default keypad" id="v">V</button>
          <button class="btn btn-default keypad" id="w">W</button>
          <button class="btn btn-default keypad" id="x">X</button>
          <button class="btn btn-default keypad" id="y">Y</button>
          <button class="btn btn-default keypad" id="z">Z</button>
        </div>
      </div>
    </div>
    
    <div class="container" id="hangmanImage" align="center">
        <img src="" width="30%" id="hangmanFigure">
    </div>
  </body>
</html>
