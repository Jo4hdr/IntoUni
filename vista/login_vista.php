<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicar Sesión </title>
</head>
<body>
    <h2>Iniciar Sesión </h2>
    <!-- formulario para iniciar sesion-->
    <form action="../modelo/usuario_modelo.php" method="POST">
        <label for="">Login:</label>
        <input type="text" name ="Login" id="" required autofocus/>
        <br><br>
        <label for="">Password:</label>
        <input type="password" name = "password" id="" required />
        <br><br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>