<?php
include '../db.php';

$searchTerm = '';
$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST['searchTerm'];

    $query = "SELECT * FROM Pacientes WHERE Nome LIKE '%$searchTerm%'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $resultados = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Nenhum paciente encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesquisar Pacientes</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Pesquisar Pacientes</h2>

    <form method="post">
        <input type="text" name="searchTerm" placeholder="Digite o nome do paciente" value="<?php echo $searchTerm; ?>">
        <button type="submit">Pesquisar</button>
    </form>

    <?php if (!empty($resultados)): ?>
        <h3>Resultados da Pesquisa</h3>
        <ul>
            <?php foreach ($resultados as $paciente): ?>
                <li><?php echo $paciente['Nome']; ?> - <?php echo $paciente['CPF']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="index.php">Voltar</a>
</body>
</html>
