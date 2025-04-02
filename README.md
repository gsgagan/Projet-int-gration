# 🎭 Projet de Réservation de Spectacles – Symfony 7

Bienvenue dans mon projet d’intégration Symfony 7, dans lequel on peut gérer des **lieux (locations)**, des **représentations**, des **spectacles**… et bientôt des **réservations**.  
L'API est construite avec **API Platform**, et on a aussi une interface classique avec Twig côté admin/utilisateur.

---

## 🛠 Stack technique

- Symfony 7.0
- PHP 8.2+
- Doctrine ORM
- API Platform (REST/JSON-LD)
- MySQL (ou MariaDB)
- Twig (pour les vues)
- Composer

---

## 🚀 Lancer le projet en local

1. Clone le repo  
   ```bash
   git clone https://github.com/gsgagan/Projet-int-gration.git
   cd Projet-int-gration
   ```

2. Installe les dépendances PHP  
   ```bash
   composer install
   ```

3. Configure la base de données dans `.env.local`  
   ```dotenv
   DATABASE_URL="mysql://user:password@127.0.0.1:3306/nom_de_ta_bdd"
   ```

4. Crée la base et lance les migrations (si tu en as)  
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:schema:update --force
   ```

5. Charge des fixtures (optionnel)  
   ```bash
   php bin/console doctrine:fixtures:load
   ```

6. Lance le serveur  
   ```bash
   symfony server:start
   ```

---

## 🔗 Accès à l’API

Swagger est dispo ici :  
➡️ [http://localhost:8000/api](http://localhost:8000/api)

Tu y trouveras tous les endpoints exposés avec `ApiResource`.

---

## 📦 Structure en cours

- [x] Entités Doctrine (Location, Show, Representation…)
- [x] Exposition via API Platform
- [x] Groupes de sérialisation (`location:read`, etc.)
- [ ] Système de réservation
- [ ] Sécurité (authentification / rôles)
- [ ] Tests unitaires & e2e
- [ ] Déploiement (Docker ou autre)

---

## 🤝 Auteur

Projet réalisé par [@gsgagan](https://github.com/gsgagan) dans le cadre d’un projet d’intégration Symfony.

---

## 🧪 À venir…

- ✅ Auth via JWT
- ✅ CRUD admin via EasyAdmin
- ✅ Ajout de tests automatisés
- ✅ Export PDF / envoi mail de confirmation

Stay tuned 👀
