<?php
    include_once __DIR__ . '/../templates/header.php';

?>

<h1> Cambia tu password </h1>

<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>


<form class="formulario" method="POST" action="/recuperar" >

    <input 
        type="hidden"
        id="id"
        placeholder="Tu id..."
        name="id"
        value="<?php echo s($usuario->id) ?>"
    />


    <div class="campo">
        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            placeholder="Tu password..."
            name="password"
        />
    </div>

    <input type="submit" class="boton-login" value="Nuevo password">

</form>

