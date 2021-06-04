1. se instalo autenticacion de usuario con vue 
```
composer require laravel/ui
php artisan ui vue --auth 
```

2. CREAR TABLAS DE LA BASE DE DATOS
    creamos la tabla cities con modelo controlador y factory
    cramos la table clients con modelo y controlador
3. creamos los crud de cities y clients con vue

4. instalacion del jwt con api



5. exportar e importar  excel
    REVISAR LOS REQUERIMIENTO DE LA PAGINA 
        https://docs.laravel-excel.com/3.1/getting-started/installation.html
    installacion
        composer require phpoffice/phpspreadsheet  (si no funciona usar el de abajo)
        composer require maatwebsite/excel (si no funciona usar el de abajo)
        composer require phpoffice/phpspreadsheet --ignore-platform-reqs
        composer require maatwebsite/excel --ignore-platform-reqs


6. se envia un MAIL al correo del usuario que se registro, se envia por medio de jobs asi que se debe ejecutar
    php artisan queue:work
