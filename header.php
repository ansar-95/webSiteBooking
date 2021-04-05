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
  			<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
          
		    <div class="navbar-nav ml-auto">
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               Reservations
                                    </a> 
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">                          
                                        <a class="dropdown-item lang" key ="conteneur" href="saisirReservation.php">Saisir une Reservation</a>
                                        <a class="dropdown-item  lang" key = "contact" href="consultationDesReservations.php">Consultation des Reservations</a>
                                    </div>
                               </li>
                
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Devis
                                    </a> 
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">                          
                                        <a class="dropdown-item  lang" key ="entreprise" href="consultationDesDevis.php">Consultation des devis <span class="sr-only">(current)</span></a>                    
                                    </div>
                                </li>
                                
                                
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
                   
                  <?php if(isset($_SESSION['codeUtilisateur'])){
                      
                  ?>
                    
                     <form action="deconnexion.php" method="get">
                         <input type="hidden" name="logout" value="1">
                         <button type="submit"  class="btn btn-light">Se deconnecter</button>
                     </form>
                  <?php }else {                      
                    header('location : connexion.php');
                  }
                 
                  
                  ?>
                  
    
    
    
   
                    
           
                     

</nav>

