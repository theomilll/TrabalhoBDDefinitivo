<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulta de Atividades Atribuídas a Funcionários</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Atividades Atribuídas a Funcionários e Quantidade:</h1>

    <?php
    include '../db.php';

    $sql = "SELECT Atividades_Atribuidas, COUNT(*) AS Quantidade FROM Funcionarios GROUP BY Atividades_Atribuidas";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Atividades Atribuídas</th><th>Quantidade</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Atividades_Atribuidas"] . "</td><td>" . $row["Quantidade"] . "</td></tr>";
        }
        
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }

    ?>
</body>
</html>
