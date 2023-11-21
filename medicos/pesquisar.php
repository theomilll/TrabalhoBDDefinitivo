<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];

    $sql = "SELECT * FROM Medicos WHERE Nome LIKE '%$search%' OR CRM LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Resultados da Pesquisa</h3>";
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["Nome"] . " - CRM: " . $row["CRM"] . " - Especialização: " . $row["Especializacao"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum médico encontrado com o critério de pesquisa.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesquisar Médicos</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Pesquisar Médicos</h2>

    <form method="post">
        Pesquisar por Nome ou CRM: <input type="text" name="search">
        <input type="submit" value="Pesquisar">
    </form>

    <a href="index.php">Voltar para a lista de Médicos</a>
</body>
</html>
