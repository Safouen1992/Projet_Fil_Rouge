<?php



Abstract class ConnexionBD {


    //Objet PDO d'accès à la base de données
    private $bdd;

    // Exécute une requête SQL éventuellement paramétrée
    protected function excuteQuery ($sql, $params = null) {
        if ($params == null) {
            $res = $this ->getBdd() -> query ($sql); // Direct Query
        }
        else {
            $res = $this->getBdd()->prepare($sql); // Query with params
            $res->execute($params);
        }
        return $res;
    }




    // Instancie un objet de connexion à la base de données
    private function getBdd() {
    if ($this->bdd == null){
        // Instanciation de la connexion
        $this->bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8',
            'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
    return $this->bdd;
    }

}

