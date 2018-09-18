<?php
try{
$from = 'mirko.vadlja@gmail.com';
$sendTo = 'davor.ilisevic1@gmail.com';
$subject = 'Nova poruka s pjesmarice';
$emailText = "Ime i prezime: ". $_POST["name"] . "\nEmail: ". $_POST["email"] . "\n";
        if(isset($_POST["subject"])){
            $emailText =$emailText. "Predmet: ". $_POST["subject"] . "\n";
        }
        $emailText =$emailText.  "Poruka: ". $_POST["message"] . "\n";
         $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        mail($sendTo, $subject, $emailText, "From:" . $from.$headers);
    
    header("Location: kontakt.php?success=1");
}catch (Exception $e)
{	
    header("Location: kontakt.php?error=1");
}
