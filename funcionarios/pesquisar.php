<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];

    $sql = "SELECT * FROM Funcionarios WHERE Nome LIKE '%$search%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesquisar Funcionários</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Pesquisar Funcionários</h2>

    <form method="post">
        Nome: <input type="text" name="search">
        <input type="submit" value="Pesquisar">
    </form>

    <h3>Resultados da Pesquisa</h3>
    <ul>
    <?php
    if (isset($result) && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["Nome"] . " - Cargo: " . $row["Cargo"] . " - Departamento: " . $row["Departamento"];
            echo " - <a href='editar.php?id=" . $row["Id_Funcionario"] . "'>Editar</a>";
            echo " - <a href='deletar.php?id=" . $row["Id_Funcionario"] . "'>Deletar</a></li>";
        }
    } else {
        echo "<li>Nenhum resultado encontrado</li>";
    }
    ?>
    </ul>

    <a href="index.php">Voltar para a lista de funcionários</a>
</body>
</html>
