<?php
include_once "../head.php";
include_once "../konfiguracija.php";
include_once "../funkcije.php";
provjera($appRoot);
$izraz = $veza->prepare("select k.sifra as sifra, k.ime as ime, k.prezime as prezime, k.email as email, k.korisnickoime as korisnickoime, u.naziv as uloga from korisnik k inner join uloga u on u.sifra = k.uloga");
$izraz->execute();
$korisnici=$izraz->fetchAll(PDO::FETCH_OBJ);

?>


<html>

<body class="padding-top-54">


<?php

    include_once "../menu.php";

?>
<div class="container">

      <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6 col-sm-6 ">
         <h1 class="my-4">Korisnici
        <small></small>
      </h1>
        </div>
        <!--
        <div class="col-lg-6 col-sm-6 ">
            <a href="unosNovog.php"><button class="btn btn-primary pull-right">Unesi novi</button></a>
        </div>
-->
    </div>
    <?php
    if(isset($_GET["unos"]) && $_GET["unos"] == 1){ 
        ?>
    <div class="row">
        <div class="col-lg-12 col-sm-12 ">
        Uspjesan unos novog korisnika
        </div>
    </div>
     <?php 
    }
    ?>
     <?php
    if(isset($_GET["brisanje"]) && $_GET["brisanje"] == 1){ 
        ?>
    <div class="row">
        <div class="col-lg-12 col-sm-12 ">
        Uspjesno brisanje
        </div>
    </div>
     <?php 
    }
    ?>

     
    
    </div>
    <div class="row">
    <div class="col-md-1 col-lg-1"></div>
        <div class="col-md-10 col-lg-10">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
                <th>Uloga</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            <?php
          foreach($korisnici as $korisnik){
          ?>
            <tr>
                 
                <td><?php echo $korisnik->ime;?></td>
                <td><?php echo $korisnik->prezime;?></td> 
                <td><?php echo $korisnik->email;?></td> 
                <td><?php echo $korisnik->uloga;?></td> 
                <td>
                    <a href="<?php echo $appRoot;?>/Korisnici/brisanje.php?sifra=<?php echo $korisnik->sifra;?>">Obriši</a>
                    <a href="<?php echo $appRoot;?>/Korisnici/uredivanje.php?sifra=<?php echo $korisnik->sifra;?>">Uredi</a>
                </td>
                
            </tr>
            <?php 
          }
            ?>
            
        </tbody>
    </table>
	
        </div>
        <div class="col-md-1 col-lg-1"></div>
    
    </div>
    
    
<?php

    
    include_once "../skripte.php";

?>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
  </body>
</html>