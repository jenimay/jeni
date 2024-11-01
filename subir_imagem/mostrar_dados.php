<?php
// Conexão com o banco de dados
$servername = "ds2022";
$username = "ds2022";
$password = "2dds2023";
$dbname = "tb_upload_img_thiago";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta para obter os dados e a imagem da tabela
$sql = "SELECT campo1, campo2, imagem_nome, imagem_dados FROM tabela";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibindo os dados e a imagem de cada registro
    while ($row = $result->fetch_assoc()) {
        echo "<h2>Dados do Registro</h2>";
        echo "Campo 1: " . $row["campo1"] . "<br>";
        echo "Campo 2: " . $row["campo2"] . "<br>";
        
        // Exibindo a imagem
        echo "<h3>Imagem:</h3>";
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row["imagem_dados"]) . '" alt="Imagem" style="width: 50px;"/>';
        
        // Separador entre registros
        echo "<hr>";
    }
} else {
    echo "Nenhum registro encontrado.";
}

// Fechando a conexão com o banco de dados
$conn->close();
?>
