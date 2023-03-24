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
> cd article-twig

> composer install
> php bin/console about
> symfony check:requirements

> symfony server:start

  http://localhost:8000/
  
2. 
> composer require doctrine > (n) >

> composer require symfony/orm-pack

> composer require --dev symfony/maker-bundle

> composer require twig
 
> symfony console make:controller ArticleController 


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


5. 
> node -v

> composer require symfony/webpack-encore-bundle

> npm install
> npm run watch
> npm install bootstrap --save--dev
> npm run dev 

> composer require symfony/asset
> npm run dev 


6.
composer require --dev 

