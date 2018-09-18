<?php

session_start();
function provjera($a){
    if(!isset($_SESSION["korisnik"])){ 
        $link = $a . "prijava.php?error=UNAUTH";
        
        header("Location: ".$link);
    }
}

