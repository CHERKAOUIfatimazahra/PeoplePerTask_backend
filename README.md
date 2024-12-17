# PeoplePerTask_backend

### 📋 Contexte du Projet
PeoplePerTask est une plateforme dynamique visant à faciliter la gestion des projets, freelances, catégories et témoignages. Cette partie du projet développe exclusivement le backend en PHP procédural avec MySQLi pour un gestionnaire de contenu performant et intuitif.

### 🚀Fonctionnalités Principales
#### 🔧 Gestion des Projets
Ajouter, modifier et supprimer des projets via des scripts PHP.
#### 👤 Gestion des Freelances
Gérer les freelances : ajout, modification et suppression.
#### 🗂 Gestion des Catégories
Créer, modifier et supprimer des catégories et sous-catégories.
#### 💬 Gestion des Témoignages
Afficher et supprimer les témoignages des utilisateurs.
#### 📊 Tableau de Bord
Afficher des statistiques clés :
Nombre total de projets.
Nombre total de freelances.
#### 🌐 Internationalisation
Support multilingue en utilisant des fichiers de langue dynamiques (Français, Anglais).
#### 📞 Contact Support
Possibilité d’envoyer un message via la page "Contact Us".
### 🛠 Technologies Utilisées
- **Langage :** PHP procédural
- **Base de Données :** MySQL (MySQLi)
- **Serveur Local :** XAMPP
- **Internationalisation :** Fichiers de langues PHP
📦 Installation
Prérequis
- Serveur local comme XAMPP, WAMP, ou Laragon.
- PHP version 7.4 ou supérieure.
_ MySQL.
### Étapes d'Installation
#### Cloner le projet :
```bash
git clone https://github.com/username/PeoplePerTask-backend.git  
```
#### Configurer la base de données :

Accédez à phpMyAdmin et importez le fichier SQL :

```bash
database/peoplepertask.sql  
```
#### Modifier les paramètres de connexion :
Ouvrez config/db.php et configurez vos informations :

```php
<?php  
$host = "localhost";  
$user = "root";  
$password = "";  
$db_name = "peoplepertask";  

$conn = mysqli_connect($host, $user, $password, $db_name);  

if (!$conn) {  
    die("Erreur de connexion : " . mysqli_connect_error());  
}  
?>
```  

#### 🔗 Liens Utiles
Documentation PHP
Guide MySQLi

✨ N’hésitez pas à proposer des suggestions ou signaler des bugs via GitHub. ✨
