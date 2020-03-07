<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="200"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Acerca de training notes con Laravel

Training es una aplicación web que permite crear notas, agrupadas en notebooks, ha sido desarrollada para realizar pruebas con e-training. Para su instalación se requiere docker y docker-compose

## Pasos de instalación

1. Crear un directorio prueba y el archivo docker-compose:
```
mkdir prueba
cd prueba
touch docker-compose.yml
```
2. Dentro del archivo docker-compose.yml incluir las siguientes instrucciones:

```
version: '2'
services:
  mysql:
    image: 'mysql:5.7'
    container_name: endnote-mysql
    environment:
      MYSQL_ROOT_PASSWORD: rooty123
      MYSQL_USER: training
      MYSQL_DATABASE: training
      MYSQL_PASSWORD: tr123
    ports:
      - '3306:3306'
    volumes:
      - './mysql/:/var/lib/mysql'
  myapp:
    tty: true
    container_name: endnote-laravel
    image: 'bitnami/laravel:latest'
    environment:
      DB_HOST: mysql
      DB_USERNAME: training
      DB_DATABASE: training
      DB_PASSWORD: tr123
    depends_on:
      - mysql
    ports:
      - 3000:3000
    volumes:
      - './php/:/app'
    links:
      - mysql
```

3. dentro de la carpeta creada ```prueba``` se debe clonar el repositorio, asi:

```
git clone https://github.com/uamoreno/training.git php/
```

4. Luego, sin moverse del directorio desde donde se lanzó git clone, se debe ejecutar el siguiente comando: 

```
sudo chmod -R 777 php/storage && sudo chmod -R 777 php/bootstrap/cache
```

6. Aun debe seguir en la carpeta ```prueba```, desde ese mismo punto ejecutar la instrucción:
```
docker-compose up
```

7. Luego de un tiempo se desplegarán dos contenedores de docker uno con MySQL y otro con Laravel y en la consola se mostrará el siguiente mensaje:

> endnote-laravel | Laravel development server started: http://0.0.0.0:3000


## Instalación de docker y docker-compose

Para instalar docker y docker-compose basta con ejecutar el gestor de instalación, en el caso de Ubuntu:
```
sudo apt-get install docker
sudo apt-get install docker-compose
```

## Este repositorio clona el archivo .env

Para facilitar la puesta en marcha de la prueba se ha permitido al descarga del archivo .env

## Usuarios de prueba
```
(Uriel Alejandro)
Usuario: 80123
Clave: secret
```
```
(Luiz Perez)
Usuario: 70321
Clave: secret
```

## Apuntes

Se ha empleado el OMR Elloquent, y se han empleado diferentes vistas de blade organizadas por módulo: notebooks, y notes, junto con algunas auxiliares para el login.

Se ha empledo ajax para las opciones de borrar tanto notebooks como notes.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
