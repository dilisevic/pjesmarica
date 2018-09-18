<?php
include_once "konfiguracija.php";
include_once "head.php";
include_once "funkcije.php";
provjera($appRoot);


$izraz = $veza->prepare("select * from ton");
$izraz->execute();
$tonovi=$izraz->fetchAll(PDO::FETCH_OBJ);

?>


<html>

<body class="padding-top-54">


<?php

    include_once "menu.php";

?>
 <div class="row">
    <div class="col-lg-12 col-sm-12 right" style="right">
        <h1 class="my-4 center">Unos pjesme
            
        </h1>
       
    </div>
</div>
    <div class="row"> <div class="col-lg-2 col-sm-2"></div>
        <div class="col-lg-8 col-sm-8">
        <form method="POST" action="unosPjesmeBaza.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Naziv</label>
    <input type="text" name="naziv" class="form-control" id="exampleFormControlInput1" placeholder="Unesite naziv pjesme...">
  </div>
          <input type="hidden" name="izvodac" value="<?php echo $_GET["sifra"];?>">  
  
<div class="form-group">
    <label for="exampleFormControlSelect1">Tonalitet</label>
    <select class="form-control" name="ton" id="exampleFormControlSelect1">
     <?php
        foreach($tonovi as $ton){
    ?>
        
        <option value="<?php echo $ton->sifra;?>"><?php echo $ton->naziv;?></option>
        
    <?php
        }    
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Tekst</label>
    <textarea class="form-control" name="tekst" id="txt-content" rows="3"></textarea>
  </div>
 <button class="btn btn-success ">Unesi</button>
             <a href="Izvodaci/index.php"><button type="button" class="btn btn-info">Odustani</button></a>

</form>
        </div>
        <div class="col-lg-2 col-sm-2"></div>
    </div>
<?php

    
    include_once "skripte.php";

?>
      <script>tinymce.init({ selector:'textarea' });</script>
  </body>
</html>