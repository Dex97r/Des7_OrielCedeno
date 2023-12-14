<?php

// Funciones para validar los datos
function verificar_email($email) {
  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\.-_])*@([a-zA-Z0-9_-])+([a-zA-Z0- 9\.-_]+)+$/",$email)) {
    return true;
  }
  return false;
}


function verificar_password_strenght($password) {
  if (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password)) echo "Su password es seguro."; else echo "Su password no es seguro.";
}

function verificar_ip($ip) {
  return preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" . "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $ip );
}

// Validación de los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validar que todos los campos estén llenos
  if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["password2"]) || empty($_POST["ip"])) {
    echo "<div class='error'>Por favor, complete todos los campos.</div>";
  }

  // Validar la dirección de email
  if (!verificar_email($_POST["email"])) {
    echo "<div class='error'>La dirección de email no es válida.</div>";
  }

  // Validar la contraseña
  if (!verificar_password_strenght($_POST["password"])) {
    echo "<div class='error'>La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.</div>";
  }

  // Validar que las contraseñas coincidan
  if ($_POST["password"] != $_POST["password2"]) {
    echo "<div class='error'>Las contraseñas no coinciden.</div>";
  }

  // Si todos los datos son válidos, registrar el usuario
  if (verificar_email($_POST["email"]) && verificar_password_strenght($_POST["password"]) && $_POST["password"] == $_POST["password2"]) {
    echo "<div class='alerta'>Usuario registrado exitosamente.</div>";
  }
}
?>
