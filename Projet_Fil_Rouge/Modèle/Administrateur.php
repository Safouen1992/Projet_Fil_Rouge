<?php
require_once 'Modèle/ConnexionBD.php';


class Administrateur
{
    // Renvoie la liste des administrateurs de la base
    public function getUtilisateurs() {
        $sql = "SELECT id_administrateur, id_utilisateur FROM administrateur" ;
        $administrateurs = $this->excuteQuery($sql);
        return $administrateurs;
    }

    // Renvoie les informations sur une annonce
    public function getAnnonce ($idAdministrateur) {
        $sql = "SELECT id_administrateur, id_utilisateur FROM administrateur WHERE id_administrateur = ?" ;
        $administrateur = $this->executerRequete($sql, array($idAdministrateur));

        if ($administrateur->rowCount()==1)
            return $administrateur->fetch();
        else
            throw new Exception("Aucune annonce trouvée !!");
    }

    // Insère un administrateur dans la base de données
    public function insertAdministrateur ($idadministrateur,$idutilisateur) {
        $sql = "INSERT INTO administrateur(id_administrateur, id_utilisateur) VALUES (?,?)";
        $annonce = $this->executerRequete($sql, array($idadministrateur,$idutilisateur));

    }
}