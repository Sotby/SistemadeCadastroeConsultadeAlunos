<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro e Consulta de Alunos</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <Section id="cadastro">
        <h1>Cadastre um aluno</h1>
        <form action="./php/cadastro.php" method="post">
            <label for="Aname"> Nome do Aluno</label>
            <input type="text" id="Aname" name="Aname" required>
            <label for="Aidade">Idade do Aluno</label>
            <input type="number" id="Aidade" name="Aidade" required>
            <label for="Aemail">Email</label>
            <input type="email" name="Aemail" id="Aemail" required>
            <label for="curso">Curso</label>
            <input type="text" name="curso" id="curso" required>
            <button type="submit" id="submit">Cadastrar</button>
        </form>
    </Section>
    <section id="search">
    </section>
    <section id="table">
        <?php
            require "php/db.php";
            
            $sql = "Select * from alunos order by id desc limit 10";
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
                    echo "<tr>
                            <th>".$row['id']."</th>
                            <th>".$row['nome']."</th>
                            <th>".$row['idade']."</th>
                            <th>".$row['email']."</th>
                            <th>".$row['curso']."</th>
                            <th>
                                <form action='./php/deletar.php' method='post' onsubmit='return confirm(\"Tem certeza que deseja excluir este aluno?\")'>
                                    <input type='hidden' name='id' value='".$row['id']."'>
                                    <button type='submit' style='color=red;'>Excluir</button>
                                </form>
                            </th>
                        </tr>";  
                }
                echo "</table>"; 
            } else {
                echo "Nenhum dado encontrado";
            }
        ?>
        <div id="deleteDiv">
        <form action="./php/deletar.php" method="post">
            <label for="id">Deletar usuario por ID</label>
            <input type="number" placeholder="Insira o ID do aluno" name="id">
            <button type="submit" id="submit">Confirmar</button>
        </form>
        </div>
        <div id="search">
            <form action="php/search.php" method="post">
                <span>Procurar usuário via ID ou nome</span>
                <label for="Aname">Nome</label>
                <input type="text" name="Aname">
                <label for="id">ID</label>
                <input type="number" name="id">
                <button type="submit">Procurar Aluno</button>
            </form>
        </div>
    </section>
</body>
</html>