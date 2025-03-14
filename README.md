# API de Gestion des Pays

## Description
L'API a pour objectif de permettre la représentation et la gestion d'informations détaillées sur les pays, incluant notamment leur drapeau, capitale, population, région et autres données pertinentes. Elle offrira une interface sécurisée et conforme aux normes RESTful grâce à l'utilisation de Laravel, PostgreSQL et Laravel Sanctum.

## 1. Technologies utilisées
- **Laravel** (Framework PHP)
- **PostgreSQL** (Base de données relationnelle)
- **Laravel Sanctum** (Authentification par token pour API sécurisée)
- **PHPUnit** (Tests unitaires et d'intégration)
- **Postman/Swagger** (Documentation API)

## 2. Installation
1. Cloner le dépôt :
   ```sh
   git clone https://github.com/votre-repository.git
   cd votre-repository
   ```
2. Installer les dépendances :
   ```sh
   composer install
   ```
3. Configurer l'environnement :
   - Copier le fichier `.env.example` en `.env`
   - Configurer la base de données PostgreSQL dans `.env`
   ```sh
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=nom_de_la_base
   DB_USERNAME=utilisateur
   DB_PASSWORD=mot_de_passe
   ```
4. Générer la clé de l'application :
   ```sh
   php artisan key:generate
   ```
5. Exécuter les migrations et seeders :
   ```sh
   php artisan migrate --seed
   ```
6. Démarrer le serveur :
   ```sh
   php artisan serve
   ```

## 3. Endpoints de l'API

### 3.1. Authentification (Laravel Sanctum)
| Méthode | Endpoint       | Description |
|---------|---------------|-------------|
| POST    | /api/register | Inscription d'un nouvel utilisateur. |
| POST    | /api/login    | Connexion et obtention d'un token d'accès. |
| POST    | /api/logout   | Déconnexion et invalidation du token d'accès. |
| GET     | /api/user     | Récupération des informations de l'utilisateur authentifié. |

### 3.2. Gestion des Pays
| Méthode | Endpoint              | Description |
|---------|----------------------|-------------|
| POST    | /api/countries       | Création d'un nouveau pays avec les informations suivantes : nom, capitale, population, région, drapeau, etc. |
| GET     | /api/countries       | Liste de tous les pays présents dans la base de données. |
| GET     | /api/countries/{id}  | Affichage des détails d'un pays spécifique. |
| PUT     | /api/countries/{id}  | Modification des informations d'un pays. |
| DELETE  | /api/countries/{id}  | Suppression d'un pays de la base de données. |

### 3.3. Gestion des Drapeaux (Optionnel)
| Méthode | Endpoint                   | Description |
|---------|---------------------------|-------------|
| POST    | /api/countries/{id}/flag  | Upload ou mise à jour du drapeau pour le pays spécifié. |
| GET     | /api/countries/{id}/flag  | Récupération du drapeau du pays sous forme d'image. |

## 4. Contraintes et Exigences

### 4.1. Respect des Conventions RESTful
- Utilisation appropriée des méthodes HTTP (GET, POST, PUT, DELETE).
- Structuration cohérente et versionnée des endpoints pour assurer une bonne maintenabilité de l'API.

### 4.2. Sécurité
- Authentification sécurisée via Laravel Sanctum avec gestion des tokens d'accès personnels.
- Protection des endpoints sensibles grâce au middleware `auth:sanctum`.
- Validation rigoureuse des données d'entrée pour éviter les injections et autres attaques potentielles.

### 4.3. Tests et Qualité
- Mise en place de tests unitaires (avec PHPUnit) pour les fonctionnalités clés de l'API.
- Réalisation de tests d'intégration pour valider les principaux flux de données et interactions entre les composants.

### 4.4. Documentation
- Documentation complète de l'API via Postman ou Swagger, incluant des exemples concrets de requêtes et réponses JSON.
- Mise à jour régulière de la documentation en fonction des évolutions de l'API.

## 5. Livrables attendus
- **Code source** : Dépôt Git contenant l'intégralité du projet avec le code Laravel.
- **Migrations et seeders** : Scripts Laravel pour la création et le peuplement de la base de données PostgreSQL.
- **Documentation API** : Collection Postman ou documentation Swagger détaillant l'ensemble des endpoints.
- **Tests** : Suite de tests unitaires et d'intégration couvrant les principales fonctionnalités de l'API.

## 6. Contact
Pour toute question ou contribution, veuillez ouvrir une issue sur le dépôt GitHub ou contacter l'équipe de développement.

