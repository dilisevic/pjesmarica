<?php
include_once "konfiguracija.php";
include_once "head.php";
include_once "funkcije.php";
provjera($appRoot);


$izraz = $veza->prepare("select * from ton");
$izraz->execute();
$tonovi=$izraz->fetchAll(PDO::FETCH_OBJ);


$izraz = $veza->prepare("select * from pjesma where sifra = :sifra");
$izraz->bindParam(":sifra", $_GET["sifra"]);
$izraz->execute();
$pjesma = $izraz->fetch(PDO::FETCH_OBJ);

?>


<html>

<body class="padding-top-54">


<?php

    include_once "menu.php";

?>
 <div class="row">
    <div class="col-lg-12 col-sm-12 ">
        <h1 class="my-4">Unos pjesme
            
        </h1>
       
    </div>
</div>
    <div class="row"> <div class="col-lg-2 col-sm-2"></div>
        <div class="col-lg-8 col-sm-8">
<form method="POST" action="uredivanjePjesmeBaza.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Naziv</label>
    <input type="text" name="naziv" class="form-control" value="<?php echo $pjesma->naziv;?>" id="exampleFormControlInput1" placeholder="Unesite naziv pjesme...">
  </div>
<input type="hidden" name="izvodac" value="<?php echo $pjesma->izvodac;?>">  
  <input type="hidden" name="sifra" value="<?php echo $pjesma->sifra;?>"> 
<div class="form-group">
    <label for="exampleFormControlSelect1">Početni ton</label>
    <select class="form-control" name="ton" id="exampleFormControlSelect1">
     <?php
        foreach($tonovi as $ton){
    ?>
        
        <option value="<?php echo $ton->sifra;?>" <?php echo $ton->sifra == $pjesma->tonalitet ? "selected":"";?>><?php echo $ton->naziv;?></option>
        
    <?php
        }    
    ?>
    </select>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Tekst</label>
    <textarea class="form-control" name="tekst" rows="3"><?php echo $pjesma->tekst;?></textarea>
  </div>
 <button class="btn btn-success ">Unesi</button>
 <button type="button" class="btn btn-info">Odustani</button></div>
</form>
        </div>
        <div class="col-lg-2 col-sm-2"></div>
    </div>
<?php

    
    include_once "skripte.php";

?>
      <script>
tinymce.init({ selector:'textarea' })
</script>
  </body>
</html>		