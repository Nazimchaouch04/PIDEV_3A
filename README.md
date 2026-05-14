<div align="center">

# BioSync

### Holistic Health Management Platform

[![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=flat-square&logo=php)](https://www.php.net/)
[![Symfony](https://img.shields.io/badge/Symfony-6.4-000000?style=flat-square&logo=symfony)](https://symfony.com/)
[![MySQL](https://img.shields.io/badge/Database-MariaDB-4479A1?style=flat-square&logo=mysql)](https://mariadb.org/)
[![Python](https://img.shields.io/badge/Python-Face_API-3776AB?style=flat-square&logo=python)](https://www.python.org/)
[![Bootstrap](https://img.shields.io/badge/Frontend-Bootstrap_5-7952B3?style=flat-square&logo=bootstrap)](https://getbootstrap.com/)

**BioSync** is a production-grade, AI-powered health and wellness platform built with Symfony 6.4. It unifies nutrition tracking, fitness management, mental health assessments, medical consultations, and community support — enhanced with facial recognition login, machine learning predictions, an LLM-powered chatbot, and a gamification system.

[Features](#features) · [Tech Stack](#tech-stack) · [Architecture](#architecture) · [Getting Started](#getting-started) · [Configuration](#configuration) · [API Reference](#api-reference) · [Demo Accounts](#demo-accounts)

</div>

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Architecture](#architecture)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Face API Microservice](#face-api-microservice)
  - [Database Setup](#database-setup)
- [Configuration](#configuration)
- [Demo Accounts](#demo-accounts)
- [API Reference](#api-reference)
- [Modules Deep Dive](#modules-deep-dive)
- [Security](#security)
- [Contributing](#contributing)

---

## Overview

BioSync is a PIDEV (Projet Intégré de DEVeloppement) academic project built to production-grade standards. The platform addresses the fragmentation of health tools by combining **six core health domains** in a single application with a unified user profile, a global health score, and cross-module AI-driven insights.

The system supports three user roles — **Patient**, **Medical Specialist (Coach)**, and **Administrator** — each with a dedicated dashboard and fine-grained access control enforced via Symfony Security.

---

## Features

### Platform-wide
- **Multi-role authentication** — email/password with reCAPTCHA v3 bot protection + optional **Face ID login** powered by a Python microservice using the `face_recognition` library
- **Global health score** — aggregated across nutrition, fitness, and mental wellness activity
- **Gamification** — medals and points awarded per module, displayed on the unified dashboard
- **AI chatbot** — Groq LLM with structured database fallback for health-related queries
- **PDF export** — reports and prescriptions generated via DomPDF
- **Full audit trail** — every login, logout, and key action stored in `LogEvent` and viewable by admins

### Nutrition Module
- Log daily meals with automatic calorie calculation via the Calorie Ninjas API
- Per-meal food item breakdown with calories-per-gram precision
- Meal categorization by time-of-day (Breakfast, Lunch, Dinner, Snack)
- **ML-powered calorie predictions** using a pre-trained scikit-learn model

### Fitness Module
- Create and schedule sport sessions with individual exercises
- Exercise intensity levels: Light / Moderate / Intense
- Calorie burn calculation per exercise and per session
- **Smart alert system** — compares planned vs. actual session start time and sends email alerts on missed sessions (duplicate-safe via `alerteEnvoyee` flag)
- **AI-generated training programs** via Google Gemini API
- Exercise database integration via RapidAPI / ExerciseDB

### Mental Health Module
- Configurable quizzes with target stress levels per quiz
- Automatic score calculation and medal rewards on completion
- Full quiz history with status tracking
- Stress-level trend analysis and personalized recommendations

### Medical Module
- **Appointment booking** with specialist selection
- Two consultation modes: In-Person and Teleconsultation
- Appointment lifecycle: `DEMANDE → CONFIRME → REALISE → ANNULE`
- Digital consultation records: symptoms, diagnosis, and recommendations
- **Prescription management** — medications, dosage, duration, and instructions per consultation
- Email notifications via Mailjet on key appointment state changes

### Community Module
- Create and join **support groups** organized by health theme with capacity limits
- **Health events** management with date, location, and description
- Group membership with role tracking and join/leave functionality

### Administration Panel
- Full user management — search, filter by role, edit, soft/hard delete
- Certification request queue for medical specialist validation
- Activity log viewer with date and user filters
- KPI dashboard — total users, quizzes completed, pending certifications
- Admin-level appointment management across all specialists

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| **Backend Framework** | Symfony 6.4 (PHP 8.1+) |
| **ORM** | Doctrine ORM 3.6 + Doctrine Migrations |
| **Database** | MySQL / MariaDB 10.4+ |
| **Templating** | Twig + Bootstrap 5 |
| **JavaScript** | Stimulus Bundle + UX Turbo |
| **Styles** | SCSS / Bootstrap 5 |
| **Email** | Mailjet API v3 |
| **Bot Protection** | Google reCAPTCHA v3 |
| **AI Chatbot** | Groq API (LLM) |
| **Nutrition Data** | Calorie Ninjas API |
| **Exercise Data** | RapidAPI / ExerciseDB |
| **AI Programs** | Google Gemini API |
| **Face Recognition** | Python microservice (`face_recognition` library) |
| **ML Predictions** | scikit-learn (serialized `.pkl` model) |
| **PDF Generation** | DomPDF |
| **OAuth** | KnpUniversity OAuth2 Client Bundle |
| **Testing** | PHPUnit 10.5 |
| **Static Analysis** | PHPStan 2.1 |

---

## Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│                         BioSync Platform                         │
│                                                                   │
│  ┌────────────────────────────────────────────────────────────┐  │
│  │                     Symfony 6.4 (PHP)                      │  │
│  │                                                            │  │
│  │   Controllers (33)  →  Services (12)  →  Entities (22)    │  │
│  │         ↓                  ↓                  ↓            │  │
│  │      Routes            Business           Doctrine ORM     │  │
│  │      Forms (17)        Logic              Repositories     │  │
│  └──────────────────────────┬─────────────────────────────────┘  │
│                              │                                    │
│           ┌──────────────────┼──────────────────┐                │
│           ↓                  ↓                  ↓                │
│   ┌──────────────┐  ┌──────────────┐  ┌──────────────────┐      │
│   │   MariaDB    │  │  Face API    │  │   ML Service     │      │
│   │  Database    │  │  (Python     │  │  (scikit-learn   │      │
│   │  26 tables   │  │   :8001)     │  │   model.pkl)     │      │
│   └──────────────┘  └──────────────┘  └──────────────────┘      │
│                                                                   │
│   External APIs: Mailjet · Groq · Calorie Ninjas · Gemini        │
│                  RapidAPI · Google reCAPTCHA v3                   │
└─────────────────────────────────────────────────────────────────┘
```

**Role hierarchy enforced by Symfony Security:**
```
ROLE_ADMIN
    └── ROLE_COACH
            └── ROLE_USER
```

---

## Project Structure

```
biosync/
├── src/
│   ├── Controller/            # 33 controllers (modular by feature)
│   │   ├── Admin*/            # Admin-specific controllers
│   │   ├── NutritionController.php
│   │   ├── SportsController.php / SeanceSportController.php
│   │   ├── MentalController.php
│   │   ├── MedicalController.php / RendezVousController.php
│   │   ├── CommunityController.php
│   │   ├── SecurityController.php
│   │   ├── FaceLoginController.php
│   │   ├── ChatbotController.php
│   │   └── DashboardController.php
│   ├── Entity/                # 22 Doctrine entities
│   │   ├── Utilisateur.php    # Core user entity
│   │   ├── ProfilSante.php
│   │   ├── Repas.php / Aliment.php
│   │   ├── SeanceSport.php / Exercice.php
│   │   ├── QuizMental.php / Question.php
│   │   ├── RendezVous.php / Consultation.php / Prescription.php
│   │   ├── Specialiste.php
│   │   ├── GroupeSoutien.php / MembreGroupe.php / EvenementSante.php
│   │   └── LogEvent.php
│   ├── Service/               # 12 service classes
│   │   ├── MailjetService.php
│   │   ├── ChatbotService.php
│   │   ├── CalorieNinjasService.php
│   │   ├── CaloriePredictionService.php
│   │   ├── ExerciseDBService.php
│   │   ├── RisqueAlerteService.php
│   │   ├── QuizService.php
│   │   ├── RecaptchaService.php
│   │   ├── ProgrammeIAService.php
│   │   └── ActivityLogger.php
│   ├── Repository/            # 20+ Doctrine repositories
│   ├── Form/                  # 17 Symfony form types
│   ├── Security/              # LoginSuccessHandler, UserChecker
│   ├── EventSubscriber/       # Login/logout audit subscribers
│   └── Enum/                  # Intensite, TypeMoment
├── templates/                 # 144 Twig templates
│   ├── base.html.twig
│   ├── dashboard/
│   ├── nutrition/
│   ├── mental/
│   ├── medical/
│   ├── community/
│   └── admin/
├── config/
│   ├── packages/security.yaml
│   ├── routes.yaml
│   └── services.yaml
├── migrations/                # 6 Doctrine migration versions
├── public/                    # Web root (static assets, uploads)
├── face_api/                  # Python Face ID microservice
│   └── main.py
├── ml/                        # Machine learning models
│   ├── model.pkl
│   ├── train_model.py
│   ├── predict.py
│   └── dataset.csv
├── compose.yaml               # Docker setup
├── composer.json
└── .env
```

---

## Getting Started

### Prerequisites

- **PHP 8.1+** with extensions: `pdo_mysql`, `intl`, `mbstring`, `xml`, `zip`
- **Composer 2+**
- **Node.js 18+** and **npm** (for frontend assets)
- **MySQL / MariaDB 10.4+**
- **Python 3.9+** (for Face ID microservice only)
- **Symfony CLI** (recommended)

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/your-username/biosync.git
cd biosync

# 2. Install PHP dependencies
composer install

# 3. Install JavaScript dependencies and build assets
npm install
npm run build

# 4. Copy environment file and configure
cp .env .env.local
# Edit .env.local — see the Configuration section below

# 5. Create the database and run all migrations
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

# 6. (Optional) Load demo data
php bin/console doctrine:fixtures:load

# 7. Start the development server
symfony server:start
# or: php -S localhost:8000 -t public
```

The application will be available at `http://localhost:8000`.

### Face API Microservice

The facial recognition feature requires a separate Python service running alongside Symfony:

```bash
cd face_api

# Create and activate a virtual environment
python -m venv venv

# Windows
venv\Scripts\activate

# Linux / macOS
# source venv/bin/activate

# Install dependencies
pip install flask face_recognition numpy

# Start the service (listens on port 8001)
python main.py
```

> **Windows note:** `face_recognition` depends on `dlib` and requires **CMake** and **Visual Studio Build Tools** (C++ workload). Install these before running `pip install face_recognition`.

The microservice must be running for Face ID registration and login to function. If it is unavailable, standard email/password login continues to work normally.

### Database Setup

```bash
# Create the database
php bin/console doctrine:database:create

# Apply all migrations
php bin/console doctrine:migrations:migrate

# Validate schema integrity
php bin/console doctrine:schema:validate
```

### Useful Commands

```bash
# Clear application cache
php bin/console cache:clear

# List all registered routes
php bin/console debug:router

# View all registered services
php bin/console debug:container

# Run tests
php bin/phpunit

# Run static analysis
vendor/bin/phpstan analyse src
```

---

## Configuration

Copy `.env` to `.env.local` and populate the following variables. The `.env` file in the repository contains only placeholder values and is safe to commit.

```dotenv
# ─── Database ───────────────────────────────────────────────────────────────
DATABASE_URL="mysql://root:@127.0.0.1:3306/biosync?serverVersion=mariadb-10.4.32"

# ─── Application ────────────────────────────────────────────────────────────
APP_ENV=dev
APP_SECRET=change_this_to_a_random_32_character_string

# ─── Mailer ─────────────────────────────────────────────────────────────────
MAILER_DSN=smtp://localhost
MAILJET_API_KEY=your_mailjet_api_key
MAILJET_API_SECRET=your_mailjet_api_secret
MAILJET_FROM_EMAIL=noreply@biosync.com
MAILJET_FROM_NAME=BioSync

# ─── Google reCAPTCHA v3 ────────────────────────────────────────────────────
RECAPTCHA_SITE_KEY=your_site_key
RECAPTCHA_SECRET_KEY=your_secret_key

# ─── Groq AI (Chatbot) ──────────────────────────────────────────────────────
GROQ_API_KEY=your_groq_api_key

# ─── Calorie Ninjas (Nutrition) ─────────────────────────────────────────────
CALORIE_NINJAS_API_KEY=your_calorie_ninjas_api_key

# ─── RapidAPI / ExerciseDB (Fitness) ────────────────────────────────────────
RAPIDAPI_KEY=your_rapidapi_key

# ─── Google Gemini (AI Training Programs) ───────────────────────────────────
GEMINI_API_KEY=your_gemini_api_key
```

> **Never commit `.env.local`** or any file containing real API keys or secrets.

---

## Demo Accounts

After loading fixtures with `php bin/console doctrine:fixtures:load`:

| Role | Email | Password |
|------|-------|----------|
| Patient | `patient@test.com` | `Patient123!` |
| Specialist / Coach | `dr.test@biosync.com` | `Medecin123!` |
| Administrator | `admin@biosync.com` | `Admin123!` |

---

## API Reference

### Application Routes

| Method | Endpoint | Description | Access |
|--------|----------|-------------|--------|
| `GET` | `/` | Public landing page | Public |
| `GET/POST` | `/login` | User login | Public |
| `GET/POST` | `/register` | User registration | Public |
| `GET/POST` | `/forgot-password` | Password recovery | Public |
| `GET/POST` | `/reset-password/{token}` | Password reset | Public |
| `GET` | `/dashboard` | Role-aware dashboard redirect | ROLE_USER |
| `GET` | `/profile` | User profile management | ROLE_USER |
| `*` | `/nutrition/*` | Nutrition module | ROLE_USER |
| `*` | `/sports/*` | Fitness module | ROLE_USER |
| `*` | `/mental/*` | Mental health module | ROLE_USER |
| `*` | `/medical/*` | Medical module | ROLE_USER |
| `*` | `/community/*` | Community module | ROLE_USER |
| `POST` | `/chatbot` | AI chatbot | ROLE_USER |
| `*` | `/admin-*` | Admin panel | ROLE_ADMIN |
| `*` | `/admin/*` | Admin panel (alt prefix) | ROLE_ADMIN |

### Face API (Python microservice — port 8001)

| Method | Endpoint | Description |
|--------|----------|-------------|
| `POST` | `/api/face/generate-embedding` | Generate a 128-value facial embedding from an image |
| `POST` | `/api/face/register` | Register and store a face encoding for a user |
| `POST` | `/api/face/compare` | Compare a live capture against a stored encoding |
| `POST` | `/api/face/login` | Authenticate a user via facial recognition |

---

## Modules Deep Dive

### Gamification System

BioSync awards points and medals throughout the platform:

| Module | Reward |
|--------|--------|
| Nutrition | `pointsGagnes` per logged meal; summed into `scoreGlobal` |
| Fitness | `medailleObtenue` per completed session |
| Mental Health | `medailleQuiz` per completed quiz |
| Global | `Utilisateur.scoreGlobal` — aggregated cross-module score |

### Smart Alert System (Fitness)

The `SeanceSport` entity tracks both `heureDebut` (planned start) and `heureDebutReelle` (actual start). `RisqueAlerteService` compares these values and sends an alert email when a session is significantly delayed or missed. The boolean `alerteEnvoyee` flag prevents duplicate notifications.

### Machine Learning — Calorie Prediction

```
ml/
├── dataset.csv        # Training data
├── train_model.py     # Trains and serializes the pipeline
├── model.pkl          # Pre-trained scikit-learn model
└── predict.py         # CLI prediction interface
```

`CaloriePredictionService` loads `model.pkl` at runtime via Symfony's service container and exposes predictions to the nutrition module, giving users a data-driven calorie goal per meal.

### Face ID — Facial Recognition Flow

1. User opens **Profile → Register Face ID** and captures 3+ photos via webcam.
2. Each image is sent to the Python microservice, which returns a 128-value embedding.
3. Symfony averages the embeddings and stores the result as JSON in `Utilisateur.faceEncoding`.
4. On login, the user selects **Login with Face ID**, a live capture is compared against the stored vector, and — on success — the user is redirected based on their role (`/admin-dashboard` or `/dashboard`).

### AI Chatbot

`ChatbotService` sends user queries to the Groq LLM API with a health-focused system prompt. If the API is unavailable or the query matches a supported pattern, the service falls back to structured Doctrine queries against the local database to return relevant health data.

---

## Security

| Mechanism | Implementation |
|-----------|---------------|
| Password hashing | Symfony auto-algorithm (`bcrypt` / `argon2`) |
| CSRF protection | Symfony form CSRF tokens on all POST forms |
| Bot protection | Google reCAPTCHA v3 on login and registration |
| Role-based access control | Symfony `access_control` in `security.yaml` |
| Input validation | Symfony Constraints: regex, length, range, date |
| SQL injection prevention | Doctrine ORM with parameterized queries |
| Session security | Symfony session with 7-day remember-me cookie |
| Custom UserChecker | Pre/post-auth validation (e.g., account status) |
| Audit logging | `LoginSuccessSubscriber` + `LogoutSubscriber` → `LogEvent` entity |

---

## Contributing

This project was built as an academic submission. Contributions for educational or portfolio purposes are welcome.

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/your-feature`
3. Commit following Conventional Commits: `git commit -m 'feat: add your feature'`
4. Push: `git push origin feature/your-feature`
5. Open a Pull Request

---

## 🏫 Academic Context

This project was developed as a **Projet Intégré (PI)** at **ESPRIT** (École Supérieure Privée d'Ingénierie et de Technologies), Tunisia — by a team of 3rd-year Computer Engineering students.

---

## 📄 License

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for details.

---

<div align="center">

**Made with ❤️ by the BioSync Team — ESPRIT 3A41

*If this project helped you, please give it a ⭐!*


</div>
