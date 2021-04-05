<?php

function gestionnaireDeConnexion() {
    $pdo = NULL;
    try {
        $pdo = new PDO(
                
                'mysql:host=172.31.1.110;dbname=tholdi_reservation',
                'admin',
                '@Xazerty1',
                
                /*'mysql:host=172.31.3.110;dbname=tholdi',
                'developpeur',
                'azerty',*/
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        
    } catch (PDOException $err) {
        $messageErreur = $err->getMessage();
        error_log($messageErreur, 0);
        echo $messageErreur;
    }
    return $pdo;
}

function listeVilles() {
    $listeVilles = array(); //variable résultat
    $pdo = gestionnaireDeConnexion(); //variable PDO pour gérer les accès à la BD
    $req = "select * from ville"; //représentation textuelle d'une requete SQL
    //query = requete 
    //puis retourne un objet contenant le résultat
    $pdoStatement = $pdo->query($req);

    $listeVilles = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    return $listeVilles;
}

function listeTypeContainer() {
    $listeTypeContainer = array(); 
    $pdo = gestionnaireDeConnexion(); 
    
    if($pdo != null){
     
    $req = "select * from typeContainer"; 
    $pdoStatement = $pdo->query($req);
    $listeTypeContainer = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    
    }
    return $listeTypeContainer;
}

function creerReservation(
        $dateDebutReservation, $dateFinReservation,
        $dateReservation, $volumeEstime, $codeVilleMiseDisposition,
        $codeVilleRendre, $codeUtilisateur
) {
    $pdo = gestionnaireDeConnexion();
    $req = "insert into reservation "
            . " (dateDebutReservation,dateFinReservation,
        dateReservation,volumeEstime,codeVilleMiseDisposition,
        codeVilleRendre,codeUtilisateur) "
            . " values "
            . " ($dateDebutReservation,$dateFinReservation,
        $dateReservation,$volumeEstime,$codeVilleMiseDisposition,
        $codeVilleRendre,$codeUtilisateur) ";
    $pdo->query($req);
    $codeReservation = $pdo->lastInsertId();
    return $codeReservation ;
}

function convertToTimestamps($date) {
    $date = list( $annee, $jour, $mois ) = explode('-', $date);
    $ticks = gmmktime(0, 0, 0, (int) $mois, (int) $jour, (int) $annee);
    return $ticks;
}

function creerLigneDeReservation($codeReservation,$qteReserver,$numTypeContainer){
    $pdo = gestionnaireDeConnexion();
    $req = "insert into reserver "
            . " (codeReservation,qteReserver,numTypeContainer) "
            . " values "
            . " ($codeReservation,$qteReserver,$numTypeContainer) ";
    $pdo->query($req);
}

function listeReservation(){
    
    $listeReservation = array();
    $pdo = gestionnaireDeConnexion();
    if ($pdo != NULL) {
        $req = "SELECT * from reservation order by codeReservation DESC";
        $pdoStatement = $pdo->query($req);
        $listeReservation = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $listeReservation;
    
}

function listeContainer (){
    $listeContainer = array();
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){
        $req = "SELECT * from typeContainer ";
        $pdoStatement = $pdo->query($req);
        $listeContainer = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
    }
    
    return $listeContainer;
    
}

function getVille($ville){
    $pdo = gestionnaireDeConnexion();
    
    
     if($pdo != null){
        $req = "select nomVille from ville where codeVille=$ville";
        $pdoStatement = $pdo->query($req);
        
            
    }   
    
    $ville = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    return $ville;
}

function getTarification(){
    
    $listeTarification = array();
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){
        $req = "select * from tarificationContainer";
        $pdoStatement = $pdo->query($req);
        $listeTarification = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $listeTarification;
}

function getReserver(){
    
    $listeReserver = array();
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){
        $req = "select * from reserver";
        $pdoStatement = $pdo->query($req);
        $listeReserver = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $listeReserver;
    
}

