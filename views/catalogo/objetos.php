
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
                <?php echo $producto->descripcion ?>
            </p>

            <p>
              <strong><?php echo $producto->precio ?></strong> $$
            </p>
            <div>
                <a class="boton-compra" href="./">Shop now</a>
            </div>
        </div>
        <div class="contenedor-imagen imagen"></div>
        <!--  img  class="contenedor-imagen" src="<?php __DIR__ . '/../../' ?>" alt="/../../src/img/index.webp"> --><
    </div>

    <?php

        endforeach;
    
    ?>


</div>