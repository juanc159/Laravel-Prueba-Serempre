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
_INSTALACION FINALIZADA_

## API con Autenticacion JWT
_Segun los requsitos del Proyecto para la elaboracion de la API_
```
METODO    URL               DESCRIPCION
POST      /api/login        Iniciar sesion 
GET       /api/user/{info}  Obtener Usuario segun ID
PUT       /api/user/{info}  Actualizar un Usuario
```
_EXTRAS_
```
METODO    URL               DESCRIPCION
POST      /api/register     Registro de Usuario
GET       /api/clients      Consulta todos los Cientes   
GET       /api/cities       Consulta todos las Ciudades
POST       /logout          Finalizar Sesion
```

# Informacion EXTRA del Proyecto

Este proyecto fue elaborado con los siguientes elementos
* autenticacion de usuario con ui vue --auth
* Bootstrap para el dise;o
* Existen dos componentes VUE para los CRUD (clients, cities) y se uso Datatable para listar, buscar, y paginar
* Se puede EXPOTAR los registros de clientes, pero para poder IMPORTAR registros mediante un EXCEL debe instalar las extenciones necesarias (REVISAR EL APARTADO DE INSTALACION)
* Existe una API que usa Autenticacion JWT con LARAVEL-SANCTUM
* Todo usuario puede cambiar su FOTO de perfil
* Cuando se registra un Usuario le llega a su correo un email. Siemore y cuando se configure el archivo .env (REVISAR EL APARTADO DE INSTALACION)



## Elaborado por:
_JUAN CARLOS MORENO GUERRA,_
_INGENIERO EN INFORMATICA_
