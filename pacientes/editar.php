<?php
include '../db.php';

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    $query = "SELECT * FROM Pacientes WHERE CPF = '$cpf'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $paciente = $result->fetch_assoc();
    } else {
        die("Paciente não encontrado.");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $rua = $_POST['rua'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];

        $updateSql = "UPDATE Pacientes SET Nome = '$nome', Rua = '$rua', Cidade = '$cidade', Estado = '$estado', CEP = '$cep' WHERE CPF = '$cpf'";

        if ($conn->query($updateSql) === TRUE) {
            echo "Paciente atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar paciente: " . $conn->error;
        }
    }
} else {
    die("CPF não especificado.");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Paciente</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Editar Paciente</h2>

    <form method="post">
        Nome: <input type="text" name="nome" value="<?php echo $paciente['Nome']; ?>"><br>
        Rua: <input type="text" name="rua" value="<?php echo $paciente['Rua']; ?>"><br>
        Cidade: <input type="text" name="cidade" value="<?php echo $paciente['Cidade']; ?>"><br>
        Estado: <input type="text" name="estado" value="<?php echo $paciente['Estado']; ?>"><br>
        CEP: <input type="text" name="cep" value="<?php echo $paciente['CEP']; ?>"><br>
        <input type="submit" value="Atualizar">
    </form>

    <a href="index.php">Voltar</a>
</body>
</html>
