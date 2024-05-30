<?php
require 'database.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
        $message = 'All fields are required';
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $message = 'Passwords do not match';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format';
    } else {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Successfully created new user';
        } else {
            $message = 'Sorry there must have been an issue creating your account';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    form{
    background-image:url("imagenes/titulo.png") ;
    /* background-size: cover;  */
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-position: center; 
    /* background-size: 100%; Reduce el tamaño de la imagen al 50% de su tamaño original */
}
</style>
</head>
<body>

<?php require 'partials/header.php' ?>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<h1>REGISTRATE</h1>
<span>O <a href="login.php">ACCEDE</a></span>

<form action="signup.php" method="POST" onsubmit="return validateForm()">
    <input name="email" type="text" placeholder="Enter your email">
    <input name="password" type="password" placeholder="Enter your Password">
    <input name="confirm_password" type="password" placeholder="Confirm Password">
    <input type="submit" value="Submit">
    
</form>
<button type="button" onclick="location.href='index.php'">Volver a FrikiOda</button>
<script>
    function validateForm() {
        var email = document.forms[0]["email"].value;
        var password = document.forms[0]["password"].value;
        var confirmPassword = document.forms[0]["confirm_password"].value;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email == "" || password == "" || confirmPassword == "") {
            alert("All fields are required");
            return false;
        }

        if (!emailRegex.test(email)) {
            alert("Invalid email format");
            return false;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
