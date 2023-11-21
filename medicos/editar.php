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

    $update_sql = "UPDATE Medicos SET Nome='$nome', Especializacao='$especializacao', CEP='$cep', Rua='$rua', Cidade='$cidade', Estado='$estado' WHERE CRM='$crm'";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "Dados do médico atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados do médico: " . $conn->error;
    }
}

if (isset($_GET['crm'])) {
    $crm = $_GET['crm'];

    $sql = "SELECT * FROM Medicos WHERE CRM='$crm'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['Nome'];
        $especializacao = $row['Especializacao'];
        $cep = $row['CEP'];
        $rua = $row['Rua'];
        $cidade = $row['Cidade'];
        $estado = $row['Estado'];
    } else {
        echo "Médico não encontrado.";
    }
} else {
    echo "CRM do médico não especificado.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Médico</title>
    <link rel="stylesheet" href="../style.css"> 
</head>
<body>
    <h2>Editar Médico</h2>

    <form method="post">
        CRM: <input type="text" name="crm" value="<?php echo $crm; ?>" readonly><br>
        Nome: <input type="text" name="nome" value="<?php echo $nome; ?>"><br>
        Especialização: <input type="text" name="especializacao" value="<?php echo $especializacao; ?>"><br>
        CEP: <input type="text" name="cep" value="<?php echo $cep; ?>"><br>
        Rua: <input type="text" name="rua" value="<?php echo $rua; ?>"><br>
        Cidade: <input type="text" name="cidade" value="<?php echo $cidade; ?>"><br>
        Estado: <input type="text" name="estado" value="<?php echo $estado; ?>"><br>
        <input type="submit" value="Atualizar Dados">
    </form>

    <a href="index.php">Voltar para a lista de Médicos</a>
</body>
</html>
