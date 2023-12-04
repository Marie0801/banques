<?php
class Compte
{
    private $nom;
    private $prenom;
    private $numTel;
    private $email;

    
    

    public function __construct($nom, $prenom, $numTel, $email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numTel = $numTel;
        $this->email = $email;
        

    }

    public function creerCompte()
    {
        global $db;
        $resultat = false;

        $nom = $this->nom;
        $prenom = $this->prenom;
        $numTel = $this->numTel;
        $email = $this->email;

    

        $requete = 'INSERT INTO compte (nom, prenom, numTel, email) VALUES (:nom, :prenom, :numTel,:email)';

        $stetment = $db->prepare($requete); // Preparer la requete pour l'execution

        $execution = $stetment->execute(
            [
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':numTel' => $numTel,
                ':email' => $email
            
            
            ]
        );

        if ($execution) {
            $resultat = true;
        }
        return $resultat;
    }

    

    public function getNumCompte(){
        global $db;
        $requete = 'SELECT numCompte  FROM compte WHERE nom = :nom AND numTel = :numTel';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':nom' => $this -> getNom(),
                ':numTel' => $this -> getNumTel()
                // ':adresse1' => $this -> getAdress1()
            ]
        );
        if ($execution) {
            if ($data = $stetment->fetch()) {
                $numCompte = $data['numCompte'];
                return $numCompte;
            } else return null;
        } else return null;
    }

    static function getComptes(){
        global $db;
        $requete = 'SELECT * FROM compte WHERE 1';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute ([]);
        $comptes = [];
        if ($execution) {
            while ($data = $stetment -> fetch()) {
                $compte = new Compte ($data['nom'], $data['prenom'], $data['numTel'], $data['email']);
                array_push($comptes, $compte);
            }
            return $comptes;
        } else return [];
    }

    static function supprimer($numCompte){
        global $db;
        $requete = 'DELETE FROM compte WHERE numCompte=:numCompte';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':numCompte' => $numCompte
            ]
        );
        if ($execution) {
            return true;
        }
}
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    public function getNumTel()
    {
        return $this->numTel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    // public function getMotDePasseConf()
    // {
    //     return $this->motDePasseConf;
    // }

    /**
     * Set the value of ad$adress2
     *
    
      */
    // public function setAdress2($adress2)
    // {
    //     global $db;
    //     $query = 'UPDATE locataire SET adresse2 = :adresse2 WHERE numLocataire = :numLocataire';
    //     $stmt = $db->prepare($query);
    //     $stmt->execute([
    //     ':adresse2'=> $adress2,
    //     ':numLocataire'=>$this->getnumLocataire()
    //     ]);
    //        return $this;
    // }
}
?>