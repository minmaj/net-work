#Document de livraison

##1. Liste des livrables
L'application est capable :
- d'afficher en page d'accueil la liste des équipements en panne
- d'afficher les équipements selon leur type lorsque l'on clique sur la liste (requête ajax)    
- d'afficher un donut qui représente les états du parc d'équipement
- de rafraîchir automatiquement (server sent events) : 
    - les équipements
    - le nombre d'équipement en panne
    - la liste des notifications
    - le donut
    - la liste des pannes mineures et majeures
- d'afficher les détails d'un équipement (requête ajax)
- d'ajouter et supprimer des équipements (requête ajax)
- de modifier les propriétés des équipements en écritures (requête ajax)
- d'afficher un journal de bord en permanence (requête ajax)
- d'obliger la saisie d'un commentaire lorsque l'on met l'équipement en "arrêt de maintenance" ou "en marche".
- d'activer un mode de simulation pour tester l'application (update dans la base de données)

##2. Tester l'application

L'application est accessible est à l'adresse suivante : localhost/net-work/administration

### 2.1. Pré-requis
#### 2.1.1. PHP
L'application est compatible avec PHP 5.5.X et plus.

#### 2.1.2. MySQL
- Nom de la base de données : net-work-db
- Login : root
- Mot de passe : vide par défaut

Vous pouvez modifier ces paramètres dans le fichier net-work/models/database/database.php ($dns, $username, $password).


Le jeu de données est disponible [ici](../models/database/net-work-db-v4.sql) (net-work/models/database/net-work-db-v4.sql). Ce fichier doit être importé dans MySQL afin que l'application fonctionne.

### 2.2. Lancer la simulation
Appuyez sur le bouton "Lancer une simulation" situé en haut à droite de l'interface.


La simulation va tout d'abord changer les états techniques : 
- le statut de l'ordinateur fixe PC-HP-05123Y (id : 55) passe en état inconnu
- le statut de l'ordinateur fixe PC-HP-05124X (id : 56) passe en panne majeur
- le statut de l'ordinateur fixe PC-HP-05123Y (id : 55) passe en panne mineure
- le statut de l'ordinateur fixe PC-HP-05123Y (id : 55) passe en fonctionnel
 
Puis elle modifie les états fonctionnels :
- l'ordinateur portable NB-AS-GTERX22 (id : 57) s'éteint
- l'ordinateur fixe PC-HP-05124X (id : 56) passe en veille
- l'ordinateur portable NB-AS-GTERX22 (id : 57) se met en marche

