
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<style type="text/css">
		* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

body {
    margin: 50px auto;
    text-align: center;
    width: 800px;
}

h1 {
    font-family: sans-serif;
    font-size: 2rem;
    text-transform: uppercase;
}

label {
    width: 150px;
    display: inline-block;
    text-align: left;
    font-size: 1.5rem;
    font-family: sans-serif;
    text-align: center;
}

input {
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: sans-serif;
    padding: 10px;
    text-align: center;
}

form {
    margin: 100px auto;
    margin-bottom: 10px;
    margin-top: 180px;
    padding: 20px;
    border: 5px solid #ccc;
    width: 500px;
    background: #eee;
}

#xd{
	font-family: sans-serif;
	font-size: 10px;
	text-align: center;
}

div.form-element {
    margin: 20px 0;
}

button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: sans-serif;
    font-weight: 100;
    background: blueviolet;
    color: white;
    border: none;
}

p.success,
p.error {
    color: white;
    font-family: sans-serif;
    background: blueviolet;
    display: inline-block;
    padding: 2px 10px;
}

p.error {
    background: orangered;
}
	</style>
</head>
<body>
	<?php
include('config.php');
session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['PASSWORD'])) {
            $_SESSION['user_id'] = $result['ID'];
            echo '<p class="success">Congratulations, you are logged in!</p>';
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}


?>

	<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Nombre de Usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
		<a href="registration.php"><button type="submit" name="login" value="login">Iniciar Sesion</button></a>
</form>
<div id="xd"><br><a href="registrer.php">¿No tienes cuenta? Registrate</a>.</div>
</body>
</html>
