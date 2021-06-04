### Instalacion
corremos los siguientes comandos:
```
npm install
npm run dev
```

# Base de datos
1. en el archivo .env se debe agregar el nombre de la base de datos 
```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
2. se uso el host de gmail solo falta agregar las credenciales MAIL, para que se ejecuten los correos
```
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS=null
```

# inicializamos la base de datos
1. creamos las tablas
```
php artisan migrate
```

2. creamos los datos por defecto con el COMANDO creado 
```
php artisan custom:td
```

3. inicializamos el servidor
```
php artisan serve
```



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
