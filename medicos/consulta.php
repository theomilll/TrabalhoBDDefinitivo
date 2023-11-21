<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulta de Especializações de Médicos</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Especializações de Médicos e Quantidade:</h1>

    <?php
    include '../db.php';

    $sql = "SELECT Especializacao, COUNT(*) AS Quantidade FROM Medicos GROUP BY Especializacao";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Especialização</th><th>Quantidade</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Especializacao"] . "</td><td>" . $row["Quantidade"] . "</td></tr>";
        }
        
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }

    ?>
</body>
</html>
