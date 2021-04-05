<?php 
require 'autorisation.php';
require 'header.php';
 
?>


        <?php
        
        if(isset($_GET['suprimmer'])){
            $p = $_GET['suprimmer'];
            unset($_SESSION['ligneDeReservation'][$p]);
        }
        
       
        
        $listeTypeContainer = listeTypeContainer();
        $listeVilles = listeVilles();
        ?>        
        
         	<div id="booking" class="section">
		<div class="section-center">
                    <h2 class="text-center text-uppercase pb-5">etape n°2 de la reservation </h2>
			<div class="container">
				<div class="row">
                                    
					<div class="booking-form col-lg-5">                                          
                                            <form method="post" action="saisirLigneReservation.traitement.php">   
                                                
                                                	<div class="form-group">
								<span class="form-label">Type de container</span>
                                                                    <select class="form-control" name="numTypeContainer">
                                                                         <?php
                                                                               foreach ($listeTypeContainer as $container){
                                                                                ?>
                                                                                 <option value="<?php echo $container["numTypeContainer"] ; ?>">
                                                                                        <?php echo $container["libelleTypeContainer"] ; ?>
                                                                                 </option>                    
                                                                                        <?php } ?>                                                                              

										</select>
                                                                
							</div>
                                                
                                                	<div class="form-group">
								<span class="form-label">Quantité</span>
								<input class="form-control" type="number" name="qteReserver" >
							</div>

							<div class="form-btn">
								<button class="submit-btn">Ajouter</button>
							</div>
						</form>
					</div>
                                    
                                    
                                    	<div class="booking-form ">                                          
                                            <form method="post" action="insererLigneDeReservation.php">
                                                
                                                <?php 
                                                
                                                        $listeTypeContainer = listeTypeContainer();
                                                        $nomCont = null;
                                                        
                                                        foreach ($_SESSION as $lesSessions){       
                                                            if(is_array($lesSessions)){                                                                                                                              
                                                                    foreach ($lesSessions as $les => $value){            
                                                                        foreach ($listeTypeContainer as $listeContainer){  
                                                                                                                                                                 
                                                                            if($listeContainer['numTypeContainer'] == $les){
                                                                                                                                                            
                                                                                $nomCont = $listeContainer['libelleTypeContainer'];
                                                                                 break;
                                                                            }
                                                                        }                                               
                                                ?>
                                                
                                                <div class="row no-margin">
                                                    
                                                    <div class="form-group" style="width: 70%">
							<span class="form-label" >Type de container</span>
                                                        <p class="form-control" style ="padding-top: 45px"> <?php echo $nomCont; ?> </p>                                                      
								
                                                    </div>
							

                                                    <div class="form-group" style="width: 20%" >
								<span class="form-label">Quantité</span>                                                              
                                                                <p class="form-control" style ="padding-top: 45px"> <?php echo $value; ?> </p>                                                              
                                                                
                                                    </div>
                                                    
                                                    <div class="form-group" style="width: auto" >
							<a href="?suprimmer=<?php echo $les ?>" class="form-control" ><i class="fa fa-times"></i></a>                                                               
                                                    </div>
                                                    
                                                
                                                </div>

                                                <?php    }
                                                            }
    
                                                   } ?>
                                                
                                                <?php foreach($_SESSION as $l)
                                                {
                                                    
                                                if(is_array($l)){
                                                    
                                                ?>
                                                
                                                     <div class="form-btn ">
								<button class="submit-btn">Reserver</button>
                                                    </div>
                                                <?php } } ?>

       
                                                

						</form>
					</div>
                                    
                                    
				</div>
			</div>
		</div>
	</div>
        
        

        
                 
         

        
        <?php
        
        /*
        $listeTypeContainer = listeTypeContainer();
        $nomCont = null;
foreach ($_SESSION as $lesSessions){
     
    
    if(is_array($lesSessions)){
        
        foreach ($lesSessions as $les => $value){
            
            foreach ($listeTypeContainer as $listeContainer){
                
                if($listeContainer['numTypeContainer'] == $les){
                    $nomCont = $listeContainer['libelleTypeContainer'];
                    break;
                }
            }
            
            echo 'nomTypeCont :'.$nomCont. 'quantite :'. $value;
        }
    }
    
    }

*/
        ?>
        
        <form method="post" action="insererLigneDeReservation.php">
            <input type="submit" value="Valider">
            
            
        </form>

        
        
    </body>
</html>
