<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Funcionarios WHERE Id_Funcionario = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir o funcionário: " . $conn->error;
    }
}
?>
