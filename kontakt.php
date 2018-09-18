<?php
include_once "head.php";

?>
<html>
<body>

<?php
    include_once "menu.php";
?>

	
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13483.27077007428!2d18.69729227951086!3d45.55292636114423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2shr!4v1522941454621" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	
	<section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Napišite poruku</h2>
                <?php if(isset($_GET["success"])){?>
                <h4 style="color: green">Poruka poslana</h4>
                <?php }?>
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="posaljiEmail.php">
                    <div class="col-sm-5 col-sm-offset-1 ">
                        <div class="form-group" >
                            <label>Vaše ime *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Vaš E-mail *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                       </div>
                     <div class="col-sm-5">
                        <div class="form-group">
                            <label>Tema *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Poruka *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn buttonx btn-lg" required="required">Pošalji poruku</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
	
	
<?php
include_once "skripte.php";

?>
  </body>
</html>