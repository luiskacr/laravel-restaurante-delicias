<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Instalacion

1. Valide la versión de php en el entorno de trabajo con el siguiente comando en la terminal o cmd.
   > php -v
2. Valide la versión de composer en el entorno de trabajo con el siguiente comando en la terminal o cmd.
   > composer -v

3. Valide que el equipo tenga el servicio de MYSQL.

4. Abra su editor de código, en el que se abrirá el proyecto.

5. Abrimos una terminal en el editor, donde utilizaremos los siguientes comandos:

   **Clonar repositorio**
   > git clone .


6. Luego en el gestor de  base de datos (Mysql Workbench), ingresamos los siguientes comandos:

   **Crear la base de datos**
   > create database restaurante;

   **Situarse en la base de datos**
   > use restaurante;

7. En seguida, regresamos a nuestro editor de código y en la terminal de comandos, ingresamos el siguiente comando:
   > composer install


8. Abrimos el archivo del proyecto con extensión .env, donde configuraremos nuestra conexión con la base de datos con la siguiente información:

>• APP_NAME=Restaurante

>• APP_DEBUG=true

>• DB_CONNECTION=mysql

>• DB_HOST=127.0.0.1

>• DB_PORT=3306

>• DB_DATABASE=restaurante

>• DB_USERNAME=” Usuario de la Base de datos anteriormente configurado”

>• DB_PASSWORD=” Contraseña de la base de datos anteriormente Configurado”


9. En la terminal nuevamente, corremos el comando:
   >php artisan key:generate


10. En la terminal nuevamente, corremos el comando:
    >php artisan migrate --seed


11. En la terminal nuevamente, corremos el comando:
    >php artisan serve

12. Se finalizó la instalación y se puede ingresar al link que indica la consola.

