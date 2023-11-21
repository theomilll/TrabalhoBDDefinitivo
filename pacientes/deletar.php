<?php
include '../db.php';

if(isset($_GET['cpf'])) {
    $cpfToDelete = $_GET['cpf'];
    $deleteSql = "DELETE FROM Pacientes WHERE CPF = '$cpfToDelete'";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Paciente deletado com sucesso!";
    } else {
        echo "Erro ao deletar paciente: " . $conn->error;
    }
}
header('Location: index.php');
?>