function obtenirDetailReservation($codeReservation){
    $detailReservation = null;
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){      
        $req = "select * from reservation where codeReservation = $codeReservation";
        $resultat = $pdo->query($req);
        $detailReservation = $resultat->fetch();
        
    }
    return $detailReservation;
}



function changeEtat($codeReservation){
    
    $pdo = gestionnaireDeConnexion();
    $req = "update reservation set etat = 'validee' where codeReservation = $codeReservation";
    $pdo->query($req);

    $code = $codeReservation;
    $reservation = obtenirDetailReservation($code);
    $dateDebut = $reservation['dateDebutReservation'];
    $dateFin = $reservation['dateFinReservation'];
    $volume = $reservation['volumeEstime'];
    

    
    $diff = abs($dateDebut - $dateFin);
    
    $diff = $diff/ 86400;
        
    $diff = intval($diff);
    
    
    if($diff > 365 ){   
     $type = 'ANNEE';
    }
    
    else if($diff >= 90 && $diff <= 365){
        $type = 'TRIMESTRE';
    }
    else{
        $type = 'JOUR';
    }
    
    $montant = 0;
    $nbContenairs = 0;
  
    $reserver = getReserver();
    foreach ($reserver as $lesResa){
        
        if($lesResa['codeReservation'] == $codeReservation){
            
            $tarif = getTarification();
            
            foreach ($tarif as $prixContainer){
                
                if($lesResa['numTypeContainer'] == $prixContainer['numTypeContainer']){
                    
                    if($prixContainer['codeDuree'] == $type){
                        $prix = $prixContainer['tarif'];
                        $nb = $lesResa['qteReserver'];
                        
                        $montant = $montant + $prix * $nb ;
                        $nbContenairs = $nbContenairs + $nb;                        
                    }
                    
                }
            }            
                              
        }
    }
    
    if($type == 'JOUR'){
        
        $montant = $montant * $diff;
    }
    
    else if($type == 'TRIMESTRE'){
        
        $mois = floor($diff/ 30);
        
        if($mois >= 1 && $mois <= 3){
            $montant = $montant *1;
        }
        
        else if($mois >3 && $mois <= 6){
            $montant = $montant *2;
        }
        
        else if($mois >6 && $mois <= 9){
            $montant = $montant *3;
        }

        else if($mois >9 && $mois <= 12){
            $montant = $montant *4;
        }              
    }
    
    else if($type == 'ANNEE'){
        
        $annee = floor($diff/ 365);
        
        $montant = $montant * $annee;
        
    }
        
    $dateDevis = time();
    $valider = 0;

    $codeDevis = creerDevis($dateDevis, $montant, $volume, $nbContenairs, $valider);
    
    updateReservationWithDevis($codeDevis,$code);
  
   
}

function creerDevis($dateDevis,$montant,$volume,$nbContenairs,$valider){
    
        $pdo = gestionnaireDeConnexion();
        $req = "insert into devis "
            . " (dateDevis,montantDevis,
        volume,nbContainers,valider) "
            . " values "
            . " ($dateDevis,$montant,
        $volume,$nbContenairs,$valider) ";

        $pdo->query($req);
        $codeDevis = $pdo->lastInsertId();
    return $codeDevis ;
    
}

function updateReservationWithDevis($codeDevis,$codeReservation){
    $pdo = gestionnaireDeConnexion();    
    $req = "UPDATE `reservation` SET `codeDevis` = $codeDevis WHERE `reservation`.`codeReservation` = $codeReservation";
    $pdo->query($req);
  
}



function listeDevis($codeUtilisateur){
    $pdo = gestionnaireDeConnexion();
    $lesDevis = array();
    
    if($pdo != null){
        
        $req = "select * from devis, reservation where devis.codeDevis = reservation.codeDevis and reservation.codeUtilisateur = $codeUtilisateur";
        $pdoStatement = $pdo->query($req);
        $lesDevis = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $lesDevis;
}


function valideDevis($codeDevis){
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){
        $req="update devis set valider = 1 where codeDevis=$codeDevis";
        $pdo->query($req);
    }
}

