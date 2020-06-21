
# Laravel MemService: multi-model storage support and with docs powered by Hugo Zdoc template
# Laravel command history - Project flow

-----
## Init: Laravel setup
-----
* Install PHP, for instance via LAMP: c:\wamp64\bin\php\php7.4.6
* Install composer. Location: c:\Users\C\mySandBox\AppsBinFolder\php-composer\composer
* Add php location to system path
* Run `bashrc.bat`
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
## Artisan helper CLI commands
-----
* php artisan route:list
* php artisan route:list --name|path|method=
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
## Adding content following versioning branch: feature/step1 => Init project, added non-DB views+controllers
-----
* See detail #1: Laravel App Definition
* See detail #2: Laravel project layout and git branching
* git add + commit to master: Init Laravel proj w/FE
* git checkout -b feature/step1
* php artisan serve --port=8008
* php artisan make:controller PagesController
* php artisan make:controller SessionController
-----
## Adding content following versioning branch: feature/step2 => Migration, CRUD ops
-----
* git checkout -b feature/step2
* Create a user with certain privileges on database for all tables
* REFERENCE: https://www.digitalocean.com/community/tutorials/how-to-create-a-new-user-and-grant-permissions-in-mysql
* Start a MySQL shell. In lamp, navigate to mysql's bin folder: `mysql -uroot -p`
* mysql> CREATE USER 'memclient'@'localhost' IDENTIFIED BY 'mempassword1';
* mysql> GRANT ALL PRIVILEGES ON memdataspace . * TO 'memclient'@'localhost';
* mysql> FLUSH PRIVILEGES;
* mysql> create database memdataspace;
* mysql> exist
* Now update the .env file with database name, user and password
* Reset artisan's config cache: `php artisan config:clear`
* php artisan make:migration create_memobjects_table
* php artisan make:model MemObject
* php artisan migrate
* php artisan make:controller menuStorageController --resource
* See detail #5: Laravel naming conventions for migration and model
* Helper functions, reference links:
  - https://laracasts.com/discuss/channels/laravel/useful-blade-directives
  - https://stackoverflow.com/questions/47326487/pass-variable-from-custom-laravel-helpers-to-blade-file
-----
## Adding content following versioning branch: feature/step3 => Authentication with email verification, pwd reset
-----
* git checkout -b feature/step3
* See detail 6 for auth scaffolding for a laravel project
* php artisan ui bootstrap --auth
* php artisan migrate
* These adds new routes, a controller and all auth views
* Definition of middlewares. It can be applied at the controller level or during route definition
  - @ Controller: `$this->middleware()` inside a constructor
  - @ route: Chain `middleware()` method to route definition
  - In case of multiple middlewares and multiple method exceptions:
    `$this->middleware(['...', '...']])->except(['...', '...']);`
* Access to resources now restricted to either (verified) authorized vs. guest users
* MailTrap app setup to test "send verification email" and password reset" flows
* To configure mail settings, define mail provider settings in `.env`, adjust `mail.php` config file



## =======================================================================================

## Detail #1: Laravel App Definition
 * This project collects data of different formats
 * This project will manage multiple artisan migration + their respective models. 
   It uses a seeder to populate the model's data. Possible models: 
   MySQL, Postgres, S3, local storage, Redis, Firebase
 * Proposal: Multiple models, same viewers. Hences, model would contain the same initial data
 * Data stored per entity: id, created_at, updated_at, name, type, uri, ttl, ACL, softDeletes, useOnlyOnce, tags
 * Migration definition: memobjects
 * Model definition: MemObject
 * See detail 4 for feature history and branch assignation

## Detail #2: Laravel project layout and git branching
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

## Detail #3: Instructions to deploy to Laravel app to Google App Engine
* REFERENCE: `https://cloud.google.com/community/tutorials/run-laravel-on-appengine-standard`
* Requires GAE, CloudSql (MySQL), Sql_proxy_client  
* Explains steps to deploy, setup session, logging and error reporting

## Detail #4: Feature history and branch assignation
### feature/step1:
 * Added index, signin, about views + controllers
 * Tested locally
### feature/step2:
 * Added ToC for persistency selection
 *
 * Helpers:
   - {{ url('/') }}: Build an url for anchor links, for instance
   - {{ config('app.name', 'TBD') }}: Access config values
   - {{asset('css/app.css')}}: To access static resources located in folder `public`
   - {{route('pages.tocPage')}}: Generate urls of named routes. See route file `web.php`
   - {{route('pages.menu',$id)}}: Generate urls of named routes passing data
   
## Detail #5: Laravel naming conventions for migration and model
* In laravel, the name of the migration should be plural and
  the name of the model has to be singular so it can automatically 
  find the table(aka migration) name.
* Name of the model can be changed (and break from the above pattern) 
  by using the properties of the model table. If you go to your model,
  you can add `protected $table = "tablename";`
* For models which contain multiple words like `Post_Like`, the naming 
  convention is to use CamelCase not snake_case so the proper naming 
  would have been PostLike so the migration generated will be what 
  laravel was expecting post_like. When you create snake_case models, 
  you have to create migration with double underscore between words 
  like post__likes and in case you want to override the naming 
  convention you simply needs to make use of the properties on the 
  model $table
* It is recommended that you create models and migrations at the same 
  time by running php artisan make:model -m ForumPost. This will 
  auto-generate the migration file (in this case, for a DB table name 
  of 'forum_posts').
* More on Laravel's naming convention: 
  https://webdevetc.com/blog/laravel-naming-conventions

## Detail #6: Auth scaffolding for a Laravel project
* Laravel projects do not come with the auth scaffolding pre-installed. Versions 
  previous to 6.0, auth scaffolding is installed via `php artisan make:auth`.
* For Laravel >6.0, you need to installed your FE (vue, react or bootstrap) and then 
  install the auth scaffolding running `php artisan ui bootstrap --auth`. This 
  creates all the views in resources/views directory and add routes in our wep.app 
  routes file
* REFERENCE:
  https://medium.com/@panjeh/laravel-auth-routes-email-verification-reset-password-authentication-registration-routes-fb82b3337150
* The auth scaffolding add changes to web.php routes files, adds the HomeController and views for: 
  - Login, register, getting verification email
  - Password: email, confirm, reset
  - Home and app layout
  - This is explained in detailed here: 
    https://medium.com/@panjeh/laravel-changes-in-php-artisan-ui-auth-php-artisan-make-auth-82fdb8893726







  =============================
  To do
  * Implement soft softDeletes
  * Display content type as select field
  * Add migration seeding
  * Evaluate adding the following fields: content, dataBlob, user-agent
  * Move content type mem object to its own DB. See discussion: https://stackoverflow.com/questions/25705878/where-to-put-how-to-handle-enums-in-laravel
  * Remove pages.Login (redundant as laravel provides a user login view)
  * Fix layout vs. layouts
  * dashboard to toc
  * homecontroller set to home, rename pages.index to home, disable index entry as 404