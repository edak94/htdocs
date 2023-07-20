#ECF Garage V.Parrot 

Description : L'objectif de ce projet est de proposer une application web vitrine pour le garage automobile V.Parrot, implanté depuis 2021 à Toulouse et souhaitant promouvoir ses différents services. 

## Installation

1. Créer une base de données "alex"
2. Lancer le script sql "init.sql"


## Utilisation

1. Utilisateur admin par défaut : alex@alex.fr et mot de passe : 123
2. Aller dans le portail admin, créer un nouveau compte utilisateur admin et supprimer l'ancien 

## Fonctionnalités 

- Fonctionnalité 1 : Connexion en tant qu'administrateur ou employé du garage 

Pour que l'administrateur ou l'un des employés du garage puisse se connecter, il lui faudra cliquer sur "se connecter" en haut à droite de la page puis rentrer son email et mot de passe de connexion. 
A ce jour, deux utilisateurs existent : 
- l'administrateur et gérant du garage ==> email : Vincent.parrot@v-parrot.fr et mot de passe : 123
- un employé ==> email : john.doe@v-parrot.com et mot de passe : 1234

Afin de pouvoir accéder aux fonctionnalités administrateur ou employé, il faut ensuite cliquer sur "panneau de contrôle". 
La flèche à côté du nom/prénom servant à déconnecter l'administrateur ou employé


Pour avoir la vision client du site sans pour autant se déconnecter, il suffit de cliquer sur le logo en haut à gauche ou sur la page d'accueil. 

- Fonctionnalité 2 : gestion de la base véhicules d'occasion à vendre

Après s'être connecté au panneau admin, il sera possible en cliquant sur l'onglet "Occasions", d'ajouter une nouvelle annonce en cliquant sur "ajouter un véhicule". 
Il est également possbible de modifier des informations d'un véhicules déjà ajouté en cliquant sur le logo oeil puis modifier la fiche. L'admin ou l'employé pourra alors supprimer des options existantes, en ajouter de nouvelles en cliquant sur "ajouter une option" ou modifier d'autres informations déjà renseignées via le bouton "modifier la fiche". Il est aussi possible de supprimer l'intégralité de l'annonce en cliquant sur "supprimer la voiture". 
L'admin ou l'employé veillera à mettre à jour régulièrement le statut afin de ne plus mettre les véhicules déjà vendus en visibilité sur le site grâce au statut "vendu" accessible via le bouton "modifier la fiche". 

- Fonctionnalité 3 : gestion de la base avis clients 

Après s'être connecté au panneau admin, il sera possible en cliquant sur l'onglet "avis", d'ajouter un avis client ou d'approuver un avis déposé par un client directement sur le site via le bouton "options" identifié par un logo en forme de stylo puis "modifier le statut". 
Un filtre pour accéder plus rapidement aux avis est disponible 

- Fonctionnalité 4 : gestion de la base de données des contacts clients 

Après s'être connecté au panneau admin, il sera possible en cliquant sur l'onglet "contact", de prendre en compte les messages et demande envoyés par les clients directement via le site. Il faudra alors cliquer sur le logo voir en forme d'oeil pour accéder au détail du message. 
Un filtre est également disponible.

- Fonctionnalité 5 : gestion des services 

Après s'être connecté au panneau admin, il sera possible uniquement pour l'administrateur en cliquant sur l'onglet "services", d'ajouter un nouveau service ou de modifier les informations d'un service déjà existant. 
Un filtre est également disponible.

- Fonctionnalité 6 : gestion des utilisateurs 

Après s'être connecté au panneau admin, il sera possible uniquement pour l'administrateur en cliquant sur l'onglet "utilisateurs", d'ajouter un nouveau compte pour l'un de ses employés. 
Un filtre est également disponible.

- Fonctionnalité 7 : gestion des horaires 

Après s'être connecté au panneau admin, il sera possible uniquement pour l'administrateur en cliquant sur l'onglet "horaire d'ouverture", d'ajouter ou de modifier les horaires du garage qui s'affichent directement dans le footer du site en bas à gauche. 

## Licence 

Ce projet ne figure pas sous licence mais utilise divers composants open source Boostrap. 
Les langages utilisés sont html, css et PHP. 

## Informations de contact 

Pour contacter le créateur de ce site internet, vous pouvez directement contacter Alexandre EL KHOURY au 06.51.59.62.21 ou par email à edakgarage@gmail.com
