<?php
session_start();
session_unset();
session_destroy();
header("Location: ../Pasta_corpo/index.php"); // Redireciona para a página inicial
exit();

?>
