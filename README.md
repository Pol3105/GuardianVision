# GuardianVision
Tienda virtual de venta de cámaras


Abrimos una terminal en la capeta raiz del proyecto y ejecutamos

1.- npm install

2.- composer istall

3.- le damos a todo enter y al final en la confirmacion le damos a que si por lo que se nos ha creado un documento .json

4.- Añadir esto al archivo composer.json:

    "autoload": {
        "psr-4": {
            "MVC\\": "./",
            "Controllers\\": "./controllers",
            "Model\\": "./models"
        }
    },

5.- Tras hacer esto en una terminal ponemos:

    composer dump-autoload

    composer install

5- Con eso ya deberiamos poder ejecutarlo 

    - En una terminal poner => npm run dev 


    - En otra terminal poner=>
    Pero antes IMP tienes que cambiar de caperta =>

    cd public
    php -S localhost:3000


