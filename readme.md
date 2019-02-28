
###  MediSoft Mini Framework
This is a lightweight framework is built following the framework-less approach to ease mini app development


### About
This is built as part of technical task for MediSoft Technical task and it is by no where ready for production you can use it as a starting point of small apps or for prototyping.

Here is some information about the Technical tasks
[Poker Chance Calculator](poker.md)
[Phrase Analyzer](analyzer.md)

To Start 

php -S 127.0.0.1:8080 -t ./public

Routes 

 - 127.0.0.1:8080/
 - 127.0.0.1:8080/poker
 - 127.0.0.1:8080/analyze


### Features and Documentation

 - Routing :- [league/route](http://route.thephpleague.com)
 - Di :- [league/container](http://container.thephpleague.com)
 - TemplateSystem :- [league/plates](http://platesphp.com/)
 - ErrorHandling :- [league/booboo](http://booboo.thephpleague.com/)
 - FileManagement :- [symfony/filesystem](https://symfony.com/doc/current/components/filesystem/index.html)
 - CollectionManagement :- [Illuminate/Support](https://laravel.com/docs/collections)
 - ProxyManagment:- To Be Documented
 
 

### Requirements
- Composer
- PHP 7+
- Apache2
- ext-mbstring
- ext-json

### Getting Started
-  Get or download the project
-  Install it using Composer


### Folder System
-   App/
	- Controller/
	- Core/
	- Model
	- Providers
	- Views
-   config/
	- app.php
-   public/
	- index.php