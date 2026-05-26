<?php
    require (__DIR__."/../config/conexion.php");
    
    // funcion para buscar un usuario por su login
    function validar_usuario($login, $password)
    {
        // Establecer conexión con la BD
        $conexion = conectar();

        echo "<br>función validar_usuario, del modelo, ejecutándose...";

        // Instruccion SQL para hacer la consulta a la BD
        $sql = "SELECT email_administrador, password_administrador, nombre_administrador,  COUNT(*) AS contar FROM Administrador WHERE email_administrador = '$login' AND password_administrador = '$password'";

        // Ejecutar la consulta SQL a la BD
        $consulta = mysqli_query($conexion, $sql) or trigger_error("Error en la consulta MySql: ".mysqli_error($conexion));

        // Convertir consulta en array
        //$resultado = mysqli_fetch_array($consulta);
        $resultado = mysqli_fetch_assoc($consulta);

        // verificar si el usuario existe en la BD
        if($resultado['contar']>0)
        {
            echo '<br>El usuario existe en la BD';
            echo '<br>Nombre: '.$resultado['nombre_administrador'];
            echo '<br>Email: '.$resultado['email_administrador'];
            echo '<br>Password: '.$resultado['password_administrador'];
        }
        else
        {
            echo '<br>El usuario no existe, o login o password incorrecto';
        }

        return $resultado;
    }

    
    // probar consulta a BD

    //$name = 'Johan Fiallo Aparicio';
    $email = 'np@gmail.com';
    $pass = 12345;


    echo 'Probando consulta...';
    /*echo '<br>'.$name;
    echo '<br>'.$email;
    echo '<br>'.$pass;*/
    

    validar_usuario($email, $pass, $name);
?>