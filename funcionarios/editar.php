<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $departamento = $_POST['departamento'];
        $contato = $_POST['contato'];
        $supervisor = $_POST['supervisor'];
        $setor = $_POST['setor'];
        $atividades_atribuidas = $_POST['atividades_atribuidas'];

        $sql = "UPDATE Funcionarios SET Nome='$nome', Cargo='$cargo', Departamento='$departamento', Contato='$contato', Supervisor='$supervisor', Setor='$setor', Atividades_Atribuidas='$atividades_atribuidas' WHERE Id_Funcionario=$id";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao atualizar o funcionário: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM Funcionarios WHERE Id_Funcionario = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Funcionário não encontrado.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Editar Funcionário</h2>

    <form method="post">
        Nome: <input type="text" name="nome" value="<?php echo $row["Nome"]; ?>"><br>
        Cargo: <input type="text" name="cargo" value="<?php echo $row["Cargo"]; ?>"><br>
        Departamento: <input type="text" name="departamento" value="<?php echo $row["Departamento"]; ?>"><br>
        Contato: <input type="text" name="contato" value="<?php echo $row["Contato"]; ?>"><br>
        Supervisor: <input type="text" name="supervisor" value="<?php echo $row["Supervisor"]; ?>"><br>
        Setor: <input type="text" name="setor" value="<?php echo $row["Setor"]; ?>"><br>
        Atividades Atribuídas: <textarea name="atividades_atribuidas"><?php echo $row["Atividades_Atribuidas"]; ?></textarea><br>
        <input type="submit" value="Salvar Alterações">
    </form>

    <a href="index.php">Voltar para a lista de funcionários</a>
</body>
</html>
