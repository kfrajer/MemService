
# Laravel command history - Project flow

-----
## Init: Laravel setup
-----
* Install PHP, for instance via LAMP: c:\wamp64\bin\php\php7.4.6
* Install composer. Location: c:\Users\C\mySandBox\AppsBinFolder\php-composer\composer
* Add php location to system path
* doskey ls=dir $*
* doskey gits=git status
* doskey gitbr=git branch -a $1
* doskey gitch=git checkout $1
* set localcomposer=C:\Users\C\mySandBox\AppsBinFolder\php-composer\composer
-----
## Laravel project creation
-----
* Root folder: C:\wamp64\www\mpb\project\mpb-demo
* set APPNAME=MemService
* echo APPNAME: %APPNAME% & echo COMPOSER@: %localcomposer%
* php %localcomposer% global require "laravel/installer"
* Create project by either:
   - laravel new %APPNAME%
   - php %localcomposer% create-project laravel/laravel %APPNAME%
   - cd %APPNAME%
* php %localcomposer% install
-----
## Front End Install
-----
* php %localcomposer% require laravel/ui --dev
* php artisan ui bootstrap
* npm install && npm run dev
-----
## Init git
-----
* Verify gitignore exists and it is excluding vendor and .env vars
* Create this README as cmREADME.txt (These instructions)
* git config --global user.name "kfrajer"
* git config --global user.email krisfrajer@gmail.com
* git config --global core.autocrlf true
* git config --global merge.tool meld
* git config --global mergetool.meld.cmd "meld $LOCAL $MERGED $REMOTE -output $MERGED"
* git init
-----
## Adding content following versioning
-----
* See detail #1: Laravel content definition
* See detail #2: Laravel project layout and git branching
* git add + commit to master: Init Laravel proj w/FE
* git checkout -b feature/step1
* php artisan serve --port=8008
* php artisan make:controller PagesController
* php artisan make:controller SessionController
* php artisan route:list


* php artisan make:migration create_memobjects_table
* php artisan make:model MemObject
* php artisan make:controller loginController --resource
* php artisan make:controller menuStorageController --resource



## Detail #1: Laravel content definition
 * This project is meant to collect data of different formats
 * The REST API is not defined at the moment. Instead, this project will manage multiple
   migration + their respective models and using a seeder to populate the model's data
 * Possible models: MySQL, Postgres, S3, local storage, Redis, Firebase
 * Proposal: Multiple models, same viewers. Hences, model would contain the same data
 * Data stored per entity: id, created_at, updated_at, name, type, uri, ttl, permission, isDeleted, tags
 * Migration definition: memobjects
 * Model definition: MemObject

## detail #2: Laravel project layout and git branching
* Content of this new project is set into 4 branches:
  - feature/step1:
  - feature/step2:
  - feature/step3:
  - feature/step4:
* It follows the structure explained in the following repo and the four Medium articles:
  - https://github.com/SagarMaheshwary/laravel-basics
  - [Laravel 5.8 From Scratch: Intro, Setup , MVC Basics, and Views (Part 1)](https://medium.com/@sagarmaheshwary31/laravel-5-8-from-scratch-intro-setup-mvc-basics-and-views-74d46f93fe0c)
  - [Laravel 5.8 From Scratch: Config, ENV, Migrations, and Todos CRUD (Part 2)](https://medium.com/@sagarmaheshwary31/laravel-5-8-from-scratch-config-env-migrations-and-todos-crud-7c771bcac802)
  - [Laravel 5.8 From Scratch: Authentication, Middleware, Email Verify and Password Reset (Part 3)](https://medium.com/@sagarmaheshwary31/laravel-5-8-from-scratch-authentication-middleware-email-verify-and-password-reset-93a4b2103794)
  - [Laravel 5.8 From Scratch: Eloquent Relationships and Image Upload (Part 4)](https://medium.com/@sagarmaheshwary31/laravel-5-8-from-scratch-eloquent-relationships-and-image-upload-49daece52a24)


