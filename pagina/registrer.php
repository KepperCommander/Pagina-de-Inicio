
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>incio</title>
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

</style>
</head>
<body>
	<?php
$servername = "localhost";
$database = "userdb";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 

$usn=$_REQUEST['username'];
$ema=$_REQUEST['email'];
$pas=$_REQUEST['password'];

$sql = "INSERT INTO users (username, password, email,) VALUES ('$usn', '$pas', '$ema')";

if (mysqli_query($conn, $sql)) {
      
} else {
      }
mysqli_close($conn);
?>
<form method="post" action="" name="signup-form">
    <div class="form-element">
        <label>Nombre de Usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Email</label>
        <input type="email" name="email" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="register" value="register">Registrar</button>
</form>
</body>
</html>