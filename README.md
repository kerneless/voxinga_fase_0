# Voxinga! Fase 0

El propósito de este proyecto breve es poner en práctica todos los conocimientos obtenidos en el Curso de Fundamentos de Symfony de Platzi. Se busca crear una plataforma que fusiona elementos de las ya desaparecidas Taringa! y Voxed, permitiendo a cualquier usuario publicar contenido con las características de lo que se conoce como Inteligencia Colectiva.

Es relevante señalar que este proyecto no ha sido diseñado para su implementación en entornos productivos y presenta numerosos desafíos en el diseño de su interfaz de usuario.

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




