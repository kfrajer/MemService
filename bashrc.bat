@echo off
echo =====Setting up main commands alias=====
doskey ls=dir $*
REM -----------------------------------------------------------
doskey gits=git status
doskey gitcbr=git rev-parse --abbrev-ref HEAD
doskey gitbr=git branch -a $1
doskey gitch=git checkout $*
doskey gitcm=git commit -m $1
doskey gitlogs=git log --pretty=oneline --abbrev-commit
doskey gdif=git diff $*
REM -----------------------------------------------------------
doskey ccrun=php artisan serve --port=8008
doskey ccroutes=php artisan route:list
set localcomposer=C:\Users\C\mySandBox\AppsBinFolder\php-composer\composer

echo =====Setting up external env vars=====
set APPNAME=MemService

@echo =====REPORTING=====
echo APPNAME: %APPNAME%
echo COMPOSER @ %localcomposer%