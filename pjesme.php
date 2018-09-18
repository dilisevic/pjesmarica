<?php

    include_once "head.php";
include_once "konfiguracija.php";
include_once "funkcije.php";

provjera($appRoot);
 
$izraz = $veza->prepare("select * from izvodac where sifra=:sifra");
$izraz->bindParam(':sifra', $_GET["sifra"]);
$izraz->execute();
$izvodac=$izraz->fetch(PDO::FETCH_OBJ);


$izraz = $veza->prepare("select p.sifra as sifrapjesme, p.naziv as imePjesme, i.naziv as imeIzvodaca, i.sifra, p.tonalitet as ton from pjesma p join izvodac i on i.sifra=p.izvodac where i.sifra = :sifra");
$izraz->bindParam(':sifra', $_GET["sifra"]);
$izraz->execute();
$pjesme=$izraz->fetchAll(PDO::FETCH_OBJ);

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
         <h1 class="my-4">Pjesme
        <small><?php echo $izvodac->naziv;?></small>
            </h1>
        </div>
       
    </div>
   
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
            ?> <th>Akcije</th>
               <?php 
          }
            ?>
            </tr>
        </thead>
        <tbody>
            <?php
          foreach($pjesme as $pjesma){
          ?>
            <tr>
                 <td><a href="<?php echo $appRoot;?>pjesma.php?sifra=<?php echo $pjesma->sifrapjesme;?>"><?php echo $pjesma->imePjesme;?></a></td>  
                <?php
            if($_SESSION["admin"] == 1){
            ?><td>
                    <a href="<?php echo $appRoot;?>obrisiPjesmu.php?sifra=<?php echo $pjesma->sifrapjesme;?>&izvodac=<?php echo $_GET["sifra"];?>">Obriši</a>
                    <a href="<?php echo $appRoot;?>uredivanjePjesme.php?sifra=<?php echo $pjesma->sifrapjesme;?>">Uredi</a></td>
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

    
    include_once "skripte.php";

?>
     <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
  </body>
</html>