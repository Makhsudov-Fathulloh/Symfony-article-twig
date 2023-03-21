# Symfony-article-twig

Installing & Setting up the Symfony Framework

Quickstart
Open a PowerShell terminal
> Set-ExecutionPolicy RemoteSigned -Scope CurrentUser 
( # Optional: Needed to run a remote script the first time )
> irm get.scoop.sh | iex

> symfony check:requirements

1.
> composer create-project symfony/skeleton article-twig

> symfony check:requirements
> composer install
> php bin/console about

> symfony server:start

  http://localhost:8000/
  
2. 
> composer require doctrine > (n) >

> composer require annotations

> composer require symfony/orm-pack

> composer require --dev symfony/maker-bundle

> symfony console make:controller ArticleController 

> composer require twig

3.
> symfony console doctrine:database:create

> symfony console make:entity
    (Article > symfony console make:migration > symfony console doctrine:magration:migrate, 
     User > symfony console make:migration > symfony console doctrine:magration:migrate)
     
> symfony console make:entity (Article > user > relation > User > ManyToOne > no > yes > [Enter] > no > Success)

> symfony console make:migration

> symfony console doctrine:magration:migrate

4.
> composer require --dev doctrine/doctrine-fixtures-bundle

> symfony console doctrine:fixtures:load

> Add fixtures file and fillar (ArticleFixtures, UserFixtures)

  https://symfony.com/bundles/DoctrineFixturesBundle/current/index.html#loading-the-fixture-files-in-order
  (Loading the Fixture Files in Order)
  
> symfony console doctrine:fixtures:load
