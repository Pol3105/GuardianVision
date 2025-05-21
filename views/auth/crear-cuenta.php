
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
                        <label for="Nombre">Nombre</label>
                        <input 
                            type="Nombre"
                            id="Nombre"
                            placeholder="Tu Nombre..."
                            name="Nombre"
                            value="<?php echo isset($user->Nombre) ?>"
                    />
            </div>

            <div class="campo">
                        <label for="Direccion">Direccion</label>
                        <input 
                            type="Direccion"
                            id="Direccion"
                            placeholder="Tu Direccion..."
                            name="Direccion"
                            value="<?php echo isset($user->Direccion) ?>"
                    />
            </div>

            <div class="campo">
                        <label for="Telefono">Telefono</label>
                        <input 
                            type="Telefono"
                            id="Telefono"
                            placeholder="Tu Telefono..."
                            name="Telefono"
                            value="<?php echo isset($user->Telefono) ?>"
                    />
            </div>

            <div class="campo">
                <label for="Email">Email</label>
                <input 
                    type="Email"
                    id="Email"
                    placeholder="Email..."
                    name="Email"
                    value="<?php echo isset($user->Email) ?>"
                />
            </div>


            <div class="campo">
                <label for="contraseña">contraseña</label>
                <input
                    type="password"
                    id="contraseña"
                    placeholder="Tu contraseña..."
                    name="contraseña"
                />
            </div>

            <input type="submit" class="boton-login" value="Crear cuenta">

        </form>

        <div class="formulario-final">
                <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
        </div>
    </div>
</div>