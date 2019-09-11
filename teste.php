<?php
 header("Content-Type: text/html; charset=utf-8", TRUE); // Codigo para aceitaçao de caracteres acentuados
 include_once("coneccao.php"); // Função que chama a nossa conecção com a base de dados
 
 $conexaoPDO->beginTransaction(); // There is no active transaction

      
 $sql1 = "SELECT * FROM usuario";
        
 try
 {
     $consulta = $conexaoPDO -> prepare($sql1);
     $consulta -> execute();
     $resultado = $consulta -> fetchAll(PDO::FETCH_NUM);
 }
 catch(PDOException $e) 
 {
     echo 'Error: ' . $e->getMessage();
 }

 foreach($resultado as $valores)
 {
     echo 'Nome do Produto: '.$valores[2];
 }
?>