<?php
    require "db.php";

    $Aname= $_POST['Aname'] or '';

    $ID = $_POST['id'] or '';
    if(!empty($Aname) and empty($ID)){
        $sql = "select * from alunos where nome = '$Aname'"; 
    }
    elseif(!empty($ID) and empty($Aname)){
        $sql = "select * from alunos where id = '$ID'";
    } elseif(!empty($ID) and !empty($Aname)){
        $sql = "select * from alunos where id = '$ID' and nome='$Aname'";
    }
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
    <section id="searchtable">
    <?php

    $result = $conn->query($sql);

    if($result->num_rows>0){
        echo "<table>
            <tr id='Theader'>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Email</th>
                <th>Curso</th>
            </tr>";               

    while ($row = $result->fetch_assoc()){
        echo "<tr style='color='white''>
                <th>".$row['id']."</th>
                <th>".$row['nome']."</th>
                <th>".$row['idade']."</th>
                <th>".$row['email']."</th>
                <th>".$row['curso']."</th>
            </tr>";  
    }
    echo "</table>"; 
    } else {echo "Nenhum dado encontrado";}
    ?>

    <a href="../index.php"> Voltar a tela de registros</a>
    </section>
</body>
</html>