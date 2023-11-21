<?php
include 'db.php';

if ($conn) {
    echo "Conexão estabelecida com sucesso!";
} else {
    echo "Falha na conexão: " . $conn->connect_error;
}
?>
