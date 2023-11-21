<?php
include '../db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cpf']) && isset($_POST['nome']) && isset($_POST['rua']) && isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['cep'])) {
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $rua = $_POST['rua'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        $sql = "INSERT INTO Pacientes (CPF, Nome, Rua, Cidade, Estado, CEP) VALUES ('$cpf', '$nome', '$rua', '$cidade', '$estado', '$cep')";
    } else {
        echo "Dados incompletos.";
    }
    if ($conn->query($sql) === TRUE) {
        echo "Novo paciente adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM Pacientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Pacientes</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Pacientes</h2>

    <form method="post">
        <input type="text" name="cpf" placeholder="CPF"><br>
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="text" name="rua" placeholder="Rua"><br>
        <input type="text" name="cidade" placeholder="Cidade"><br>
        <input type="text" name="estado" placeholder="Estado"><br>
        <input type="text" name="cep" placeholder="CEP"><br>
        <input type="submit" value="Adicionar Paciente">
    </form>

<form action="pesquisar.php" method="post">
        <input type="text" name="searchTerm" placeholder="Pesquisar Pacientes">
        <button type="submit">Pesquisar</button>
    </form>

    <!-- <h3>Associar paciente a médico</h3>
<form method="post">
    Paciente:
    <select name="paciente_cpf">
        <?php
        // Consulta para obter a lista de pacientes
        $pacientes_sql = "SELECT CPF, Nome FROM Pacientes";
        $pacientes_result = $conn->query($pacientes_sql);
        
        if ($pacientes_result->num_rows > 0) {
            while($paciente_row = $pacientes_result->fetch_assoc()) {
                echo "<option value='" . $paciente_row["CPF"] . "'>" . $paciente_row["Nome"] . "</option>";
            }
        }
        ?>
    </select>
    Médico:
    <select name="medico_crm">
        <?php
        // Consulta para obter a lista de médicos
        $medicos_sql = "SELECT CRM, Nome FROM Medicos";
        $medicos_result = $conn->query($medicos_sql);
        
        if ($medicos_result->num_rows > 0) {
            while($medico_row = $medicos_result->fetch_assoc()) {
                echo "<option value='" . $medico_row["CRM"] . "'>" . $medico_row["Nome"] . "</option>";
            }
        }
        ?>
    </select>
    <input type="submit" name="associar" value="Associar">
</form> -->

    <h3>Lista de Pacientes</h3>
    <ul>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["Nome"] . " - CPF: " . $row["CPF"] . " - Endereço: " . $row["Rua"] . ", " . $row["Cidade"] . ", " . $row["Estado"] . ", CEP: " . $row["CEP"];
            echo " - <a href='editar.php?cpf=" . $row["CPF"] . "'>Editar</a>";
            echo " - <a href='deletar.php?cpf=" . $row["CPF"] . "'>Deletar</a></li>";
        }
    } else {
        echo "<li>Nenhum paciente encontrado</li>";
    }
    ?>
    </ul>

    <a href="../">Voltar para a página inicial</a>
</body>
</html>
</body>
</html>
