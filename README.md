# BioSync - Plateforme de Santé Globale

Une application web complète de gestion de la santé qui intègre nutrition, fitness, santé mentale et suivi médical dans une expérience utilisateur unifiée.

## 🌟 Fonctionnalités Principales

- **🥗 Nutrition** : Suivi des repas, calcul de calories, recommandations personnalisées
- **🏃‍♂️ Sport & Fitness** : Planning d'entraînement, suivi des progrès, exercices recommandés
- **🧠 Bien-être Mental** : Quiz d'évaluation, suivi de l'humeur, exercices de relaxation
- **🏥 Module Médical** : Prise de rendez-vous, historique médical, téléconsultation
- **👥 Communauté** : Groupes de soutien, événements santé, forum de discussion
- **📊 Tableau de Bord** : Vue d'ensemble des métriques de santé et statistiques

## 🛠️ Stack Technique

- **Backend** : Symfony 6.4, PHP 8.1+
- **Base de données** : MySQL/MariaDB avec Doctrine ORM
- **Frontend** : Twig, Bootstrap 5, JavaScript
- **API** : REST API avec Symfony API Platform
- **Sécurité** : Authentification Symfony, reCAPTCHA v3
- **Services externes** : Mailjet (emails), Twilio (SMS), APIs tierces

## 🚀 Installation

### Prérequis
- PHP 8.1 ou supérieur
- Composer
- MySQL/MariaDB
- XAMPP (recommandé pour Windows)

### Étapes d'installation

1. **Cloner le projet**
   ```bash
   git clone <repository-url>
   cd PIDEV_3A
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configurer la base de données**
   ```sql
   -- Créer la base de données "biosync"
   -- Configurer .env avec DATABASE_URL approprié
   ```

4. **Exécuter les migrations**
   ```bash
   php bin/console doctrine:migrations:migrate
   ```

5. **Charger les données de test**
   ```bash
   php bin/console doctrine:fixtures:load
   ```

6. **Démarrer le serveur**
   ```bash
   # Option 1: PHP intégré
   php -S localhost:8000 -t public
   
   # Option 2: Symfony CLI
   symfony server:start
   ```

## 📱 Utilisation

### Comptes de démonstration
- **Patient** : `patient@test.com` / `Patient123!`
- **Spécialiste** : `dr.test@biosync.com` / `Medecin123!`
- **Admin** : `admin@biosync.com` / `Admin123!`

## 🔧 Commandes utiles

```bash
# Vider le cache
php bin/console cache:clear

# Vérifier la configuration
php bin/console debug:config

# Voir les routes
php bin/console debug:router

# Créer des données de test
php bin/console doctrine:fixtures:load --append
```

## 🔐 Sécurité

- Authentification sécurisée avec Symfony Security
- Validation des entrées et protection CSRF
- reCAPTCHA v3 pour la protection contre les bots
- Chiffrement des données sensibles
- Conformité RGPD

## 🤖 Intelligence Artificielle

- Analyse des métriques de santé
- Recommandations personnalisées
- Évaluations mentales avec IA
- Prédictions et tendances
- Face id

## 📧 Intégrations

- **Mailjet** : Envoi d'emails transactionnels
- **Twilio** : Notifications SMS
- **API externes** : Nutrition, météo, quiz
- **Services AI** : Analyse et recommandations

## 🌐 Déploiement

Le projet est configuré pour fonctionner avec :
- XAMPP (développement local)
- Docker (via `compose.yaml`)
- Environnement de production (serveur web Apache/Nginx)
  

**Développé avec ❤️ pour une meilleure santé globale**
