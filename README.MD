# API Clinique Vétérinaire

API développée avec Symfony et API Platform pour la gestion d'une clinique vétérinaire.

## Membres du groupe
- Blaise Duplantier
- Timothée de Vasselot

## Installation

1. Cloner le projet
```bash
git clone 
cd api-veterinaire-symfony
# Informations nécessaires au bon fonctionnement de l'application

## Configuration technique

L'application nécessite PHP 8.2+, Symfony 6.4/7.0, MySQL 8.0 ou MariaDB 10.5+, et les extensions PHP standards (intl, pdo_mysql, openssl, gd, mbstring, xml). 

Pour l'installation, clonez le dépôt, installez les dépendances avec Composer, configurez la base de données dans le fichier .env.local, créez la base de données et exécutez les migrations, puis chargez les fixtures pour avoir des données de test. Générez les clés JWT et démarrez le serveur Symfony.

## Comptes de test

Des comptes sont créés automatiquement par les fixtures:
- Directeur: director@vet-clinic.com / password
- Vétérinaire: vet1@vet-clinic.com / password
- Assistant: assistant1@vet-clinic.com / password

## Structure et fonctionnalités

L'API repose sur quatre entités principales: User (personnel), Animal, Appointment (rendez-vous) et Treatment (traitements). L'API est accessible via le préfixe /api avec différents endpoints correspondant aux fonctionnalités requises par le cahier des charges.

Les rendez-vous peuvent avoir trois statuts: programmé (scheduled), en cours (in_progress) et terminé (completed). Les photos d'animaux sont stockées dans le dossier public/uploads/animals.

## Sécurité

L'authentification utilise JWT avec des tokens d'une durée de validité d'une heure. L'accès aux différentes routes est sécurisé via les voters Symfony selon le rôle de l'utilisateur connecté.

## Assistance et dépannage

En cas de problème d'accès, vérifiez les tokens JWT et les rôles. Pour les problèmes de routes, vérifiez l'URL et la méthode HTTP. Les problèmes d'upload peuvent être liés aux permissions du dossier uploads. Pour les applications frontend, vérifiez la configuration CORS.

Les logs sont disponibles dans le dossier var/log. Une documentation interactive de l'API est accessible à l'URL /api/docs, présentant tous les endpoints avec leurs paramètres et les réponses attendues.