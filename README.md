<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Accounting system Template</h1>
    <br>
</p>

Yii 2 Pet Project System accounting system



https://user-images.githubusercontent.com/45405871/197731111-8d17058f-5199-4eb9-bb6b-1ec5114ed989.mp4


Main Code in folder Frontend


Instruction to try it on own machine
1. you need setup setting for your host server apache or nginx by docs in yii2 
2. https://www.yiiframework.com/doc/guide/1.1/en/quickstart.apache-nginx-config
3. Clone this project by git clone https://github.com/Nexider321/Yii2project.git
4. you need to create db 
CREATE DATABASE `yii2advanced`
    DEFAULT CHARACTER SET = 'utf8mb4';
 in project you need connect to db settings in common/config/main-local.php you can change username or password if you need
4. In project folder you need to type php init and select 1 and yes
5. `Composer install` `php yii migrate/up` type yes
6. Check adress [http://localhost/Yii2project/frontend/web/](http://localhost/Yii2project/frontend/web/)


Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
# Yii2project
