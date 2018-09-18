<?php
include_once "../konfiguracija.php";
include_once "../head.php";
include_once "../funkcije.php";
provjera($appRoot);

?>


<html>

<body class="padding-top-54">


<?php

    include_once "../menu.php";

?>
 <div class="row">
    <div class="col-lg-12 col-sm-12 ">
        <h1 class="my-4 center">Unos izvođača
            
        </h1>
       
    </div>
</div>
    <div class="row"> <div class="col-lg-2 col-sm-2"></div>
        <div class="col-lg-8 col-sm-8">
            <form method="POST" action="unosNovogBaza.php">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Naziv</label>
                    <input type="text" name="naziv" class="form-control" id="exampleFormControlInput1" placeholder="Unesite naziv izvođača...">
                </div>
                <button class="btn btn-success ">Unesi</button>
                <a href="../Izvodaci/index.php"><button type="button" class="btn btn-info">Odustani</button></a>
            </form>
        </div>
        <div class="col-lg-2 col-sm-2"></div>
    </div>
<?php

    
    include_once "../skripte.php";

?>
  </body>
</html>