
<?php
    require_once __DIR__ . '/../templates/header.php';

?>


<div class="contenedor">

    <form method="POST" action="/catalogo" style="margin-bottom: 20px;">
        <input type="text" name="buscar" placeholder="Buscar productos..." value="<?= htmlspecialchars($buscar ?? '') ?>">
        <button type="submit">Buscar</button>
    </form>

    <?php
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

    <?php if(empty($productos)): ?>
        <p>No se encontraron productos.</p>
    <?php else: ?>
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
                    <form class="formulario" action="catalogo" method="post">
                        <input type="hidden" name="idCliente" value="<?php echo isset($_SESSION['usuario_id']) ?>">
                        <input type="hidden" name="idProducto" value="<?php echo $producto->cod_producto ?>">
                        <input type="hidden" name="Cantidad" value="1">

                        <input class="boton-compra" type="submit" value="Agregar al carrito">
                    </form>
                </div>
            </div>
            <div class="contenedor-imagen imagen_<?php echo $producto->imagen?>">      
            </div>
        </div>

        <?php

            endforeach;
        
        ?>
    <?php endif; ?>

</div>