## Autores: Lucas Esteban Muñoz Montes - Alejandro Herrera Patiño  

Curso: Seguridad Web - Universidad Nacional de Colombia sede Medellin
Proyecto desarrollado en Laravel 5.3

## Para comenzar

Para comenzar debemos instalar xampp [xampp website](https://www.apachefriends.org/es/index.html).
En el momento se desarrollo con la versión de xampp:
Windows Version:  Pro  64-bit
XAMPP Version: 7.1.10
Control Panel Version: 3.2.2  [ Compiled: Nov 12th 2015 ]

Luego de haber instalado xampp procedemos con la instalación de composer [composer website](https://getcomposer.org/download/)

Abrimmos en windows XAMPP Control Panel e iniciamos los servicios de Apache y MySQL, luego movemos el proyecto a la direccion c:/xampp/htdocs, cambiamos el nombre de galeria-master por galeria, despues ingresamos por el navegador de preferencia Google Chrome a localhost/phpmyadmin y creamos una base de datos que se llame galeria, si deseamos cambiar la configuracion básica del servidor podemos entrar en el archivo .env y modificarlo como se desee.

Desde la consola de comandos nos dirigimos a la direccion donde esta el proyecto galeria en xampp/htdocs y escribimos el siguiente comando para comenzar las migraciones: php artisan migrate, esperamos que termine y luego podremos entrar con normalidad al proyecto desde la direccion localhost/galeria/public en el navegador.
Primero creamos un usuario y luego vamos a la base de datos y cambiamos el dato tipo en la tabla users type a admin para dar permisos de administrador y asi poder gozar del panel de administración, si no se hace esto entonces se tiene acceso como usuario normal tipo miembro y se podran crear albumes e ingresar imagenes, en este caso se dan acceso de vista a todos los albumes de otros miembros, si se crean un usuario premium se podra tener acceso a los albumes de miembros y de otros usuarios premium, si es admin tiene acceso a todo.

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
