<?php
function RandomString($characters)
    {
        $randString = '';
        while (strlen($randString) < $_GET['passwordLength']) {
            $randCharacter = $characters[rand(0, strlen($characters) - 1)];
            if(!str_contains(strtolower($randString), strtolower($randCharacter))){
                $randString .= $randCharacter;
            }
        }
        return $randString;
    }
?>