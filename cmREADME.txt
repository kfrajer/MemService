
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





* php artisan make:migration create_sqlconfigs_table
* php artisan make:model SqlConfig
* php artisan make:controller loginController --resource
* php artisan make:controller menuStorageController --resource
* php artisan make:controller SqlConfigsController --resource


