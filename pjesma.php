<?php

include_once "head.php";
include_once "konfiguracija.php";
include_once "funkcije.php";
provjera($appRoot);
$izraz = $veza->prepare("select p.sifra as sifrapjesme, p.naziv as imePjesme, i.naziv as imeIzvodaca, i.sifra, p.tonalitet as ton, p.tekst as tekst from pjesma p join izvodac i on i.sifra=p.izvodac where p.sifra = :sifra");
$izraz->bindParam(':sifra', $_GET["sifra"]);
$izraz->execute();
$pjesma=$izraz->fetch(PDO::FETCH_OBJ);

?>


<html>

<body class="padding-top-54">


<?php

    include_once "menu.php";

?>
<div class="container">

      <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6 col-sm-6 ">
         <h1 class="my-4"><?php echo $pjesma ? $pjesma->imePjesme: '';?>
        <small><?php echo $pjesma ?  $pjesma->imeIzvodaca: '';?></small>
      </h1>
        </div>
        
    </div>
   

      <div class="row">
    <div class="col-md-1 col-lg-1"></div>
        <div class="col-md-10 col-lg-10 razmak">
        <?php
            echo $pjesma->tekst;
            ?>
	
        </div>
        <div class="col-md-1 col-lg-1"></div>
    
    </div>
    
    
    </div>
    
<?php

    
    include_once "skripte.php";

?>
    
  </body>
</html>