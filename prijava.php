f<?php

include_once "head.php";

?>

<html>

 <body  class="backgr2">
    
	<?php

include_once "menu.php";

?>  
    <div class="row margin100">
        <div class="col-sm-3 col-md-3"></div>
        <div class="col-sm-6 col-md-6 center">
        <div #907e7e class="row">
            <div class="col-md-12 col-sm-12"> 
                 <div style="border-color: #010101;" class="panel panel-default proziran bor" id="prijava">
                    <div style="color:#907e7e" class="panel-heading center" >Prijava</div>
                    <div class="panel-body">
                        <?php
                        if(isset($_GET["error"])){
                        if($_GET["error"] == "UNAUTH"){
                        ?><h3 style="color:red">Niste ulogirani</h3>
                        <?php 
                        }
                        elseif($_GET["error"] == 1){?>
                        <h3 style="color:red">Krivi podaci</h3>
                        <?php 
                                                   }}
                        ?>
                        
                        <form method="post" action="autorizacija.php">
                            <div style="color:#907e7e" class="form-group">
                                <label>Korisničko ime</label>
                                <input type="text" name="korisnickoime" class="form-control bor" required="required">
                            </div>
                            <div style="color:#907e7e" class="form-group">
                                <label>Lozinka</label>
                                <input type="password" name="lozinka" class="form-control bor" required="required">
                            </div>
                            <button type="submit" class="btn buttonx">Prijavi se</button>
                            <button style="border-color: #010101;" type="button" class="btn buttonx" id="showReg">Registracija</button>
                        </form>
                     </div>
                  </div>
                </div>
                <div  style="border-color: #010101;" class="panel panel-default proziran sakrij bor" id="registracija">
                    <div class="panel-heading center">Registracija</div>
                    <div class="panel-body">
                        <form method="post" action="registriraj.php">
                               <div style="color:#907e7e" class="form-group">
                                    <label>Korisničko ime</label>
                                    <input type="text" name="korisnickoime" class="form-control bor" required="required">
                                </div>
                                 <div style="color:#907e7e" class="form-group">
                                    <label>Ime</label>
                                    <input type="text" name="ime" class="form-control bor" required="required">
                                </div>
                             <div style="color:#907e7e" class="form-group">
                                    <label>Prezime</label>
                                    <input type="text" name="prezime" class="form-control bor" required="required">
                                </div>
                                  <div style="color:#907e7e" class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control bor" required="required">
                                </div>
                                 <div style="color:#907e7e" class="form-group">
                                    <label>Lozinka</label>
                                    <input type="password" name="lozinka" class="form-control bor" required="required">
                                </div>
                                <button type="submit" class="btn buttonx">Registriraj se</button>
                                <button class="btn buttonx" id="showPri">Prijava</button>
                            </form>
                     </div>
                    
                </div>
            </div>   
        </div>
        </div>
        <div class="col-sm-3 col-md-3"></div>
  
	<?php

include_once "skripte.php";

?>
   <script type="text/javascript">
       $( document ).ready(function(){
           $('#showReg').click(function(){
               $("#prijava").addClass("sakrij");
               $("#registracija").removeClass("sakrij");
           });
           $('#showPri').click(function(){
               $("#registracija").addClass("sakrij");
               $("#prijava").removeClass("sakrij");
           });
       });
       
    
    </script> 
  </body>
</html>