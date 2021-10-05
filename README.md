#ArtFen
ArtFen est un site internet permettant à un artiste peintre de publier ses oeuvres.

## Envirenment de développement

### Pré-requis

* PHP 7.1
* Composer
* Symfony CLI
* Docker
* Docker-compose

 Vous pouvez vérifier les pré-requis (sauf Docker es Docker-compose) avec la commande suivant (de la symfony CLI) :
 ```bash
 symfony check:requirements
 ```
### Lancer l'envirenement de développement 
 ```bash
 docker-compose up -d
 symfony serve -d
 ```

## Lancer des test
```bash
 php bin/phpunit --testdox
 or
 make test 
```