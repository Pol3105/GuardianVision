
<?php
    include_once __DIR__ . '/../templates/header.php';
?>


<div class="contenedor-app">
    <div class="imagen"></div>

    <div class="app">

        <?php
            include_once __DIR__ . "/../templates/alertas.php";
        ?>

        <h1 class="nombre-pagina">Olvide Password</h1>
        <p class="descripcion-formulario">Restablece tu password escribiendo tu email</p>

        <form class="formulario" method="POST" action="/olvidar" >

            <div class="campo">
                <label for="email">Email</label>
                <input 
                    type="email"
                    id="email"
                    placeholder="email..."
                    name="email"
                />
            </div>

            <input type="submit" class="boton-login" value="Enviar instrucciones">

        </form>

        <div class="formulario-final">
            <a href="/login">¿Ya tienes una cuenta? Inicia Sesion</a>
            <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
        </div>
    </div>
</div>