<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
    exit; // Asegurarse de que se detiene la ejecución del script después de la redirección
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    // Tu código para verificar las credenciales del usuario
} else {
    $message = 'Please enter valid email and password';
}


require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password, role_id FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if ($results && count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

        // Ahora, vamos a obtener el nombre del rol del usuario
        $role_records = $conn->prepare('SELECT name FROM roles WHERE id = :role_id');
        $role_records->bindParam(':role_id', $results['role_id']);
        $role_records->execute();
        $role_results = $role_records->fetch(PDO::FETCH_ASSOC);

        // Almacenamos el ID del usuario y el correo electrónico en la sesión
        $_SESSION['user_id'] = $results['id'];
        $_SESSION['user_email'] = $results['email'];

        if ($results['role_id']) {
            // Si el usuario tiene un rol asignado, almacenamos el nombre del rol del usuario en la sesión
            $_SESSION['user_role'] = $role_results['name'];
            
            // Redirigir a la página correspondiente según el rol del usuario
            if ($_SESSION['user_role'] == 'admin') {
                header("Location: admin_panel.php");
            } elseif ($_SESSION['user_role'] == 'editor' || $_SESSION['user_role'] == 'viewer') {
                header("Location: wiki.php");
            } else {
                header("Location: viewer_panel.php");
            }
        } else {
            // Si el usuario no tiene un rol asignado, redirigirlo a una página de autorización
            header("Location: viewer_panel.php");
        }
    } else {
        $message = 'Sorry, those credentials do not match';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">Sign up</a></span>

    <form action="login.php" method="POST">
    <input name="email" type="text" placeholder="Enter your email">
    <input name="password" type="password" placeholder="Enter your Password">
    <input type="submit" value="Submit">
    </form>
</body>
</html>
