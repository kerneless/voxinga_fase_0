# Voxinga! Fase 0

El objetivo de este mini proyecto es aplicar todos los conocimientos adquiridos en el <a href="https://platzi.com/cursos/symfony/">Curso de Fundamentos de Symfony</a> de Platzi. La idea es realizar una especie de híbrido entre las difuntas Taringa! y Voxed, en las que cualquier persona pueda publicar un post con las características de lo que se consideraba Inteligencia Colectiva. 

Es importante mencionar que este proyecto no ha sido pensado para utilizarse en entornos productivos y <b>adolece de una infinidad de problemas en el front-end</b>. 

## ¿Por qué fase 0?
Este proyecto de aprendizaje aún no incluye muchas funcionalidades básicas, y he decidido no incorporarlas en este repositorio para mantener un orden en mis entregas en Platzi. La fase 0 establece la base sobre la cual iré agregando características a medida que avance en mis clases en dicha plataforma.

## Desarrollo

### Instalación

Se comenzará a partir de un proyecto simple de Symfony 7.

```
symfony new voxinga
```

#### Dependencias
```
composer require --dev symfony/maker-bundle
composer require symfony/webpack-encore-bundle
composer require symfony/twig-pack
composer require symfony/orm-pack
composer require symfony/form
composer require symfony/validator
composer require symfony/http-foundation

```

### Rutas

El proyecto tendrá cuatro rutas

   1. "/": Dónde se verán todos los "voxs"
    
   2. "/form": Dónde se crea el post. Se permite una imágen y texto plano.
    
   3. "/post/id": Dónde se vera el post detallado.
    
   4. "/login": Dónde se guarda en el localStorage el usuario

   5. "/logout ": Dónde se limpia el localStorage

Para ello se creará un PageController donde definiré cada una de esas rutas.


## Vistas

Para generar las vistas voy a usar twig.

## Base de datos 

Preparé .env para setear las variables de entorno para la conexión.

Para crear la DB hay que correr:

```
php bin/console doctrine:database:create
```

## Tablas y columnas

### Posts

1. VARCHAR 255 username 
1. VARCHAR 255 title
1. TEXT img_url
1. TEXT body




