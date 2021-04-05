<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="fret, conteneur, conteneurs,cargo, fret maritime" />
		 <!-- Bootstrap  -->
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css.map">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css.map">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-grid.css">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-grid.css.map">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-grid.css.map">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-reboot.css">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-reboot.css.map">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-reboot.min.css">
		<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-reboot.min.css.map">

		 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- feuille CSS  -->
		<link rel="stylesheet" href="style.css">
                <link type="text/css" rel="stylesheet" href="css/formulaireResa.css" />
		<!-- logo  -->
		  <!-- reference your copy Font Awesome here (from our CDN or by hosting yourself) -->
  			<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/font-awesome.min.css">
                        <link rel="stylesheet" href="tel/pidie-0.0.8.css">
                        
			  <title>Accueil</title>


	</head>


<body>
    
            <?php
            include_once '_gestionBase.inc.php';
        ?>
	<!-- Bar de navigation  -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:/*#003B46*/ #2980b9">
            <div class="container">	
                <a class="navbar-brand" href="index.php">
   			 <img src="image\Battleship-2.svg" width="30" height="30" alt=""> THOLDI
 			 </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">        
		    <div class="navbar-nav ml-auto">
                        <a class="nav-link active lang" key = "entreprise" href="index.php">Entreprise</a>
                        <a class="nav-link active lang" key = "conteneur" href="consultationDesContainers.php">Les containers</a>
                        <a class="nav-link active lang" key = "contact" href="contact.php">Contact</a>
                        
                        <li class="nav-item dropdown">
        			<a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          			Langue
       				</a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item translate" id ="fr" href="#">Français</a>
			          <a class="dropdown-item translate" id="en" href="#">Anglais</a>
			        </div>
      			</li>
                        

		    </div>



            </div>

            </div>
  
    <form action="connexion.php">
    <button type="submit" class="btn btn-light">Se connnecter</button>
    </form>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-light ml-3" data-toggle="modal" data-target="#exampleModal">
  Aide
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Documentation du site web</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <a href="documentpdf/Documentationutilisateurv2.pdf" >
              Voir la documentation
</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
    
    

</nav>
