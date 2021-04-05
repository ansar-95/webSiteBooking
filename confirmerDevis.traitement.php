<?php
session_start();
$user = $_SESSION['codeUtilisateur'];
require_once '_gestionBase.inc.php';

require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$codeDevis = $_POST['codeDevis'];
$codeReservation = $_POST['codeReservation'];

    ob_start();
?>

<style type="text/css">
    table { 
        width: 100%; 
        color: #717375; 
        font-family: helvetica; 
        line-height: 5mm; 
        border-collapse: collapse; 
    }
    h2 { margin: 0; padding: 0; }
    p { margin: 5px; }
 
    .border th { 
        border: 1px solid #000;  
        color: white; 
        background: #000; 
        padding: 5px; 
        font-weight: normal; 
        font-size: 14px; 
        text-align: center; 
        }
    .border td { 
        border: 1px solid #CFD1D2; 
        padding: 5px 10px; 
        text-align: center; 
    }
    .no-border { 
        border-right: 1px solid #CFD1D2; 
        border-left: none; 
        border-top: none; 
        border-bottom: none;
    }
    .space { padding-top: 250px; }
 
    .10p { width: 10%; } .15p { width: 15%; } 
    .25p { width: 25%; } .50p { width: 50%; } 
    .60p { width: 60%; } .75p { width: 75%; }
</style>
 
 
<page backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm" footer="page;">
 <?php
        $reservationAndDevis = getJoinWithReservationAndDevis($codeReservation, $codeDevis);
        $detailUtilisateur = detailUtilisateur($user);
        $difference = getDureeReservation($reservationAndDevis["dateDebutReservation"], $reservationAndDevis["dateFinReservation"]);                             
        $type = getTypeDureeReservation($difference);
 ?>
    <page_footer>
        <hr />
        <p>Fait a Paris, le <?php echo date("d/m/y"); ?></p>
        <p>Signature du particulier, suivie de la mension manuscrite "bon pour accord".</p>
    </page_footer>
 
    
    <table style="vertical-align: top;">
        <tr>
            <td class="75p">
                <strong><?php echo $detailUtilisateur['contact'] ?></strong><br />
                <?php echo $detailUtilisateur['adresse']; ?><br />
                <strong>Code Postal:</strong> <?php echo $detailUtilisateur['cp']; ?><br />
                <?php echo $detailUtilisateur['adrMel']; ?>
            </td>
            <td class="25p">
                <strong>Entreprise tholdi</strong><br />
                <strong>Adresse Conflans-Sainte-Honorine</strong><br />
            </td>
        </tr>
    </table>
    
    
    <table style="margin-top: 50px;">
        <tr>
            <td class="50p"><h2>Devis n°<?php echo $reservationAndDevis['codeDevis']; ?></h2></td>
            <td class="50p" style="text-align: right;">Emis le <?php echo date("d/m/y"); ?></td>
        </tr>
    </table>

 
    <table style="margin-top: 30px;" class="border">
        <tbody>
            <tr>
                <td  class="50p">Début de la réservation : </td>
                <td  class="50p"><?php echo date('d/m/Y',$reservationAndDevis["dateDebutReservation"]); ?></td>
            </tr>
            
            <tr>
                <td  class="50p">Fin de la réservation : </td>
                <td  class="50p"><?php echo date('d/m/Y',$reservationAndDevis["dateFinReservation"]); ?></td>
            </tr>
            
            <tr>
                <td  class="50p">Ville de départ : </td>
                <td  class="50p"><?php echo getVille($reservationAndDevis['codeVilleMiseDisposition'])["nomVille"];  ?></td>
            </tr>
            
            <tr>
                <td  class="50p">Ville d'arrivée : </td>
                <td  class="50p"><?php echo getVille($reservationAndDevis['codeVilleRendre'])["nomVille"]; ?></td>
            </tr>
            
            <?php 

            $tableau = getDifferentContainerReserver($reservationAndDevis["codeReservation"], $type, $difference);


            for($i = 1; $i <= count($tableau); $i++){

               $element =$tableau[$i];
               foreach ($element as $les => $value):
            ?>       
                <tr>
                    <td  class="50p"><?php echo $les ?> : </td>
                    <td  class="50p"><?php echo $value  ?></td>
                </tr>
                       
               <?php endforeach; ?>
                        
            <?php          
            }
            ?>    
            

            <tr>
                <td  class="50p">Nombre total de container : </td>
                <td  class="50p"><?php echo $reservationAndDevis['nbContainers'] ;  ?></td>
            </tr>
            
            <tr>
                <td  class="50p">Cout total des containers : </td>
                <td  class="50p"><?php echo $reservationAndDevis['montantDevis'] ; ?> €</td>
            </tr>            
        </tbody>
    </table>

 

 
</page>
 
<?php
    $content = ob_get_clean();

        $pdf = new HTML2PDF("p","A4","fr","UTF-8");
        $pdf->writeHTML($content);
        $pdf->Output('devis.pdf');
       

 
?>
