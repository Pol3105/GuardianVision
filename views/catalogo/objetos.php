
<?php
    require_once __DIR__ . '/../templates/header.php';

?>


<div class="contenedor">

    <form method="POST" action="/catalogo" style="margin-bottom: 20px;">
        <input type="text" name="buscar" placeholder="Buscar productos..." value="<?= htmlspecialchars($buscar ?? '') ?>">
        <button type="submit">Buscar</button>
    </form>

    <?php if(empty($productos)): ?>
        <p>No se encontraron productos.</p>
    <?php else: ?>
        <?php foreach ($productos as $producto): ?>
        <div class="divisor">
            <div class="texto">
                <h2><?php echo $producto->nombre ?></h2>
                <p><?php echo $producto->descripcion ?></p>
                <p><strong><?php echo $producto->precio ?></strong> $$</p>
                <div>
                    <a class="boton-compra" href="./">Shop now</a>
                </div>
            </div>
            <div class="contenedor-imagen imagen"></div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>