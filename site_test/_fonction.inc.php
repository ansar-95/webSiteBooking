<?php

function listePays() {
    $collectionEtablissements = array();
    $pdo = gestionnaireDeConnexion();
    if ($pdo != false) {
        $req = "select * from PAYS";
        $pdoStatement = $pdo->query($req);
        $collectionEtablissements = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $collectionEtablissements;
}

function gestionnaireDeConnexion() {
    $pdo = null;
    try {
        $pdo = new PDO(
                //'mysql:host=localhost;dbname=THOLDI', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                'mysql:host=172.31.0.110;dbname=db_devis', 'slam', 'azerty', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
    } catch (PDOException $err) {
        $messageErreur = $err->getMessage();
        error_log($messageErreur, 0);
    }
    return $pdo;
}

function inscrire($raisonSociale, $adresse, $cp, $ville, $adrMel, $telephone, $contact, $login, $mdp, $codePays) {

    $reussi = false;
    $pdo = gestionnaireDeConnexion();
    if ($pdo != false) {
        $raisonSociale = $pdo->quote($raisonSociale);
        $adresse = $pdo->quote($adresse);
        $cp = $pdo->quote($cp);
        $ville = $pdo->quote($ville);
        $adrMel = $pdo->quote($adrMel);
        $telephone = $pdo->quote($telephone);
        $contact = $pdo->quote($contact);
        $login = $pdo->quote($login);
        $mdp = $pdo->quote($mdp);
        $codePays = $pdo->quote($codePays);

        $req = "insert into PERSONNE values(null,$raisonSociale, $adresse, $cp, $ville, $adrMel, $telephone, $contact, $login, $mdp, $codePays)";

        $resultat = $pdo->exec($req);

        if ($resultat == 1) {
            $reussi = true;
        }
        return $reussi;
    }
}


function verification($login, $mdp){
    $bool = false;
    $pdo = gestionnaireDeConnexion();
    if ($pdo != false) {
        $sql = "SELECT count(*) as nb FROM PERSONNE WHERE login=:login AND mdp=:mdp";
        $prep=$pdo->prepare($sql);
        $prep->bindParam(':login',$login, PDO::PARAM_STR);
        $prep->bindParam(':mdp',$mdp, PDO::PARAM_STR);
        
        $prep->execute();
        $resultat=$prep->fetch();
        
        if($resultat["nb"]==1){
            $bool=true;
        }
        $prep->closeCursor();
    }
    return $bool;
}

function creationPanier() {
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();

    }
    return true;
}

/**
 * Ajoute un article dans le panier
 * @param string $libelleProduit
 * @param int $qteProduit
 * @param float $prixProduit
 * @return void
 */
function ajouterArticle($typeContainer, $qteReserver) {

    //Si le panier existe
    if (creationPanier()) {
        if (array_key_exists($typeContainer, $_SESSION["panier"])) {
            $_SESSION["panier"][$typeContainer] += $qteReserver;
        } else {
            $_SESSION["panier"][$typeContainer] = $qteReserver;
        }
    }
}

/**
 * Supprime un article du panier
 * @param $libelleProduit
 * @return unknown_type
 */
function supprimerArticle($typeContainer) {
    //Si le panier existe
    if (creationPanier()) {
        unset($_SESSION["panier"][$typeContainer]);
    }
}

/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier() {
    unset($_SESSION['panier']);
}

function listeContainers() {
    $listeContainers = array();
    $pdo = gestionnaireDeConnexion();
    if ($pdo != NULL) {
        $req = "select * from TYPECONTAINER";
        $pdoStatement = $pdo->query($req);
        $listeContainers = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $listeContainers;
}
