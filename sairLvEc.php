<?php
    session_start();
    unset($_SESSION['nomeUsuario']);

    $_SESSION['mensagem'] = "Saiu com sucesso";
    header("Location: login_LvEc.php");
?>