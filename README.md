<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



Por tanto, una vez hayamos clonado el repositorio de nuestro proyecto Laravel en local, debemos hacer los siguientes ajustes para que éste pueda correr en nuestro equipo.

Instalar dependencias
Crear una base de datos
Crear el archivo .env
Generar una clave
Migrar y sembrar la base de datos
Instalar dependencias
Instalaremos con Composer, el manejador de dependencias para PHP, las dependencias definidos en el archivo composer.json. Para ello abriremos una terminal en la carpeta del proyecto y ejecutaremos:

composer install
Vemos cómo se ha creado la carpeta vendor.

También debemos instalar las dependencias de NPM definidas en el archivo package.json con:

npm install
Y en esta ocasión vemos cómo se crea la carpeta node_modules.

Crear una base de datos que soporte Laravel
Entre las bases de datos que soporta Laravel por defecto, encontramos: MySQL, SQL Lite, PostgreSQL y SQL Server.

Según la base de datos que necesites, el proceso de crearla será diferente, pero ten en cuenta que si utilizaras una base de datos PostgreSQL, tendrás que configurar algún dato más en el .env relativo a esto, por ejemplo el puerto y el tipo de conexión.

Crear el archivo .env
Este archivo es necesario para, entre otras cosas, configurar la conexión de la bbdd, el entorno del proyecto, motores para envio y recepción de correos etc …

Como por cuestiones de seguridad tampoco se subió, necesitamos crearlo.

Podemos duplicar el archivo .env.example, renombrarlo a .env e incluir los datos de conexión de la base de datos que indicamos en el paso anterior.

ejemplo archivo .env
..... 
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=laravel_project
DB_USERNAME=root
DB_PASSWORD=secret
....
Generar una clave
La clave de aplicación es una cadena aleatoria almacenada en la clave APP_KEY dentro del archivo .env. Notarás que también falta.

Para crear la nueva clave e insertarla automáticamente en el .env, ejecutaremos:

php artisan key:generate
Ejecutar migraciones
Por último, ejecutamos las migraciones para que se generen las tablas con:

php artisan migrate 
Si tuvieramos que incluir o crear nuevas migraciones utilizaríamos:

php artisan migrate:refresh 
php artisan migrate:fresh  //borra y crea todas las tablas de nuevo
Con esto ya tendría que correr sin problemas la aplicación de Laravel que hemos clonado.
