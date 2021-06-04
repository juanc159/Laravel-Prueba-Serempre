## INSTALACION
instalamos las dependencias:
```
composer install
```
Si le muestra error es por que no ha activado las extenciones necesarias.
* Puede consultar [Extenciones PHP](https://docs.laravel-excel.com/3.1/getting-started/installation.html)

si desea activar esas extensiones en otra ocacion puede ejecutar el siguiente comando
```
composer install --ignore-platform-reqs
```
* Tenga en cuenta que al no activar las extenciones requeridas, NO PODRA IMPORTAR ARCHIVOS DE EXCEL

# Configuracion Archivo .env
*  Existe un archivo .env.example que esta en la carpeta raiz, debe cambiarle el nombre a .env 
* ejecute el siguiente comando para generar la Encryption Key
```
php artisan key:generate
```
* Cree una base de Datos en su MySQL y agrege el nombre de la base de datos, asi como su usuario y password
```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
* Se uso el host de gmail para el envio de MAILS, solo falta agregar las credenciales MAIL, para que se ejecuten los correos
```
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS=null
```

# Ultimos Comandos a Ejecutar
* Creamos las tablas
```
php artisan migrate
```
* Creamos los datos por predefinidos 
```
php artisan custom:td
```
* Inicializamos el servidor
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
