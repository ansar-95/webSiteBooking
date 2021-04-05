<?php require_once 'publicHeader.php'; ?>            
          <div class="container">
            <h1 class="text-center text-uppercase pt-3 lang" key="container">consultation des containers </h1>
            <div class="row">
                
                <?php 
                $listeContainer = listeTypeContainer();
                
                        
                foreach($listeContainer as $container){
                
                ?>
                <div class="col-lg-4 pt-5">
                    <div class="card ">
                        <div class="card-body">
                            <p><span class="lang" key="typeContainer">libelle type container : </span> <?php echo $container["libelleTypeContainer"]; ?>  </p>
                            <p><span class="lang" key="longueurConatainer"> longueur Container : </span>  <?php echo $container["longueurCont"]; ?>  </p>
                            <p><span class="lang" key="largeurContainer"> largeur Container : </span><?php echo $container["largeurCont"]; ?></p>                             
                            <p><span class="lang" key="hauteurContainer"> hauteur Container:</span> <?php echo $container["hauteurCont"]; ?> </p>                           
                        </div>

                    </div>
                </div>
                
                <?php } ?>
                
                
            </div>
        </div>




            </div>
    
    		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="jquery-3.4.1.js"></script>
		<script src="lang.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
    
    
</html>
