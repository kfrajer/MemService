@echo off
echo =====Setting up main commands alias=====
doskey ls=dir $*
doskey gits=git status
doskey gitbr=git branch -a $1
doskey gitch=git checkout $1
doskey ccrun=php artisan serve --port=8008
doskey ccroutes=php artisan route:list
set localcomposer=C:\Users\C\mySandBox\AppsBinFolder\php-composer\composer

echo =====Setting up external env vars=====
set APPNAME=MemService

@echo =====REPORTING=====
echo APPNAME: %APPNAME% & echo COMPOSER @ %localcomposer%