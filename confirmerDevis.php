<?php 
require 'autorisation.php';
require 'header.php';
 
?>

        
        <?php
        if(!empty($_POST['devis'])){

            $codeD = $_POST['devis'];
        }

        if(!empty($_POST['reservation'])){

            $codeR = $_POST['reservation'];
        }              
        $reservationAndDevis = getJoinWithReservationAndDevis($codeR, $codeD);
               
        ?>        




                <div class="container pt-5">
                    <h1 class="text-center text-uppercase pt-3">récapitulatif </h1>
                        <div class="row pt-5  justify-content-center">
                          
                            <table class="table">
                              <tbody>                                
                                <tr>
                                  <th scope="row">Début de la reservation</th>
                                  <td><?php  echo date('d/m/Y',$reservationAndDevis["dateDebutReservation"]); ?></td>

                                </tr>
                                <tr>
                                  <th scope="row">Fin de la reservation</th>
                                  <td><?php echo date('d/m/Y',$reservationAndDevis["dateFinReservation"]); ?></td>

                                </tr>                               
                                <tr>
                                  <th scope="row">Ville de départ</th>
                                  <td><?php echo getVille($reservationAndDevis['codeVilleMiseDisposition'])["nomVille"]; ?> </td>
                                </tr>
                                 <tr>
                                  <th scope="row">Ville d'arivée</th>
                                  <td><?php echo getVille($reservationAndDevis['codeVilleRendre'])["nomVille"]; ?> </td>
                                </tr>

                                <?php 

                                
                                $difference = getDureeReservation($reservationAndDevis["dateDebutReservation"], $reservationAndDevis["dateFinReservation"]);
                                
                                $type = getTypeDureeReservation($difference);
                                ?>

                                                    
                                <?php 

                                $tableau = getDifferentContainerReserver($reservationAndDevis["codeReservation"], $type, $difference);


                                for($i = 1; $i <= count($tableau); $i++){

                                   $element =$tableau[$i];
                                   foreach ($element as $les => $value){
                                ?>       
                                        <tr>
                                            <th scope="row"><?php echo $les ?></th>    
                                                <td><?php  echo $value  ?> </td>
                                        <tr>
                                <?php            
                                   }
                                }
                                ?>    
                                <tr>
                                    <th scope="row"style="color : red">Nombre total de container</th>    
                                       <td style="color : red"> <?php echo $reservationAndDevis['nbContainers'] ; ?></td>
                                <tr>

                                <tr>
                                    <th scope="row" style="color : red" >Cout total des containers</th>    
                                    <td style="color : red"><?php echo $reservationAndDevis['montantDevis'] ; ?> €</td>
                                <tr>
                              </tbody>
                            </table>


                        </div>
                    
                    <form action="consultationDesDevis.traitement.php" method="post" target="_blank" class="float-right pt-2">
                        <input type="hidden" value="<?php echo $codeR ?>" name="codeReservation">
                        <input type="hidden" value="<?php echo $codeD ?>" name="codeDevis">
                        <button type="submit" name="validation" value="<?php echo $codeD ?>"  class="btn btn-primary ">Valider</button>
                    </form>
                    
                    
                   </div>                         	     
    </body>
</html>
