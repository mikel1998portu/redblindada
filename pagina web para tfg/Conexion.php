<?php
// Configuración de la conexión a la base de datos
$servername = " sql206.infinityfree.com";
$username = "if0_36373383";
$password = "Mikelportu1998";
$database = " if0_36373383_XXX";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Procesar el formulario de registro cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. ¡Bienvenido, $username!";
    } else {
        echo "Error al registrar al usuario: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
