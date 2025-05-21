
<?php

use Model\Producto;

    require_once __DIR__ . '/../templates/header.php';

?>


<div class="contenedor">

    <?php
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

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

            <form class="formulario" action="carrito" method="post">
                    <input type="hidden" name="idCliente" value="<?php echo isset($_SESSION['usuario_id']) ?>">
                    <input type="hidden" name="idProducto" value="<?php echo $producto2->cod_producto ?>">

                    <input class="boton-compra" type="submit" value="Eliminar">
                </form>
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
                <?php echo $pago_total ?> $$
            </h2>
            <div>
                <a class="boton-compra" href="./">Pagar</a>
            </div>
        </div>
    </div>


</div>