<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
      	
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
                        
			  <title>Accueil</title>


	</head>


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
                        <a class="nav-link active" key = "contact" href="index.php">Entreprise</a>
                        <a class="nav-link active" key = "contact" href="consultationDesContainers.php">Les containers</a>
                        <a class="nav-link active" key = "contact" href="#">Contact</a>

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
</nav>
        
        
         	<div id="booking" class="section imagefond">
		<div class="section-center">
                    <h2 class="text-center text-uppercase pb-5">connexion </h2>
			<div class="container">
				<div class="row">
				<div class="booking-form">                                          
                                    <form method="post" action="saisirConnexion.traitement.php" name="formConnec" onSubmit=" return(validate(event));" >
                                                    
                                                    	<div class="form-group">
								<span class="form-label">Login</span>
								<input class="form-control" type="text" name="login">
                                                                <span id="login"  class="form-label-error"></span>
							</div>

							<div class="form-group">
								<span class="form-label">Mot de Passe</span>
                                                                <input class="form-control" type="password" name="mdp"> 
                                                                <span id="mdp"  class="form-label-error"></span>
							</div>
							<div class="form-btn">
                                                            <button type="submit" class="submit-btn">Connexion</button>
							</div>
                                                    
                                                        <div class="form-group">                          
                                                            <a href="inscription.php" class="form-label" >S'inscrire ?</a>
                                                        </div>
						</form>
                                    
					</div>
				</div>
			</div>
		</div>
	</div>
        
        
        
        <script>
         
           function validate(event) {
               =
               var validation = true;
                for(var i = 0; i< document.formConnec.length; i++){
                   
                   var nom = document.formConnec.elements[i];           
                   if(nom.value == ""){
                       event.preventDefault();
                       var p = document.getElementById(nom.name);
                       p.innerHTML ='Veuillez remplir le champ';
                       p.style.color = 'red';
                       validation = false;                
                       
                   }
                  
                }
                
                return validation;


             }                    
        </script>
        
        

    </body>
</html>
