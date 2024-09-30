<?php
    require "db.php";

    $Aname= $_POST['Aname'];
    $Aidade = $_POST['Aidade'];
    $Aemail = $_POST['Aemail'];
    $curso = $_POST['curso'];

    $sql = "INSERT into alunos(nome, idade, email, curso) values ('$Aname', '$Aidade', '$Aemail', '$curso')";

    
    if($conn->query($sql) === true){
        echo "Aluno cadastrado!";
        header('../index.php',true) ;
    } else{
        echo "ERROR: " . $sql . "<br>" . $conn->error;
    }

    $conn ->close();
    
?>