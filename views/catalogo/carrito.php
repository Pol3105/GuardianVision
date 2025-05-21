
<?php

use Model\Producto;

    require_once __DIR__ . '/../templates/header.php';

?>


<div class="contenedor">

    <?php
        foreach ($carrito as $producto):
            $producto2 = Producto::where('cod_producto',$producto->idProducto);

            $pago_total += ($producto2->precio * $producto->Cantidad);
    ?>

    <div class="divisor">
        <div class="texto">
            <h2>
                <?php echo $producto2->nombre ?>
            </h2>
            <p>
                <?php echo $producto2->precio ?> $$
            </p>

            <p>
              Cantidad en el carrito: <strong><?php echo $producto->Cantidad ?></strong>
            </p>
        </div>
        <div class="contenedor-imagen imagen_<?php echo $producto2->imagen?>">      
        </div>
    </div>

    <?php
        endforeach;
    ?>

    <div class="divisor">
        <div class="texto">
            <h2>
                <?php echo $pago_total ?>
            </h2>
            <div>
                <a class="boton-compra" href="./">Pagar</a>
            </div>
        </div>
    </div>


</div>