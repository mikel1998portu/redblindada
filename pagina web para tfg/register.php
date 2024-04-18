<?php
// Incluir el archivo de conexión a la base de datos
include 'Conexion.php';

// Obtener datos del formulario
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hashear la contraseña antes de almacenarla en la base de datos
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Consulta SQL para insertar un nuevo usuario
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // Registro exitoso
    echo json_encode(array("message" => "Registro exitoso"));
} else {
    // Error en el registro
    echo json_encode(array("message" => "Error al registrar usuario: " . $conn->error));
}

// Cerrar conexión a la base de datos
$conn->close();
?>
