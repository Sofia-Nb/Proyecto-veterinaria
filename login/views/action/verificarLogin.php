<?php
session_start(); // Inicia la sesión si no está iniciada
include_once '../../../configuracion.php';  
include_once '../utils/funciones.php';

// Crear una instancia de la clase Session
$objSesion = new Session();

// Obtiene los datos del login (email y password hash)
$datos = datasubmitted();

$password = $datos['password'];

if (!isset($datos['email']) || !isset($datos['password'])) {
    echo json_encode(['success' => false, 'message' => 'Faltan datos.']);
    exit();
}

$email = isset($datos['email']) ? $datos['email'] : '';
$hashedPassword = isset($datos['password']) ? $datos['password'] : '';

// Verifica que los datos del formulario no estén vacíos
if (empty($email) || empty($hashedPassword)) {
    echo 'Por favor, ingresa tu email y contraseña.';
    exit();
}

// Crear una instancia de ABMUsuario
$usuario = new ABMUsuario();

// Buscar el usuario por email
$param = ['email' => $email, 'password' => $hashedPassword];
$usuarioData = $usuario->buscar($param);

// Verifica si se encontró el usuario
if ($usuarioData && count($usuarioData) > 0) {
    $usuarioData = $usuarioData[0]; // Obtenemos el primer usuario (en teoría, solo debería haber uno)

    // Comparar los hashes de la contraseña
    if ($hashedPassword === $usuarioData->getuspass()) {
        // Si el hash coincide, iniciar sesión y almacenar los datos del usuario
        $rolUs = $usuario->darRoles(['idusuario' => $usuarioData->getidusuario()]);
        $objSesion->setUsuario($usuarioData->getusnombre());
        $objSesion->setIdUsuario($usuarioData->getidusuario());

        echo json_encode(['success' => true, 'message' => 'Login exitoso.']);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'La contraseña es incorrecta. Inténtalo de nuevo.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No existe un usuario con esos datos.']);
}

exit();
?>
