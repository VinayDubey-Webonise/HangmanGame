$(document).ready(function() {

    function setLatestValues(){
        getAttemptsLeft();
        getGuessedWord();
        defaultButtonDisable();
    }

    function getGuessedWord(){
        $.ajax({
            type: "GET",
            url: "getguessedword.php",    
            datatype: "json",
            success: function(response){    
                fillGuessedWord(response);
            },
            error: function(exception) {
              alert(exception.message);
            }
        });
    }


    function checkWon(response){
        jsonArray = JSON.parse(response);
        for(loop = 0; loop <= jsonArray.length; loop++){
            if (jsonArray[loop] == '_'){
                return 0;
            }
        }
        return 1;
    }

    function getStickFigure(attempt){
       $('#hangmanFigure').attr('src','images/hang'+ attempt +'.png');     
    }

    function disableClickedButton(idClicked){
         // disables the clicked buttons
        $("#" + idClicked).attr("disabled", true);
        guessedLetter = ($("#" + idClicked).text().toLowerCase());
        setClickedButtonValue(guessedLetter);
    }

    function setClickedButtonValue(guessedLetter){
        $.ajax({
            type: "GET",
            url: "setguessedinput.php",    
            data: "guessedLetter=" + guessedLetter,
            datatype: "json",
            success: function(response){     
              fillGuessedWord(response);
              getAttemptsLeft();

              if(checkWon(response)){
                  alert ("Congrates you won :");
                  disableKeypad();
              }
            },
            error: function(exception) {
              alert(exception.message);
            }
          });    
    }

    function fillGuessedWord(response){
        jsonArray = JSON.parse(response);
        $("#guessedWord").text(jsonArray.join(" "));
    }

    $(".keypad").click(function(buttonListener){
        var idClicked = buttonListener.target.id;
        disableClickedButton(idClicked);         
    });

    $(".newWordButton").click(function(){
        resetGame();       
    });
    
    function getAttemptsLeft(){
        $.ajax({
            type: "GET",
            url: "getattemptsleft.php",    
            success: function(response){    
              if(response <= "0"){
                disableKeypad();
                alert ("You Died. Game Over");
                getActualWord();
              } 
              $("#attempts").text(response);
              getStickFigure(response);
            },
            error: function(exception) {
              alert(exception.message);
            }
        });
    }

    function getActualWord(){
        $.ajax({
            url: "getActualWord.php",    
            success: function(response){
                jsonArray = JSON.parse(response);
                $("#actualWord").text("Secret word: "+jsonArray.join(""));
            },
            error: function(exception) {
              alert(exception.message);
            }
        });
    }

    function disableKeypad(){
        $(".keypad").attr("disabled", true);
    }

    function resetGame(){
        $.ajax({
            url: "resetgame.php",    
            success: function(response){    
                location.reload(); 
            },
            error: function(exception) {
              alert(exception.message);
            }
        });
    }

    function defaultButtonDisable(){
        $.ajax({
            url: "disabledbutton.php",    
            success: function(response){    
                jsonArray = JSON.parse(response);
                for(loop = 0; loop < jsonArray.length; loop++){
                    $("#" + jsonArray[loop]).attr("disabled", true);
                }
            },
            error: function(exception) {
              alert(exception.message);
            }
        });
    }
    
    setLatestValues();

});
