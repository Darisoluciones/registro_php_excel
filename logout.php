<?php
session_start();
session_destroy();

// Redireccionar a la página de inicio de sesión (index.html en este caso)
header("Location: index.html");
exit;
?>
