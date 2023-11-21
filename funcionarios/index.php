<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $departamento = $_POST['departamento'];
    $contato = $_POST['contato'];
    $supervisor = 1;
    $setor = $_POST['setor'];
    $atividades_atribuidas = $_POST['atividades_atribuidas'];

    $sql = "INSERT INTO Funcionarios (Nome, Cargo, Departamento, Contato, Supervisor, Setor, Atividades_Atribuidas) VALUES ('$nome', '$cargo', '$departamento', '$contato', '$supervisor', '$setor', '$atividades_atribuidas')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Novo funcionário adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM Funcionarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Funcionários</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Funcionários</h2>

    <form method="post">
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="text" name="cargo" placeholder="Cargo"><br>
        <input type="text" name="departamento" placeholder="Departamento"><br>
        <input type="text" name="contato" placeholder="Contato"><br>
        <!-- <input type="text" name="supervisor" placeholder="Supervisor"><br> -->
        <input type="text" name="setor" placeholder="Setor"><br>
        <textarea name="atividades_atribuidas" placeholder="Atividades Atribuídas"></textarea><br>
        <input type="submit" value="Adicionar Funcionário">
    </form>

    <h3>Lista de Funcionários</h3>
    <ul>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["Nome"] . " - Cargo: " . $row["Cargo"] . " - Departamento: " . $row["Departamento"];
            echo " - <a href='editar.php?id=" . $row["Id_Funcionario"] . "'>Editar</a>";
            echo " - <a href='deletar.php?id=" . $row["Id_Funcionario"] . "'>Deletar</a></li>";
        }
    } else {
        echo "<li>Nenhum funcionário encontrado</li>";
    }
    ?>
    </ul>

    <a href="../">Voltar para a página inicial</a>
</body>
</html>
