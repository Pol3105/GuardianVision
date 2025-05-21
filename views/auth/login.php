
<?php
    include_once __DIR__ . '/../templates/header.php';
?>


<div class="contenedor-app">
    <div class="imagen_login"></div>

    <div class="app">

        <?php
            include_once __DIR__ . "/../templates/alertas.php";
        ?>

        <h1 class="nombre-pagina">Iniciar Sesión</h1>
        <p class="descripcion-formulario">Inicia sesión con tus datos</p>

        <form class="formulario" method="POST" action="/login" >

            <div class="campo">
                <label for="email">Email</label>
                <input 
                    type="email"
                    id="email"
                    placeholder="email..."
                    name="email"
                />
            </div>


            <div class="campo">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    placeholder="Tu password..."
                    name="password"
                />
            </div>

            <input type="submit" class="boton-login" value="Iniciar Sesión">

        </form>

        <div class="formulario-final">
                <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
                <a href="/logout">Cerrar la sesión</a>
        </div>
    </div>
</div>