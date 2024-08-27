# Guide d'Installation et de Démarrage

## 1. Importer la Base de Données

Pour importer la base de données dans WampServer via l'interface graphique :

1. **Ouvrir PhpMyAdmin** :  
   Accédez à l'URL suivante dans votre navigateur web : [http://localhost/phpmyadmin](http://localhost/phpmyadmin).

2. **Connexion** :  
   - **Nom d'utilisateur** : `root`  
   - **Mot de passe** : (laisser vide)

3. **Importer le Fichier SQL** :  
   - Cliquez sur l'onglet **"Importer"**.
   - Sélectionnez le fichier `.sql` à partir de votre système de fichiers.
   - Cliquez sur **"Exécuter"** pour importer la base de données.

## 2. Démarrer le Serveur Symfony

Pour démarrer le serveur de développement Symfony :

1. **Ouvrir le Terminal** :  
   Accédez au répertoire de l'application via l'Explorateur de fichiers, puis ouvrez un terminal (CLI).

2. **Lancer le Serveur Symfony** :  
   Exécutez la commande suivante dans le terminal :

   ```bash
   symfony server:start
