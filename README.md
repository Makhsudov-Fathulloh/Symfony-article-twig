# Symfony-article-twig

Installing & Setting up the Symfony Framework

Quickstart
Open a PowerShell terminal
> Set-ExecutionPolicy RemoteSigned -Scope CurrentUser 
( # Optional: Needed to run a remote script the first time )
> irm get.scoop.sh | iex

> symfony check:requirements
> composer create-project symfony/skeleton article-twig

> symfony check:requirements
> composer install
> php bin/console about

> symfony server:start

  http://localhost:8000/
  
  
> composer require doctrine > (n) >

> composer require annotations

> composer require symfony/orm-pack

> composer require --dev symfony/maker-bundle

> symfony console make:controller ArticleController 

> composer require twig


> symfony console doctrine:database:create

> symfony console make:entity
    (Article > symfony console make:migration > symfony console doctrine:magration:migrate, 
     User > symfony console make:migration > symfony console doctrine:magration:migrate)
     
> symfony console make:entity (Article > user > relation > User > ManyToOne > no > yes > [Enter] > no > Success)

> symfony console make:migration

> symfony console doctrine:magration:migrate
