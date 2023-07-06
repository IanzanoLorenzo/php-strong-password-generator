<?php
    //CREO LA STRINGA RANDOMICA
function RandomString($characters)
    {
        $randString = '';
        while (strlen($randString) < $_GET['passwordLength']) {
            $randCharacter = $characters[rand(0, strlen($characters) - 1)];
            if(!str_contains(strtolower($randString), strtolower($randCharacter)) && $_GET['doppie'] === 'off'){
                $randString .= $randCharacter;
            } elseif ($_GET['doppie'] === 'on') {
                $randString .= $randCharacter;
            }
        }
        return $randString;
    }

    //MODIFICO LA CHARACTER POOL
function CharacterPoolCreate($characters, $numbers, $simbols){
    $pool = '';
    if(isset($_GET['charactersCheck']) || isset($_GET['numbersCheck']) || isset($_GET['specialCheck']) ){
        if(isset($_GET['charactersCheck']) && $_GET['charactersCheck'] === 'on'){
            $pool .= $characters;
        };
        if(isset($_GET['numbersCheck']) && $_GET['numbersCheck'] === 'on'){
            $pool .= $numbers;
        };
        if(isset($_GET['specialCheck']) && $_GET['specialCheck'] === 'on'){
            $pool .= $simbols ;
        };
    };
    return $pool;
}
?>