
<?php

session_start();
if($_SESSION['codeUtilisateur'] != null){
$code = $_SESSION['codeUtilisateur'];
}else{
    header('location: connexion.php');
}
?>
<?php require'header.php' ?>
       
        <div class="container">
            <h1 class="text-center text-uppercase pt-3">consultation des reservations </h1>
            <div class="row">
                
             
                <?php
                $listeReservation = listeReservation();
                        
                foreach($listeReservation as $reservation){
                    
                    if($reservation['codeUtilisateur'] == $code){
                
                ?>
                <div class="col-lg-4 pt-5">
                    <div class="card ">
                        <div class="card-body">
                            <p> Numero de reservation : <?php echo $reservation['numeroDeReservation']; ?> </p>
                            <p> date debut reservation : <?php echo date('d/m/Y',$reservation["dateDebutReservation"]) ;?>  </p>
                            <p> date fin reservartion : <?php echo date('d/m/Y',$reservation["dateFinReservation"]); ?>  </p>
                            <p> date reservation :<?php echo date('d/m/Y',$reservation["dateReservation"]); ?></p>                             
                            <p> Ville Disposition : <?php echo getVille($reservation["codeVilleMiseDisposition"])["nomVille"]; ?> </p>
                            <p> Ville Destination : <?php echo getVille($reservation["codeVilleRendre"])["nomVille"]; ?> </p>
                            <p> Volume Estime : <?php echo $reservation["volumeEstime"]  ?> </p>
                            <p>Etat : <?php echo $reservation['etat'] ?> </p>
                            <?php 
                            if($reservation['etat'] == 'enCours'){
                                
                            ?>
                            <form action="confirmationReservation.php" method="post">
                            <button type="submit" name="reservation" value="<?php echo $reservation['codeReservation']; ?>" class="btn btn-primary">Confirmer</button>
                            </form>
                            <?php } ?>
                        </div>

                    </div>
                </div>
                
                
                <?php } } ?>
            </div>
        </div>
           	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="jquery-3.4.1.js"></script>
		<script src="lang.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
    </body>
    
    
</html>
