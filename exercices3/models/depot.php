<?php
class Depot
{
    private $numCompte;
    private $date;
    private $montant;
    private $operation;


    public function __construct($numCompte, $date, $montant, $operation)
    {
        $this->numCompte = $numCompte;
        $this->date = $date;
        $this->montant = $montant;
        $this->operation = $operation;
    }

    public function Depot()
    {
        global $db;
        $resultat = false;

        $numCompte = $this->numCompte;
        $date = $this->date;
        $montant = $this->montant;
        $operation =$this->operation;


        $requete = 'INSERT INTO versement (numCompte, DateV, montant, operation) VALUES (:numCompte, :DateV, :montant, :operation)';

        $stetment = $db->prepare($requete); // Preparer la requete pour l'execution

        $execution = $stetment->execute(
            [
                ':numCompte' => $numCompte,
                ':DateV' => $date,
                ':montant' => $montant,
                ':operation' => $operation
            ]
        );

        if ($execution) {
            $resultat = true;
        }
        return $resultat;
    }

    static function getDepotById($id)
    {
        global $db;
        $requete = 'SELECT * FROM versement WHERE id = :id';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':id' => $id
            ]
        );

        if ($execution) {
            if ($data = $stetment->fetch()) {
                $versement = new Depot ($data['numCompte'], $data['DateV'], $data['montant'], $data['operation']);
                return $versement;
            } else return null;
        } else return null;
    }



    public function getId(){
        global $db;
        $requete = 'SELECT id FROM versement WHERE numCompte=:numCompte AND DateV=:DateV';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                
                ':numCompte' => $this -> getNumCompte(),
                ':DateV'     => $this -> getDate()
                
            ]
        );
        if ($execution) {
            if ($data = $stetment->fetch()) {
                $id = $data['id'];
                return $id;
            } else return null;
        } else return null;
    }

    static function getDepots(){
        global $db;
        $requete = 'SELECT * FROM versement WHERE 1';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute ([]);
        $versements = [];
        if ($execution) {
            while ($data = $stetment -> fetch()) {
                $versement = new Depot ($data['numCompte'], $data['DateV'], $data['montant'], $data['operation']);
                array_push($versements,$versement);
            }
            return $versements;
        } else return [];
    }

    static function montantTotale($id) {
        global $db;
        $solde_total=0;
        $requette = "SELECT montant,operation FROM versement WHERE numCompte=:id";
        $statement = $db->prepare($requette);
        $execution= $statement->execute([
            ':id'=> $id,
        ]);
        if ($execution){
            while ($data=$statement->fetch(PDO::FETCH_ASSOC)) {
                $type=$data['operation'];
                $montant=$data['montant'];
                    if ($type== "depot"){
                        $solde_total+=$montant;
                    }
                    if ($type== "retrait"){
                        if($montant>=0){
                            $solde_total-=$montant;

                        }
                    }
                    
                }
                return $solde_total;
        }
    }
    static function delete_client($numCompte){
        global $db;
        $requete = 'DELETE FROM compte WHERE numCompte=:numCompte';
        $stetment = $db->prepare($requete);
        $execution = $stetment->execute(
            [
                ':numCompte' => $numCompte,
            ]
        );
        if ($execution) {
            return true;
        }
    }

    // ... Autres fonctions de la classe ...


    // public function getCodeTarif(){
    //     global $db;
    //     $requete = 'SELECT codeTarif FROM tarif JOIN appartement ON tarif.codeTarif=:codeTarif';
    //     $stetment = $db->prepare($requete); // Preparer la requete pour l'execution

    //     $execution = $stetment->execute(
    //         [
    //             ':codeTarif' => $this->getCodeTarif()
    //         ]
    //     );
    //     if ($execution) {
    //         if ($data = $stetment->fetch()) {
    //             $codeTarif = $data['codeTarif'];
    //             return $codeTarif;
    //         } else return null;
    //     } else return null;
    // }
    
    // public function getNumProprietaire(){
    //     global $db;
    //     $requete = 'SELECT numProprietaire FROM proprietaire JOIN appartement ON proprietaire.numProprietaire=:numProprietaire';
    //     $stetment = $db->prepare($requete); // Preparer la requete pour l'execution

    //     $execution = $stetment->execute(
    //         [
    //             ':codeTarif' => $this->getCodeTarif()
    //         ]
    //     );
    //     if ($execution) {
    //         if ($data = $stetment->fetch()) {
    //             $codeTarif = $data['codeTarif'];
    //             return $codeTarif;
    //         } else return null;
    //     } else return null;
    // }
    public function getNumCompte()
    {
        return $this->numCompte;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getMontant()
    {
        return $this->montant;
    }
    public function getOperation()
    {
        return $this->montant;
    }
    /**
     * Set the value of TypeAppart
     *
     * @return  self
     */
    
        
    }
?>