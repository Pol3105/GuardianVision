
<?php
    require_once __DIR__ . '/../templates/header.php';

?>


<div class="contenedor">

    <?php
        foreach ($productos as $producto):
    ?>

    <div class="divisor">
        <div class="texto">
            <h2>
                <?php echo $producto->nombre ?>
            </h2>
            <p>
                Descripción de la tienda, Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.     
            </p>

            <p>
              <strong><?php echo $producto->precio ?></strong> $$
            </p>
            <div>
                <a class="boton-compra" href="./">Shop now</a>
            </div>
        </div>
        <div class="contenedor-imagen imagen"></div>
    </div>

    <?php

        endforeach;
    
    ?>


</div>