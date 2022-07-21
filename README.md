# Nom du projet : KGB
***
URL de l'application :
http://peaceful-bastion-94923.herokuapp.com/

## Objectif
L'objectif est de créer un site internet permettant la gestion des données du KGB.
URL du back-end : 
http://peaceful-bastion-94923.herokuapp.com/admin
login : studiadmin@espion.fr
mot-de-passe : passwordStudi-JO$

## Contexte du projet : la BDD
***
Application réaliser avec le framework Symfony Contexte projet : 
Les agents ont un nom, un prénom, une date de naissance, un code d'identification, une nationalité, 1 ou plusieurs spécialités.
Les cibles ont un nom, un prénom, une date de naissance, un nom de code, une nationalité.
Les contacts ont un nom, un prénom, une date de naissance, un nom de code, une nationalité.
Les planques ont un code, une adresse, un pays, un type.
Les missions ont un titre, une description, un nom de code, un pays, 1 ou plusieurs agents, 1 ou plusieurs contacts, 1 ou plusieurs cibles, un type de mission (Surveillance, Assassinat, Infiltration ...), un statut (En préparation, en cours, terminé, échec), 0 ou plusieurs planque, 1 spécialité requise, date de début, date de fin.
Les administrateurs ont un nom, un prénom, une adresse mail, un mot de passe, une date de création. 

Règle métier : non effectuées
Sur une mission, la ou les cibles ne peuvent pas avoir la même nationalité que le ou les agents.
Sur une mission, les contacts sont obligatoirement de la nationalité du pays de la mission.
Sur une mission, la planque est obligatoirement dans le même pays que la mission.
Sur une mission, il faut assigner au moins 1 agent disposant de la spécialité requise.

## Technologies
***
Voici la liste des technologies utilisées dans ce projet :
* MySQL 8.1.6
* Composer 2.3.5
* Symfony 6.0.10

## Installation
***

```

$ cd ../path/to/the/file
* Vérifier que composer et php soient installés puis installer un projet Symfony en laçant la commande : 
$ symfony new kgb-app -–webapp  
$ git clone https://github.com/Spirecool/kgb_eval.git
* Installer les dépendances aevc Composer
$ composer up

```
