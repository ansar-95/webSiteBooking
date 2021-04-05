<?php 
require 'autorisation.php';
require 'header.php';
 
?>

             

          <div class="container">
              
            <h1 class="text-center text-uppercase pt-3">consultation des devis </h1>
                        <div class="row">
                
             
                <?php
                $listeDevis = listeDevis($code);
                        
                foreach($listeDevis as $lesDevis){
                    
                    $valide = getBoolValideDevis(tempsLimiteValidationDevis($lesDevis['dateReservation']));
                    
                ?>
                <div class="col-lg-4 pt-5">
                    <div class="card ">
                        <div class="card-body">
                            <p> Montant devis : <?php echo $lesDevis['montantDevis']; ?> </p>                           
                            <p> Volume : <?php echo $lesDevis["volume"]; ?> </p>
                            <p> Nombre de Container : <?php echo $lesDevis["nbContainers"]; ?> </p>
                            <?php if($valide == true && $lesDevis['valider'] == 0){
                                $tempsLimite = 24 - tempsLimiteValidationDevis($lesDevis['dateReservation']);
                                $tempsLimite = intval($tempsLimite);
                            ?>
                            
                            <div>
                                <div class="alert alert-danger " role="alert">
                                    <?php echo 'Il reste '. $tempsLimite. ' heure pour confirmer'?>
                                 </div>
                            </div>
                            <form action="confirmerDevis.php" method="post">   
                                <input type="hidden" name="devis" value="<?php echo $lesDevis["codeDevis"]; ?>">
                                <input type="hidden" name="reservation" value="<?php echo  $lesDevis['codeReservation']; ?>">                                
                                <button type="submit" name="confirmer" class="btn btn-primary ml-5 mr-3">Confirmer</button>
                                <a href="consultationDesDevis.traitement.php?codeDevis=<?php echo $lesDevis['codeDevis']; ?>" name="supression" class="btn btn-danger ml-5>">Suprimmer</a>
                            </form>
                            <?php }
                             else if($valide == false && $lesDevis['valider'] == 0){ ?>
                            <div class="pt-4">
                                <div class="alert alert-warning " role="alert">
                                         Le delai est depassé 
                                 </div>
                            </div>
                            <?php } else if($lesDevis['valider'] == 1) { ?>
                            
                            <div class="pt-4">
                                <div class="alert alert-success " role="alert">
                                     Vous avez confirmez le devis
                                 </div>
                                
                                <form action="confirmerDevis.traitement.php" method="post"  class="float-right mr-5">
                                    <input type="hidden" name="codeDevis" value="<?php echo $lesDevis["codeDevis"]; ?>">
                                    <input type="hidden" name="codeReservation" value="<?php echo  $lesDevis['codeReservation']; ?>">  
                                    <button type="submit" name="validation"  class="btn btn-danger">Génerer un fichier pdf</button>
                                </form>                                 
                            </div>
                            

                           <?php } ?>
                            
                            
                        </div>

                    </div>
                </div>
                
                
                <?php } ?>
            </div>
        </div>
                
        	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="jquery-3.4.1.js"></script>
		<script src="lang.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         
        
    </body>
</html>
