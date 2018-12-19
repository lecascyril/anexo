Anaxago symfony-starter-kit
===================

# Installation
- ```composer install```
- ```composer init-db ```
(class et fixtures modifiées)

- ```composer require friendsofsymfony/rest-bundle "dev-master" ```
- ```composer require jms-serializer/serializer-bundle "dev-master" ```

# Description

Ce projet est un kit de démarage avec :
- Symfony 3.4 minimum
- php 7.1 minimum

La base de données contient deux tables :
- user => pour la gestion et la connexion des utilisateurs 
- project => pour la liste des projets
- userfav => pour la liaison entre utilisateurs et projets

Les données préchargés sont
- pour les users 

| email     | password    | Role |  Key Api    |
| ----------|-------------|--------|----------|
| john@local.com  | john   | ROLE_USER    | 0102
| admin@local.com | admin | ROLE_ADMIN   | 0201

 - une liste de 3 projets
 
La connexion et l'enregistrement des utilisateurs sont déjà configurés et opérationnels comme précédement

L'acces aux differentes api se fait aux adresses
pour la liste des differents projects:
``` get /projects ```
pour mettre en favori un investissement, et investir eventuellement
``` post /money/key={keyapi}/idProject={idp}/montant={sum} ```
pour la liste des projets mis en favoris par un utilisateur
``` get /listepro/key={keyapi} ```

où keyapi est la clef d'identification d'un utilisateur
idp est l'identifiant d'un project
sum est la somme investie