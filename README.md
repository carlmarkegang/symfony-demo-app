# This application runs Symfony 5.4

### docs
https://symfony.com/doc/5.4/index.html

## Install
Clone project from GitHub open Laragoons terminal "cd symfony-demo-app" and run "composer install"  
After its installed you need to setup DB variables in .env file and run  
"php bin/console make:migration" 
Double check the new migration "migrations/Version*******.php" and run "php bin/console doctrine:migrations:migrate"

## Overview
  * src/Controller - Routes, get content that will be displayed and functions
  * src/Entity - Database tables
  * scr/Repository - queries to DB

## cache clear
php bin/console cache:clear

## Doctrine (setup DB automatically)
php bin/console make:migration 
php bin/console doctrine:migrations:migrate

## .htacess fix if route is not working
composer require symfony/apache-pack

## Commands
composer install  
php bin/console make:controller Login  
composer require security  
php bin/console debug:container  - see installed
composer require symfony/orm-pack v2.3.1
php bin/console debug:router - Check avaible routes (pages, ex /edit)

## Laragon (local server for DEV)
  * Download https://laragon.org/ or other
  * download php 7.4 https://windows.php.net/downloads/releases/archives/php-7.4.9-Win32-vc15-x64.zip
extract it to C:\laragon\bin\php\php-7.4.9-Win32-vc15-x64
  * Select PHP 7.4 in by right clicking in laragon
  * Default mysql user and pass should be root:pass 
 
 ## Create a new symfony project
composer create-project symfony/skeleton:"^5.4" testapp123
