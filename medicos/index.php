<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crm = $_POST['crm'];
    $nome = $_POST['nome'];
    $especializacao = $_POST['especializacao'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO Medicos (CRM, Nome, Especializacao, CEP, Rua, Cidade, Estado) VALUES ('$crm', '$nome', '$especializacao', '$cep', '$rua', '$cidade', '$estado')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Novo médico adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM Medicos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Médicos</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Médicos</h2>

    <form method="post">
        CRM: <input type="text" name="crm"><br>
        Nome: <input type="text" name="nome"><br>
        Especialização: <input type="text" name="especializacao"><br>
        CEP: <input type="text" name="cep"><br>
        Rua: <input type="text" name="rua"><br>
        Cidade: <input type="text" name="cidade"><br>
        Estado: <input type="text" name="estado"><br>
        <input type="submit" value="Adicionar Médico">
    </form>

    <h3>Lista de Médicos</h3>
    <ul>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["Nome"] . " - CRM: " . $row["CRM"] . " - Especialização: " . $row["Especializacao"];
            echo " - <a href='editar.php?crm=" . $row["CRM"] . "'>Editar</a>";
            echo " - <a href='deletar.php?crm=" . $row["CRM"] . "'>Deletar</a></li>";
        }
    } else {
        echo "<li>Nenhum médico encontrado</li>";
    }
    ?>
    </ul>

    <h3>Gerenciar Médicos</h3>
    <ul>
        <li><a href="pesquisar.php">Pesquisar Médico</a></li>
        <li><a href="consulta.php">Cargos de Médicos Mais Comuns</a></li>
    </ul>

    <a href="../">Voltar para a página inicial</a>
</body>
</html>
