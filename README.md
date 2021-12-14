Instalacion de la aplicacion:

1) Primero realizar instalacion de las librerias de composer con composer install

2) inicializar la key de la aplicacion de laravel con php artisan key:generate

3) Paso seguido ya que la api esta realizada con JWT token hay que realizar la inicializacion del token de jwt utilizando php artisan jwt:secret

4) Realizar migraciones con seeding de datos a la base de datos del proyecto

5) usar la url de login api/v1/auth/login con usuario y contraseña para obtener el token bearer para las consultas en el recurso cuadros

6) Listo para consumir el recurso cuadros, la url es api/v1/cuadros

Nota

Los endpoints disponibles para cuadros son:

    GET api/v1/cuadros
    POST api/v1/cuadros
    GET api/v1/cuadros/{id}
    PUT api/v1/cuadros/{id}
    DELETE api/v1/cuadros/{id}

Para mas info de las rutas de la api consultarlas con php artisan route:list