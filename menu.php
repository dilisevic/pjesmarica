<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
   
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span class="naslov">Tamburaška pjesmarica</span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"  <?php echo $_SERVER['PHP_SELF'] == "/Pjesmarica/index.php" ? 'class="active"':"";?>><a href="<?php echo $appRoot;?>index.php">Naslovna</a></li>
                       
                        <?php
                        if(isset($_SESSION["korisnik"])){ ?>
						<li role="presentation"  <?php echo $_SERVER['PHP_SELF'] == "/Pjesmarica/Izvodaci/index.php" ? 'class="active"':"";?>><a href="<?php echo $appRoot;?>Izvodaci/index.php">Izvođači</a></li>
                        <?php }?>
						<li role="presentation" <?php echo $_SERVER['PHP_SELF'] == "/Pjesmarica/onama.php" ? 'class="active"':"";?>><a href="<?php echo $appRoot;?>onama.php">O nama</a></li>
                        <li role="presentation"><a href="<?php echo $appRoot;?>img/era.png" target="_blank">ERA</a></li>
                        <?php
                        if(!isset($_SESSION["korisnik"])){ ?>
						<li role="presentation"  <?php echo $_SERVER['PHP_SELF'] == "/Pjesmarica/prijava.php" ? 'class="active"':"";?>><a href="<?php echo $appRoot;?>prijava.php">Prijava</a></li>
                        <?php }else{?>
                        <li role="presentation"  <?php echo $_SERVER['PHP_SELF'] == "/Pjesmarica/prijava.php" ? 'class="active"':"";?>><a href="<?php echo $appRoot;?>odjava.php">Odjava</a></li>
                        
                        <li role="presentation "><a class="username">
                            <?php
                            echo ''.$_SESSION["korisnik"];
                            ?>
                            </a>
                        </li>
                        
                        <?php }?>
					</ul>
				</div>
			</div>			
		</div>
	</nav>