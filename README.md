# 📚 Application de Gestion de Scolarité

## 🧾 Description

Cette application est une plateforme web développée avec **Laravel**, permettant de gérer efficacement un établissement scolaire.
Elle intègre des fonctionnalités modernes grâce à **Livewire** pour une interface dynamique sans rechargement et **Jetstream** pour une authentification sécurisée.

L'application permet de gérer les élèves, classes, niveaux et années scolaires (school years) de manière simple, rapide et organisée.

## 📸 Aperçu

![Gestion de Scolarité - Interface Dashboard](./public/storage/Db_gestion_scolaire.png)

## 🎯 Objectifs

- Centraliser les données scolaires
- Simplifier la gestion administrative
- Structurer les informations par niveaux et années
- Offrir une interface moderne et interactive sans JavaScript complexe

## ⚙️ Fonctionnalités principales

### 👨‍🎓 Gestion des élèves
- Ajouter / modifier / supprimer un élève
- Assigner un élève à une classe
- Recherche dynamique avec Livewire

### 🏫 Gestion des classes
- Création et gestion des classes
- Association avec les niveaux
- Liste dynamique des élèves par classe

### 📊 Gestion des niveaux
- Création des niveaux (6ème, 5ème, etc.)
- Organisation hiérarchique des classes

### 📅 Gestion des années scolaires (School Years)
- Création d'années scolaires
- Définir une année active
- Filtrage des données par année

## 🧱 Technologies utilisées

- **Backend** : Laravel
- **Frontend** : Blade + Livewire
- **Authentification** : Jetstream
- **Base de données** : MySQL / PostgreSQL
- **UI** : Tailwind CSS

## 🔐 Authentification avec Jetstream

L'application utilise Jetstream pour :

- Inscription / Connexion sécurisée
- Gestion des sessions
- Vérification email
- Gestion des profils utilisateurs

## ⚡ Dynamisme avec Livewire

Grâce à Livewire, l'application offre :

- Recherche en temps réel 🔍
- Pagination dynamique
- Formulaires interactifs sans rechargement
- Expérience utilisateur fluide

## 📁 Structure du projet

```
app/
 ├── Models/
 │    ├── Student.php
 │    ├── Classes.php
 │    ├── Level.php
 │    └── SchoolYear.php
 │
 ├── Http/
 │    ├── Controllers/
 │    └── Livewire/
 │         ├── CreateStudents.php
 │         ├── EditStudent.php
 │         ├── StudentList.php
 │         ├── CreateClasses.php
 │         ├── EditClasse.php
 │         ├── Classe.php
 │         ├── CreateLevel.php
 │         ├── EditLevel.php
 │         ├── ListNiveaux.php
 │         ├── CreateSchoolYear.php
 │         └── Settings.php
 │
database/
 ├── migrations/
 └── seeders/

resources/
 ├── views/
 │    ├── livewire/
 │    ├── layouts/
 │    ├── classes/
 │    ├── niveaux/
 │    ├── settings/
 │    ├── students/
 │    └── components/
```

## 🚀 Installation

1. **Cloner le repository**
   ```bash
   git clone <url-du-repo>
   cd Gestion_scolarite_v1
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances Node.js**
   ```bash
   npm install
   ```

4. **Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Base de données**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Compiler les assets**
   ```bash
   npm run build
   ```

7. **Lancer le serveur**
   ```bash
   php artisan serve
   ```

L'application sera accessible à `http://127.0.0.1:8000`

## 📝 Notes de développement

- Tous les composants Livewire sont dans `app/Livewire/`
- Les migrations sont dans `database/migrations/`
- Les vues Blade sont organisées par module dans `resources/views/`
- Les styles Tailwind sont configurés dans `tailwind.config.js`

## 🤝 Contribuer

Les contributions sont bienvenues ! N'hésitez pas à créer une pull request.

## 📄 Licence

Ce projet est sous licence MIT.
