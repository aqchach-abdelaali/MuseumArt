#ArtFen
ArtFen est un site internet permettant à un artiste peintre de publier ses oeuvres.

## Envirenment de développement

### Pré-requis

* PHP 7.1
* Composer
* Symfony CLI
* Docker
* Docker-compose
* Nodejs et npm

 Vous pouvez vérifier les pré-requis (sauf Docker es Docker-compose) avec la commande suivant (de la symfony CLI) :
 ```bash
 symfony check:requirements
 ```
### Lancer l'envirenement de développement 
 ```bash
 composer install
 npm install
 npm run build
 docker-compose up -d
 symfony serve -d
 ```
### Lancer les migrations
```bash
symfony console doctrine:migrations:migrate
```
### Ajouter des données de tests(Fixtures)
```bash
symfony console doctrine:fixtures:load
```
## Lancer des test
```bash
 php bin/phpunit --testdox
 or
 make test 
```

### Arrêter toutes les containers docker
```bash
sudo chmod -R 777 /var/run/docker.sock
sudo docker kill $(docker ps -q)
```