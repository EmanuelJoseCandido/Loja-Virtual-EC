<?php
    session_start();
    unset($_SESSION['nomeUsuario']);

    header("Location: index.php");
?>