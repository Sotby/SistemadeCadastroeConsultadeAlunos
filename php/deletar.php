<?php
    require "db.php";

    $id = $_POST["id"];

    $sql = "delete from alunos where id=$id;";

    
    if($conn->query($sql) === true){
        echo "Aluno Deletado!";
    } else{
        echo "ERROR: " . $sql . "<br>" . $conn->error;
    }

    $conn ->close();
?>