function suprimmerDevis($codeDevis){
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){
        $req = "DELETE FROM `reservation` WHERE codeDevis = $codeDevis; delete from devis where codeDevis=$codeDevis";
        $pdo->query($req);
    }
}

function  listeUtilisateur(){
    
    $listeUtilsateur = array();
    $pdo = gestionnaireDeConnexion();
    if ($pdo != NULL) {
        $req = "SELECT * from utilisateur";
        $pdoStatement = $pdo->query($req);
        $listeUtilsateur = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $listeUtilsateur;
   
}

function detailUtilisateur($codeUtilisateur){
    
    $detailUtilisateur = null;
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){      
        $req = "SELECT * FROM utilisateur where code = $codeUtilisateur";
        $resultat = $pdo->query($req);
        $detailUtilisateur = $resultat->fetch();
        
    }
    return $detailUtilisateur;
    
}

function listePays(){
    $listePays = array();
    $pdo = gestionnaireDeConnexion();

    if($pdo != null){
        $req = "SELECT * from pays ";
        $pdoStatement = $pdo->query($req);
        $listePays = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    }

    return $listePays;
}

function getBoolPays($codePays,$p){
    
    $detailPays = null;
    $codePaysExistBdd = true;
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){
        
        $req = "select * from pays where codePays = '$p'";
        $resultat = $pdo->query($req);
        if($resultat == 0){
            $codePaysExistBdd = false;
        }
        
        
    }
    
    return $codePaysExistBdd;
    
}

function getJoinWithReservationAndDevis($codeReservation,$codeDevis){
    
    $detailReservationWithDevis = null;
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){      
        $req = "select * from reservation ,devis where reservation.codeDevis = devis.codeDevis and reservation.codeReservation = $codeReservation and reservation.codeDevis = $codeDevis  ";
        $resultat = $pdo->query($req);
        $detailReservationWithDevis = $resultat->fetch();
        
    }
    return $detailReservationWithDevis;
}

function creerUtilisateur($raisonSociale,$adresse,$cp,$ville,$adreMel,$telephone,$contact,$codePays,$login,$mdp){

    $pdo = gestionnaireDeConnexion();
    /*
    $req = "insert into utilisateur "
        . " (raisonSociale,adresse,cp,ville,adrMel,telephone,contact,codePays,login,mdp) "
        . " values "
        . " ('$raisonSociale','$adresse','$cp','$ville','$adreMel','$telephone','$contact','$codePays','$login','$mdp')";
    $pdo->query($req);
    */
    $req = "insert into utilisateur "
            . " (raisonSociale,adresse,
        cp,ville,
        adrMel,telephone,contact,codePays,login,mdp) "
            . " values "
            . " ('$raisonSociale','$adresse','$cp','$ville','$adreMel','$telephone','$contact','$codePays','$login','$mdp') ";
    
    $pdo->query($req);    
    $code = $pdo->lastInsertId();
    return $code;

}

function verification($login, $mdp) {
    $compteExistant = null;
    $pdo = gestionnaireDeConnexion();
    if ($pdo != null) {
        $sql = "SELECT * FROM utilisateur "
                . " WHERE login=:login AND mdp=:mdp";
        $prep = $pdo->prepare($sql);
        $prep->bindParam(':login', $login, PDO::PARAM_STR);
        $prep->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $prep->execute();
        $compteExistant = $prep->fetch();
    }
    return $compteExistant;
}

function getDureeReservation($dateDebutReservation,$dateFinReservation){
    
    $duree = abs($dateDebutReservation - $dateFinReservation);
    $duree = $duree/86400;
    
    return $duree;
    
}

