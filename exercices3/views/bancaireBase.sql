CREATE TABLE IF NOT EXISTS utilisateur (
    numUtilisateur INT  NOT NULL AUTO_INCREMENT,
    nom VARCHAR (50) NOT NULL,
    prenom VARCHAR (50) NOT NULL,
    numTel INT NOT NULL,
    email VARCHAR (50) NOT NULL,
    motDePasse VARCHAR (50) NOT NULL,
    PRIMARY KEY (numUtilisateur)
    
);
CREATE TABLE IF NOT EXISTS compte (
    numCompte INT  NOT NULL AUTO_INCREMENT,
    nom VARCHAR (50) NOT NULL,
    prenom VARCHAR (50) NOT NULL,
    numTel INT NOT NULL,
    email VARCHAR (50) NOT NULL,
    PRIMARY KEY (numCompte)
    
);
CREATE TABLE IF NOT EXISTS versement (
    id INT  NOT NULL AUTO_INCREMENT,
    numCompte INT  NOT NULL,
    DateV DATE  NOT NULL,
    montant INT  NOT NULL,
    operation VARCHAR (50) NOT NULL,
    FOREIGN KEY (numCompte) REFERENCES compte (numCompte),
    PRIMARY KEY (id)
    
);
