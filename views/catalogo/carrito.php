
<?php
    require_once __DIR__ . '/../templates/header.php';

?>


<div class="contenedor">

    <?php
        foreach ($carrito as $producto):
    ?>

    <div class="divisor">
        <div class="texto">
            <h2>
                <?php echo $producto->idProducto ?>
            </h2>
            <p>
                <?php echo $producto->idCliente ?>
            </p>

            <p>
              <strong><?php echo $producto->Cantidad ?></strong> $$
            </p>
            <div>
                <a class="boton-compra" href="./">Pagar</a>
            </div>
        </div>
        <div class="contenedor-imagen imagen"></div>
        <!--  img  class="contenedor-imagen" src="<?php __DIR__ . '/../../' ?>" alt="/../../src/img/index.webp"> --><
    </div>

    <?php

        endforeach;
    
    ?>


</div>