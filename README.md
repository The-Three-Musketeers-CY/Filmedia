# Filmedia

Filmedia est un projet réalisé par William DENOYER & Benjamin WALLETH en L2 Informatique - CMI SIC à CY Cergy Paris Université dans le cadre du module de **Développement Web 2020/2021**.

![CY Cergy Paris Université](https://upload.wikimedia.org/wikipedia/fr/thumb/6/69/Logo_CY_Cergy_Paris_Universit%C3%A9.svg/129px-Logo_CY_Cergy_Paris_Universit%C3%A9.svg.png)

Ce projet a été réalisé en PHP, HTML5 & CSS3.

## Description du projet

Ce projet consiste en la création d'un site web avec des pages dynamiques réalisées en PHP qui résume les connaissances apprises pendant le module.

Ce site est orienté sur les sites et les séries. Il permet aux utilisateurs de retrouver les films au box-office, les séries du moment, différents films/séries par catégories, de pouvoir rechercher des films/séries/acteurs... Mais aussi, d'afficher en détails les informations de ces différents médias pour y retrouver la date de sortie, la description, les bandes annonces et d'autres informations...

Pour récupérer les différentes données dont le site à besoin, on utilise plusieurs API qui reposent sur les deux formats de données les plus courant dans le web : **JSON** & **XML**.

## Critères d'évaluation

Ce projet a été évalué sur ces différents critères :
 - Niveau de réalisation
 - Originalité de la solution
 - Maîtrise des différents éléments techniques appris pendant le module (HTML5, CSS3, PHP)
 - Ergonomie & esthétique du résultat
 - Qualité technique sur le navigateur (côté client) : absence de bugs et passage des différentes validations
 - Niveau technique (solution technique, affichage graphique des résultats, etc...)

## Hébergement

Pour mettre en ligne ce projet, nous avons utilisé une solution d'hébergement web utilisant Apache. Nous avons choisi **[AlwaysData](https://alwaysdata.com)** qui est une solution gratuite et stable.

## Stockage & Cookies

Afin de permettre une meilleur ergonomie et expérience utilisateur, ce site utilise :

 - **Des cookies** : stockage du dernier média consulté par l'utilisateur
 - **Le format CSV** : stockage du nombre de visite sur chaque média consulté sur le site par un utilisateur

## Statistiques

L'utilisation des différentes données stockées au format CSV et de la librairie PHP **[jpgraph](https://jpgraph.net/)** permet la mise en place d'une page *"statistiques"* en générant des graphiques au format PNG affichant, par exemple, aux utilisateurs quels sont les médias les plus consultés sur le site.
