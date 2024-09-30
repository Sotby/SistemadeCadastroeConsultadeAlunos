<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro e Consulta de Alunos</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <Section>
        <form action="./php/cadastro.php" method="post">
            <label for="Aname"> Nome do Aluno</label>
            <input type="text" id="Aname" name="Aname">
            <label for="Aidade">Idade do Aluno</label>
            <input type="number" id="Aidade" name="Aidade">
            <label for="Aemail">Email</label>
            <input type="email" name="Aemail" id="Aemail">
            <label for="curso">Curso</label>
            <input type="text" name="curso" id="curso">
            <button type="submit" id="submit">Inseir dados</button>
        </form>
    </Section>

    <section>
        <?php
            require "php/db.php";
            
            $sql = "Select * from alunos order by id desc limit 10";
            $result = $conn->query($sql);

            if($result->num_rows>0){
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Email</th>
                            <th>Curso</th>
                        </tr>";               
            
                while ($row = $result->fetch_assoc()){
                    echo "<tr>
                            <th>".$row['id']."</th>
                            <th>".$row['nome']."</th>
                            <th>".$row['idade']."</th>
                            <th>".$row['email']."</th>
                            <th>".$row['curso']."</th>
                        </tr>";  
                }
                echo "</table>;";
            } else {
                echo "Nenhum dado encontrado";
            }
        ?>
        <form action="./php/deletar.php" method="post">
            <label for="id">Deletar usuario</label>
            <input type="number" placeholder="Insira o ID do aluno" name="id">
            <button type="submit" id="submit">Confirmar</button>
        </form>
    </section>
</body>
</html>