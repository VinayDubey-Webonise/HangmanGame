<?php
class GameData { 
    public $userInputCharacters;
    public $secretWordArray;
    public $attempts;
    public $usedLetters;
    public $wrongLetters;
    public $correctLetters;

    function __construct($secretWord){
        $this->secretWordArray = str_split($secretWord, 1);
        $this->setBlankGuessedLetters();
        $this->attempts = 8;
        $this->usedLetters = array();
        $this->wrongLetters = array();
        $this->correctLetters = array();
    }

    function setBlankGuessedLetters(){
        $this->userInputCharacters = array();
        foreach($this->secretWordArray as $secretLetters){
            array_push($this->userInputCharacters,'_');
        }
    }

    function setGuessedLetters($letter){
        $letter = strtolower($letter);
        $flag = 0;
        foreach($this->secretWordArray as $secretLetters){
            if(in_array($letter,$this->secretWordArray)){
                $flag = 1;
                for ($i = 0; $i < sizeof($this->secretWordArray); $i++){
                    if($letter == $this->secretWordArray[$i]){
                        $this->userInputCharacters[$i] = $letter;      
                    }
                }
            }
        }

        if($flag == 0){
            $this->reduceAttempts();
            $this->storeWrongGuessedLetters($letter);
            return $this->userInputCharacters;
        }
        else{
            $this->storeCorrectGuessedLetters($letter);
            return $this->userInputCharacters;
        }
    }

    function getGuessedLetters(){
        return $this->userInputCharacters;
    }

    function reduceAttempts(){
        $this->attempts--;
    }

    function getDisabledButton(){
        return array_merge($this->wrongLetters,$this->correctLetters);
    }

    function getAttempts(){
        return $this->attempts;
    }

    function storeWrongGuessedLetters($letter){
        array_push($this->wrongLetters,$letter);
    }

    function storeCorrectGuessedLetters($letter){
        array_push($this->correctLetters,$letter);
    }

    function getSecretWordArray(){
        return $this->secretWordArray;
    }

    function checkLetterAvailable($inputLetter){
        if (in_array($inputLetter,$secretWordArray)){
            return true;
        }
        else{
            return false;
        }
    }
}
?>