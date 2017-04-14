# PHP-MVC
PHP-MVC, basit ve küçük çapta olan projeler için bir php web çatısıdır. SEO uyumlu linkleri destekler.

#### Sürüm : 0.0.3
## Özellikler
- MVC tasarım deseni yapısında.
- Basit ve kullanımı kolay.
- Kolay ve hızlıca rotalandırma.
- Veritabanı işlemleri için, [Medoo](http://medoo.in/).
- Tasarım moturu için, [Edge](https://github.com/ventoviro/windwalker-edge)

## Kurulum
#### Composer 
```
composer create-project eylmz/wd-mvc wd-mvc
```
## Dizin Yapısı
``` 
PHP-MVC
|   .htaccess
|   index.php
|
+---App
|   |   .htaccess
|   |   Router.php
|   |   
|   +---Config
|   |       Config.php
|   |       Database.php
|   |       PrettyUrls.php
|   |       
|   +---Controllers
|   |   |   HomeController.php
|   |   |   
|   |   \---Admin
|   |           AdminHomeController.php
|   |           
|   +---Models
|   |       TestModel.php
|   |       YeniModel.php
|   |       
|   \---Views
|       |   index.php
|       |   test.edge.php
|       |   
|       \---AdminViews
|               index.php
|               
+---Public
|       index.html
|       
+---System
|   |   .htaccess
|   |   
|   +---Core
|   |       App.php
|   |       Autoload.php
|   |       Controller.php
|   |       Model.php
|   |       Route.php
|   |       Router.php
|   |       
|   +---Helpers
|   |       Session.php
|   |       Template.php
|   |       
|   \---Plugins
            Setting.php
```
