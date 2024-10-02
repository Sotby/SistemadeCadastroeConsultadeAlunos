<?php
    require "db.php";

    $Aname= $_POST['Aname'];
    $Aidade = $_POST['Aidade'];
    $Aemail = $_POST['Aemail'];
    $curso = $_POST['curso'];

    $message = '';

    $sql = "INSERT into alunos(nome, idade, email, curso) values ('$Aname', '$Aidade', '$Aemail', '$curso')"; 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro</title>
</head>
<body>
    <section id="cadastroSection">
        <?php
            if($conn->query($sql) === true){
                echo "<span id='sucess'>Aluno cadastrado!</span>";
                echo "<a href='../index.php'> Voltar à página de registro</a>";
            } else{
                echo "<span id='error'>Falha ao cadastrar usuario<span>";
                echo "<a href='../index.php'> Voltar à página de registro</a>";
            }
        ?>
    </section>
</body>
</html>