function getTypeDureeReservation($duree){
    
    if($duree > 365 ){   
        $type = 'ANNEE';
    }

   else if($duree >= 90 && $duree <= 365){
        $type = 'TRIMESTRE';
    }
    else{
        $type = 'JOUR';
    }
    
    
    return $type;
}

function getDifferentContainerReserver($codeReservation,$codeDuree,$diff){
    
    $reserver = getRerservationWithReserver($codeReservation);
    $detailReservation = array();
    $compteur = 0;
    foreach ($reserver as $listeReserver){        
        
        $detailTarificationContainer = getDetailTarification($listeReserver['numTypeContainer'], $codeDuree); 
        $detailTypeContainer = getDetailTypeContainer($listeReserver['numTypeContainer']);
        $compteur = $compteur + 1;
        for($i = $compteur; $i<= $compteur; $i++){
            
            $detailReservation[$i]['libelle Type Container'] = $detailTypeContainer['libelleTypeContainer'];
            $detailReservation[$i]['prix Unitaire par '. strtolower($codeDuree)] = $detailTarificationContainer['tarif'];
            $detailReservation[$i]['quantite'] = $listeReserver['qteReserver'];            
            
            $montant = null;

            if($codeDuree == 'JOUR'){

                $montant = $listeReserver['qteReserver'] * $detailTarificationContainer['tarif'] * $diff;
            }

            else if($codeDuree == 'TRIMESTRE'){

                $mois = floor($diff/ 30);

                if($mois >= 1 && $mois <= 3){
                    $montant = $reserver['qteReserver'] * $detailTarificationContainer['tarif'] *1;
                }

                else if($mois >3 && $mois <= 6){
                    $montant = $reserver['qteReserver'] * $detailTarificationContainer['tarif'] *2;
                }

                else if($mois >6 && $mois <= 9){
                    $montant = $reserver['qteReserver'] * $detailTarificationContainer['tarif'] *3;
                }

                else if($mois >9 && $mois <= 12){
                    $montant = $reserver['qteReserver'] * $detailTarificationContainer['tarif'] *4;
                }              
            }

            else if($codeDuree == 'ANNEE'){

                $annee = floor($diff/ 365);

                $montant = $quantite * $detailTarificationContainer['tarif'] * $annee;

            }

            $detailReservation[$i]['montant Total'] = $montant;
        }
        
      
    }
    
    return $detailReservation;    
}

function getDetailTarification($numTypeContainer,$codeDuree){
    
    $detailTarification = null;
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){      
        $req = "select * from tarificationContainer where numTypeContainer = $numTypeContainer and codeDuree = '$codeDuree'";
        $resultat = $pdo->query($req);
        $detailTarification = $resultat->fetch();
        
    }
    return $detailTarification;
    
}

function getRerservationWithReserver($codeReservation){
    
    $listeReservationWithReserver = array();
    $pdo = gestionnaireDeConnexion();

    if($pdo != null){
        $req = "select * from reservation, reserver WHERE reservation.codeReservation = reserver.codeReservation and reservation.codeReservation = $codeReservation  ";
        $pdoStatement = $pdo->query($req);
        $listeReservationWithReserver = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    }

    return $listeReservationWithReserver;
    
}

function getDetailTypeContainer($numTypeContainer){
    
    $detailContainer = null;
    $pdo = gestionnaireDeConnexion();
    
    if($pdo != null){      
        $req = "select * from typeContainer where numTypeContainer = $numTypeContainer";            
        $resultat = $pdo->query($req);
        $detailContainer = $resultat->fetch();
        
    }
    return $detailContainer;
}

function tempsLimiteValidationDevis($dateReservation){
    
    $diff = abs(time() - $dateReservation);                          
    $diff = $diff/3600;
    
    return $diff;
    
}

function getBoolValideDevis($diff){

    $valide = false;
    if($diff <= 24 ){
        $valide = true;
    }
    
    return $valide;
    
}






