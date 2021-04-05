<?php 
require 'autorisation.php';
require 'header.php';
 
?> 
<?php
$reservation = $_POST['reservation'];

$reservationCourant = null;

$listeReservation = listeReservation();

foreach ($listeReservation as $lesReserations) {
    
    if($lesReserations['codeReservation'] == $reservation){
        $reservationCourant = $lesReserations;
    }
    
}
?>                        
        

        <div class="container">
                <div class= "pt-5">
                    <h1 class="text-center text-uppercase pt-5">récapitulatif </h1>
                    
                    <div class="card" style="border: 1px solid rgb( 41, 128, 185);">
                        <!--
                        <div class="card-body">
                            <p> date debut reservation : <?php echo date('Y/d/m',$reservationCourant["dateDebutReservation"]) ;?>  </p>
                            <p> date fin reservartion : <?php echo date('Y/d/m',$reservationCourant["dateFinReservation"]); ?>  </p>
                            <p> date reservation :<?php echo date('Y/d/m',$reservationCourant["dateReservation"]); ?></p>                             
                            <p> Ville Disposition : <?php echo getVille($reservationCourant["codeVilleMiseDisposition"])["nomVille"]; ?> </p>
                            <p> Ville Destination : <?php echo getVille($reservationCourant["codeVilleRendre"])["nomVille"]; ?> </p>
                            <p> Volume Estime : <?php echo $reservationCourant["volumeEstime"]  ?> </p>
                            <form action="confirmationDesReservations.traitement.php" method="post">
                            <button type="submit" name="reservation" value="<?php echo $reservationCourant['codeReservation']; ?>" class="btn btn-primary">Confirmer</button>
                            </form>
                        </div>
                        
                        -->
                        
                        <table class="table">

                            <tbody>
                              <tr>
                                <th scope="row">Debut de reservation</th>
                                <td><?php echo date('Y/d/m',$reservationCourant["dateDebutReservation"]) ;?></td>
                              </tr>
                              
                              <tr>
                                <th scope="row">Fin de reservation</th>
                                <td><?php echo date('Y/d/m',$reservationCourant["dateFinReservation"]); ?></td>
                              </tr>
                              
                              <tr>
                                <th scope="row">Ville de départ</th>
                                <td><?php echo getVille($reservationCourant["codeVilleMiseDisposition"])["nomVille"]; ?></td>
                              </tr>
                              
                              <tr>
                                <th scope="row">Ville d'arrivée</th>
                                <td> <?php echo getVille($reservationCourant["codeVilleRendre"])["nomVille"]; ?> </td>
                              </tr>
                              
                              <tr>
                                <th scope="row">Volume Estimé</th>
                                <td> <?php echo $reservationCourant["volumeEstime"]  ?></td>
                              </tr>                              
                            </tbody>
                          </table>
                        

                    </div>
                    
                    <form action="confirmationDesReservations.traitement.php" method="post" class="pt-4">
                            <button type="submit" name="reservation" value="<?php echo $reservationCourant['codeReservation']; ?>" class="btn btn-primary float-right pt-2">Confirmer</button>
                            </form>
                </div>
        </div>

    </body>
</html>
