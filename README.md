# BDE-Events

## Liens du projet

1-planification JIRA
_https://ihsanebenmouina-1776158181609.atlassian.net/jira/software/projects/BELBDCE/boards/464

2-Présentation Canva

-https://www.canva.com/design/DAHQNt-tI3A/1j2FiimXH-J8savCixpjWw/edit?ui=eyJFIjp7Im0iOnRydWUsIkE_IjoibiJ9LCJLIjp7IkEiOiI0ZDI4ZDY4OS1jYzBmLTQ0YWMtYmRjMS00NWM4OTdlZTliOWQifX0

3-Lien GitHub

https://github.com/fadaldrame97-sys/-La-Billetterie-du-Campus-ENAA



## Présentation

BDE-Events est une application web développée avec Laravel dans le cadre d'un brief de formation Développeur Web et Web Mobile.

L'objectif est de permettre au Bureau des Étudiants (BDE) de gérer les événements du campus et de donner aux étudiants la possibilité de réserver leur place et de consulter leurs billets depuis leur espace personnel.

---

## Fonctionnalités

### Administrateur

- Connexion sécurisée
- Création d'un événement
- Consultation du tableau de bord
- Visualisation du nombre de réservations
- Calcul automatique des places restantes
- Consultation de la liste des étudiants inscrits

### Étudiant

- Connexion
- Consultation des événements disponibles
- Réservation d'un événement
- Vérification qu'un événement n'est pas complet
- Empêche une double réservation
- Consultation de l'espace **Mes Billets**
- Génération automatique d'un code de réservation unique

---

## Technologies utilisées

- Laravel 13
- PHP
- MySQL
- Eloquent ORM
- Blade
- Tailwind CSS
- Git & GitHub

---

## Base de données

L'application est composée de trois tables principales :

- users
- events
- reservations

Une réservation est liée à un utilisateur et à un événement.

---

## Installation

Cloner le projet :

```bash
git clone <url-du-projet>
```

Entrer dans le dossier :

```bash
cd BDE-Events
```

Installer les dépendances :

```bash
composer install
```

Copier le fichier d'environnement :

```bash
cp .env.example .env
```

Générer la clé :

```bash
php artisan key:generate
```

Configurer la base de données dans le fichier `.env`.

Lancer les migrations :

```bash
php artisan migrate
```

Démarrer le serveur :

```bash
php artisan serve
```

---

## Sécurité

L'application utilise un middleware personnalisé `IsAdmin` afin de protéger toutes les routes d'administration.

Les étudiants ne peuvent pas accéder aux pages réservées au BDE.

Les réservations sont également sécurisées :

- impossible de réserver deux fois le même événement ;
- impossible de réserver lorsqu'il n'y a plus de places disponibles.

---

## Structure du projet


MVC

---

## Auteur

Projet réalisé par **Mouhamadou Fadal Dramé** dans le cadre du brief **BDE-Events** à ENAA Digital Center.