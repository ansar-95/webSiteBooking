<?php include("entete2.php"); ?>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Mon compte</strong> 
						<p> Mes informations personnelles </p>
                    </h2>
                    <hr>

                    <hr class="visible-xs">
                     Nom:requete sql  <br>
				Prénom:sql <br>
				
				Adresse:sql
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
					<strong>Mes devis</strong>
                    </h2>
                    <hr>
                    <p>tableau avec informations de la base de données id/date/etat(accepter ou refuser)</p>
                    <p>SQL: select D.* from DEVIS D,RESERVATION R where D.codeDevis=R.codeDevis and R.codePersonne=<?php echo "code"; ?>;</p>
                </div>
            </div>
        </div>
		
		 <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
					<strong>Mes factures</strong>
                    </h2>
                    <hr>
                    <p>tableau avec informations de la base de données id/date</p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

   
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
