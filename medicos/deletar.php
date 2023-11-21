<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crm = $_POST['crm'];

    $check_sql = "SELECT * FROM Medicos WHERE CRM='$crm'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $delete_sql = "DELETE FROM Medicos WHERE CRM='$crm'";
        if ($conn->query($delete_sql) === TRUE) {
            echo "Médico deletado com sucesso!";
        } else {
            echo "Erro ao deletar médico: " . $conn->error;
        }
    } else {
        echo "Médico não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deletar Médico</title>
    <link rel="stylesheet" href="../style.css"> 
<body>
    <h2>Deletar Médico</h2>

    <form method="post">
        CRM do Médico: <input type="text" name="crm"><br>
        <input type="submit" value="Deletar Médico">
    </form>

    <a href="index.php">Voltar para a lista de Médicos</a>
</body>
</html>
