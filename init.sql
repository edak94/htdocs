CREATE TABLE Utilisateur
(
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Prenom VARCHAR (255) NOT NULL,
    Nom VARCHAR (255) NOT NULL,
    Email VARCHAR (255) NOT NULL,
    UserRole VARCHAR (255) NOT NULL,
    UserPassword VARCHAR (255) NOT NULL
);

CREATE TABLE Service
(
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Titre VARCHAR (255) NOT NULL,
    ServiceDescription TEXT  NOT NULL,
    Photo TEXT NULL
);

CREATE TABLE VoitureOption
(
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    VoitureId VARCHAR (255) NOT NULL,
    Texte VARCHAR (255) NOT NULL
);


CREATE TABLE Horaire
(
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Texte Text NOT NULL
);

CREATE TABLE VoitureOccasion
(
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Titre VARCHAR (255) NOT NULL,
    Photo Text  NULL,
    Prix VARCHAR (255) NOT NULL,
    Kilometrage VARCHAR (255) NOT NULL,
    Annee VARCHAR (255) NOT NULL,
    Description VARCHAR (255) NOT NULL,
    Model VARCHAR (255) NOT NULL,
    Marque VARCHAR (255) NOT NULL,
    Statuts VARCHAR (255) NOT NULL
);

CREATE TABLE VoitureCaracteristique
(
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    VoitureId VARCHAR (255) NOT NULL,
    Titre Text NOT NULL,
    Description Text NOT NULL
);

CREATE TABLE VoiturePhoto
(
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    VoitureId VARCHAR (255) NOT NULL,
    Chemin Text  NOT NULL
);

CREATE TABLE FormulaireContact
(
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Prenom VARCHAR (255) NOT NULL,
    Nom VARCHAR (255) NOT NULL,
    Email VARCHAR (255) NOT NULL,
    Telephone VARCHAR (255) NOT NULL,
    FormulaireContactMessage Text NOT NULL
);

CREATE TABLE AvisClient
(
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Nom VARCHAR (255) NOT NULL,
    Email VARCHAR (255) NOT NULL,
    Commentaire VARCHAR (255) NOT NULL,
    Note VARCHAR (255) NOT NULL,
    Statut VARCHAR (255) NOT NULL
);

INSERT INTO `utilisateur`(`Prenom`, `Nom`, `Email`, `UserRole`, `UserPassword`) VALUES ('ALEXANDRE','EL KHOURY','alex@alex.fr','ADMIN','5e85d811301c260df4b60a449e3e6e3c');
INSERT INTO `horaire`(`Texte`) VALUES ('HORAIRE A PERSONALISER');