<?php
include_once "../konfiguracija.php";
include_once "../head.php";
include_once "../funkcije.php";
provjera($appRoot);

$izraz = $veza->prepare("select * from korisnik where sifra = :sifra");
$izraz->bindParam(":sifra", $_GET["sifra"]);
$izraz->execute();
$korisnik = $izraz->fetch(PDO::FETCH_OBJ);


$izraz = $veza->prepare("select * from uloga");
$izraz->execute();
$uloge = $izraz->fetchAll(PDO::FETCH_OBJ);

?>


<html>

<body class="padding-top-54">


<?php

    include_once "../menu.php";

?>
 <div class="row">
    <div class="col-lg-12 col-sm-12 ">
        <h1 class="my-4 center">Uređivanje korisnika
            
        </h1>
       
    </div>
</div>
    <div class="row"> <div class="col-lg-2 col-sm-2"></div>
        <div class="col-lg-8 col-sm-8">
            <form method="POST" action="uredivanjeBaza.php">
                <div class="form-group">
                    <label >Ime</label>
                    <input type="text" name="ime" class="form-control" value="<?php echo $korisnik->ime?>" placeholder="Unesite naziv izvođača...">
                     <label >Prezime</label>
                    <input type="text" name="prezime" class="form-control"  value="<?php echo $korisnik->prezime?>" placeholder="Unesite prezime korisnika...">
                     <label >Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $korisnik->email?>" placeholder="Unesite naziv izvođača...">
                     <label >Korisničko ime</label>
                    <input type="text" name="korisnickoime" class="form-control" value="<?php echo $korisnik->korisnickoime?>" placeholder="Unesite naziv izvođača...">
                    <input type="hidden" name="sifra" value="<?php echo $korisnik->sifra;?>">
                    <label >Uloga</label>
                    <select name="uloga">
                    <?php foreach($uloge as $uloga){?>
                        <option value="<?php echo $uloga->sifra;?>" <?php echo $korisnik->uloga == $uloga->sifra ? "selected":"";?>><?php echo $uloga->naziv ;?></option>
                        <?php }?>
                    </select>
                </div>
                <button class="btn btn-success ">Unesi</button>
                <a href="../Korisnici/index.php"><button type="button" class="btn btn-info">Odustani</button></a>
            </form>
        </div>
        <div class="col-lg-2 col-sm-2"></div>
    </div>
<?php

    
    include_once "../skripte.php";

?>
  </body>
</html>