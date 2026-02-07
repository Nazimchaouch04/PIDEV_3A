# BioSync - Instructions d'installation

## ✅ Projet installe avec succes!

Le projet Symfony BioSync est operationnel dans `C:\Users\charaf\Desktop\biosync_new`

---

## ✅ Installation terminee

- Database `biosync` creee avec 26 tables
- Migration executee (Version20260203232743)
- Serveur demarre sur http://localhost:8000

---

## 🚀 Utilisation

**Demarrer le serveur:**
```bash
php -S localhost:8000 -t public
```

**Acceder a l'application:**
http://localhost:8000

---

## 📦 Commandes utiles (deja executees)

### 1. Aller dans le dossier du projet
```bash
cd C:\Users\charaf\Desktop\biosync_new
```

### 2. Creer la migration et la base de donnees
```bash
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

### 3. Lancer le serveur
```bash
symfony serve
# OU
php -S localhost:8000 -t public
```

### 4. Acceder a l'application
- **Page d'accueil**: http://localhost:8000
- **Connexion**: http://localhost:8000/login
- **Inscription**: http://localhost:8000/register

---

## Structure du projet

### Entites creees (13 total)
| # | Entite | Module |
|---|--------|--------|
| 1 | Utilisateur | Noyau |
| 2 | ProfilSante | Noyau |
| 3 | Repas | Nutrition |
| 4 | Aliment | Nutrition |
| 5 | SeanceSport | Sport |
| 6 | Exercice | Sport |
| 7 | QuizMental | Mental |
| 8 | Question | Mental |
| 9 | Specialiste | Medical |
| 10 | RendezVous | Medical |
| 11 | GroupeSoutien | Communaute |
| 12 | EvenementSante | Communaute |
| 13 | MembreGroupe | Communaute |

### Pages disponibles
- `/` - Page d'accueil (landing)
- `/login` - Connexion
- `/register` - Inscription
- `/dashboard` - Tableau de bord
- `/profile` - Profil utilisateur
- `/nutrition` - Module nutrition
- `/sports` - Module sport
- `/mental` - Module bien-etre mental
- `/medical` - Module medical
- `/community` - Module communaute

### Configuration base de donnees (.env)
```
DATABASE_URL="mysql://root:@127.0.0.1:3306/biosync?serverVersion=8.0.32&charset=utf8mb4"
```

---

## Fichiers importants

- `src/Entity/` - Toutes les entites
- `src/Controller/` - Tous les controleurs
- `src/Form/` - Tous les formulaires
- `src/Repository/` - Tous les repositories
- `templates/` - Tous les templates Twig
- `public/css/style.css` - CSS principal
- `public/js/app.js` - JavaScript principal

---

## Pour ajouter des donnees de test (fixtures)

```bash
composer require --dev orm-fixtures
php bin/console make:fixtures
php bin/console doctrine:fixtures:load
```

---

## 📥 Installation de Symfony CLI (Recommande)

### Methode 1: Via Scoop (Recommande)
```bash
# Installer Scoop si pas deja installe
iwr -useb get.scoop.sh | iex

# Installer Symfony CLI
scoop install symfony-cli
```

### Methode 2: Telechargement direct
1. Telecharger depuis: https://github.com/symfony-cli/symfony-cli/releases
2. Chercher `symfony-cli_windows_amd64.zip`
3. Extraire et ajouter au PATH Windows

### Methode 3: Via l'installateur officiel
```bash
# Telecharger et executer l'installateur
curl -sS https://get.symfony.com/cli/setup.exe -o setup.exe
./setup.exe
```

### Verifier l'installation
```bash
symfony -v
```

### Utiliser Symfony CLI
```bash
# Demarrer le serveur (au lieu de php -S)
symfony server:start

# Avec HTTPS automatique
symfony server:start --daemon

# Arreter le serveur
symfony server:stop

# Voir les logs
symfony server:log
```

---

## Rappel: Navigation

Toutes les pages authentifiees utilisent la sidebar avec navigation vers:
- Dashboard
- Profil
- Nutrition
- Sport
- Mental
- Medical
- Communaute
