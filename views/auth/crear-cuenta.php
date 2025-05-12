
<?php
    include_once __DIR__ . '/../templates/header.php';

?>


<div class="contenedor-app">
    <div class="imagen"></div>

    <div class="app">

        <?php
            include_once __DIR__ . "/../templates/alertas.php";

        ?>

        <h1 class="nombre-pagina">Crear cuenta</h1>
        <p class="descripcion-formulario">Crea una cuenta con tus datos</p>

        <form class="formulario" method="POST" action="/crear-cuenta" >

            <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input 
                            type="nombre"
                            id="nombre"
                            placeholder="Tu nombre..."
                            name="nombre"
                            value="<?php echo s($user->nombre) ?>"
                    />
            </div>

            <div class="campo">
                    <label for="apellido">Apellido</label>
                    <input 
                        type="apellido"
                        id="apellido"
                        placeholder="Tu apellido..."
                        name="apellido"
                        value="<?php echo s($user->apellido) ?>"
                    />
            </div>

            <div class="campo">
                <label for="email">Email</label>
                <input 
                    type="email"
                    id="email"
                    placeholder="email..."
                    name="email"
                    value="<?php echo s($user->email) ?>"
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

            <input type="submit" class="boton-login" value="Crear cuenta">

        </form>

        <div class="formulario-final">
                <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
                <a href="/olvidar">Olvidastes tu contraseña?</a>
        </div>
    </div>
</div>