<?php
require_once 'Modèle/ConnexionBD.php';


class Annonce extends ConnexionBD
{
    // Renvoie la liste des annonces de la base
    public function getAnnonces() {
        $sql = "SELECT id_annonce, titre_annonce, nom_fdc, id_type, id_localisation,
        prix_annonce, descriptif_annonce, image_annonce, date_annonce, id_utilisateur,
        loyer_annuel, montant_charges, affaire_tenue_depuis, surface,
        terrasse, vitrine, chiffre_affaire, ebe, dpe, ges FROM annonce" ;
    $annonces = $this->excuteQuery($sql);
        return $annonces;
    }

    // Renvoie les informations sur une annonce
    public function getAnnonce ($idAnnonce) {
        $sql = "SELECT id_annonce, titre_annonce, nom_fdc, id_type, id_localisation,
        prix_annonce, descriptif_annonce, image_annonce, date_annonce, id_utilisateur,
        loyer_annuel, montant_charges, affaire_tenue_depuis, surface,
        terrasse, vitrine, chiffre_affaire, ebe, dpe, ges FROM annonce where id_annonce = ?" ;
        $annonce = $this->executerRequete($sql, array($idAnnonce));

        if ($annonce->rowCount()==1)
            return $annonce->fetch();
        else
            throw new Exception("Aucune annonce trouvée !!");
    }


    // Insère une annonce dans la base de données
    public function insertAnnonce ($idannonce, $titreannonce, $nomfdc, $idtype,
                                   $idlocalisation, $prixannonce, $descriptifannonce, $imageannonce, $dateannonce, $idutilisateur, $loyerannuel,
                                   $montantcharges,$affairetenuedepuis, $surface, $terrasse, $vitrine, $chiffreaffaire, $ebe, $dpe,$ges) {
        $sql = "INSERT INTO annonce(id_annonce, titre_annonce, nom_fdc, id_type, id_localisation, prix_annonce,
        descriptif_annonce, image_annonce, date_annonce, id_utilisateur,
        loyer_annuel, montant_charges, affaire_tenue_depuis, surface, terrasse,
        vitrine, chiffre_affaire, ebe, dpe, ges) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $annonce = $this->executerRequete($sql, array($idannonce, $titreannonce, $nomfdc, $idtype,
            $idlocalisation, $prixannonce, $descriptifannonce, $imageannonce, $dateannonce, $idutilisateur, $loyerannuel,
            $montantcharges,$affairetenuedepuis, $surface, $terrasse , $vitrine, $chiffreaffaire, $ebe, $dpe,$ges));

    }
}