#Phase 1 : Proposition des choix technologiques et estimations des délais
##1. Les choix technologiques
###1.1. Back-end
####1.1.1. PHP 5.6
Le langage de script PHP a l'avantage d'être simple et souple. Sa communauté de développeur est importante et sa documentation est très détaillée. Son typage est dit "faible", c'est à dire que l'on ne déclare pas le type des variables. Cependant, la permissivité du langage peut rendre très rapidemment le code de l'application déstructuré et incompréhensible. Il est donc impératif d'être rigoureux dans notre manière de développer. Sa simplicité d'utilisation et l'expérience des membres de l'équipe concernant cette technologie font que nous avons décidé de choisir ce langage.

Nous avons choisi d'utiliser un framework PHP MVC : [Nathan MVC](https://github.com/ndavison/Nathan-MVC). Il est assez simple d'utilisation et permet de structurer notre application. Le but du projet est de principalement utiliser du JavaScript. Nous avons donc préférés prendre une solution existante pour le backend afin de nous consacrer plus particlièrement à l'aspect frond-end du site.

L'architecture MVC permet de :
- Séparer le traitement des données et leur affichage.
- Simplifier l'évolution et la maintenance du code.

####1.1.2. Base de données - MySQL
Pour stocker les données, nous ne sommes orientés vers le système de gestion de base de données relationnelles MySQL. C'est une solution gratuite, simple d'utilisation. Le couple PHP/MySQL est très populaire chez les développeurs, ce qui fait que cette solution est proposée chez la majorité des hébergeurs web.

####1.1.3. Serveur Web - Apache
Apache est un serveur gratuit, open source et très populaire. Il est très souvent associé au couple PHP/MySQL afin de créer des sites internet. 

###1.2. Front-end
####1.2.1. HTML5 / CSS3
Le HTML5 est utilisé afin de structurer les pages de notre application.

#####1.2.1.1. Bibliothèques et plugins utilisés
######[Bootstrap 3 ](http://getbootstrap.com/)
Concernant le design, nous avons décidé d'utiliser Bootstrap 3 qui est un framework CSS . Il est simple d'utilisation et facile à prendre à main. Il a pour avantages d'être responsive design et permet de disposer les éléments facilement avec une grille. 

###### [Font Awesome](http://fortawesome.github.io/Font-Awesome/)
Font Awesome est une bibliothèque contenant plusieurs icônes vectorielles permettant d'illustrer certains éléments de notre application.

###### [SB Admin 2](http://startbootstrap.com/template-overviews/sb-admin-2/)
Nous avons utilisé ce thème bootstrap afin de concevoir la partie graphique de l'application. Il nous permet à l'aide de mots-clés dans l'attribut class de nos éléments d'obtenir des paramètres de styles qui donnent un aspect élégant à l'application.

####1.2.2. Javascript
>Javascript est utilisé à la fois pour dynamiser le source HTML/CSS mais aussi pour communiquer avec le serveur
>(requêtes AJAX) , ainsi le dynamisme n'est pas uniquement lié à la représentation graphique mais également au contenu
>chargé ou changé dynamiquement. 
O. ARGUIMBAU

##### 1.2.2.1. Bibliothèques et plugins utilisés
######[jQuery (version 2.1.3)](http://jquery.com/)
La bibliothèque jQuery permet de simplifier les commandes communes de JavaScript. L’une des forces de ce langage est de construire des applications web dynamiques notamment graâce à l’AJAX (Asynchronous Javascript and XML). Ainsi, ce dynamisme évite le rechargement de page et apporte un meilleur confort d’utilisation.

######[bootstrap.js](http://getbootstrap.com/)
Afin d'utiliser le thème SB Admin 2, nous avons du importer les fonctionnalités javascript de Bootstrap.

######[morris.js](http://morrisjs.github.io/morris.js/donuts.html)
Morris.js permet à son utilisateur à l'aide d'une dataSource en json d'obtenir des représentations graphiques avancées (graphiques, outils de statistiques). Il nous a permis dans le cas présent de génerer un diagramme "donut" pour représenter l'état du parc d'équipement.

######[raphael.js](http://raphaeljs.com/)
raphael.js est un prérequis à l'utilisation de morris.js. C'est une librairie JavaScript qui simplifie le travail avec des vecteurs graphiques en web.

######[jquery-tmpl.js](https://github.com/BorisMoore/jquery-tmpl)
jQuery template permet de créer facilement une page HTML avec du contenu dynamique.

###1.4. Gestion de versions - Git
L'utilisation d'un système de gestion de version permet de versionner le code de notre application et de créer des branches de développements. Ainsi, chaque membre de l'équipe peut travailler sur une fonctionnalité sans gêner les autres. A tout moment, nous pouvons consulter l'historique des modifications du code et savoir ce que les personnes ont fait. Le dépôt du projet est hébergé sur Github à l'adresse suivante : https://github.com/minmaj/net-work.

##2. Estimation des délais
|                                    | Durée (jour)     |
| ---------------------------------- | :--------------: |
| **Phase 1**                        |                  |
| Sélection des technologies         | 1/2              |
| **Phase 2**                        |                  |
| Conception de la base de données   | 1                |
| Réalisation des mockups            | 1                |
| **Phase 3**                        |                  |
| Réalisation de l'application       | 3                |
| Tests                              | 1/2              |
| Déploiement                        | 1/2              |
| **Total**                          | **6.5**          |



