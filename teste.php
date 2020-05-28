<?php


require_once "ValidaCPF.php";
require_once "ValidaCPF.html";

   $nome = $_POST['nome'];
 

    ?>
<html>
<head><title>Valida CPF</title></head>
<body>
<h1>Prezado(a), <?php echo "$nome "; ?> o seu CPF está <?php $cpf = new ValidaCPF($_POST['cpf']);?></h1>
</body>
   </html>
