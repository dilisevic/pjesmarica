<?php
include_once "../head.php";
include_once "../konfiguracija.php";
include_once "../funkcije.php";
provjera($appRoot);
$izraz = $veza->prepare("select * from izvodac");
$izraz->execute();
$izvodaci=$izraz->fetchAll(PDO::FETCH_OBJ);

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
         <h1 class="my-4">Izvođači
        <small></small>
      </h1>
        </div>
        <div class="col-lg-6 col-sm-6 ">
            <?php
            if($_SESSION["admin"] == 1){
            ?>
            <a href="unosNovog.php"><button class="btn btn-primary pull-right">Unesi novi</button></a>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    if(isset($_GET["unos"]) && $_GET["unos"] == 1){ 
        ?>
    <div class="row">
        <div class="col-lg-12 col-sm-12 ">
        Uspjesan unos novog izvodaca
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
                <th>Naziv</th>
                <?php
            if($_SESSION["admin"] == 1){
            ?>
                <th>Akcije</th>
               <?php 
    }
    ?>
            </tr>
        </thead>
        <tbody>
            <?php
          foreach($izvodaci as $izvodac){
          ?>
            <tr>
                 <td><a href="<?php echo $appRoot;?>pjesme.php?sifra=<?php echo $izvodac->sifra;?>"><?php echo $izvodac->naziv;?></a></td>  
                <?php
            if($_SESSION["admin"] == 1){
            ?><td>
                    <a href="<?php echo $appRoot;?>unosPjesme.php?sifra=<?php echo $izvodac->sifra;?>">Unesi</a>
                    <a href="<?php echo $appRoot;?>/Izvodaci/brisanje.php?sifra=<?php echo $izvodac->sifra;?>">Obriši</a>
                    <a href="<?php echo $appRoot;?>/Izvodaci/uredivanje.php?sifra=<?php echo $izvodac->sifra;?>">Uredi</a>
                </td>
                 <?php 
    }
    ?>
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