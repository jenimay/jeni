<?php
// Conexão com o banco de dados
$servername = "191.243.38.205/phpmyadmin";
$username = "ds2022";
$password = "2ds2023";
$dbname = "ds2022";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if (isset($_POST['submit'])) {
    // Obtém os valores dos campos
    $campo1 = $conn->real_escape_string($_POST['campo1']);
    $campo2 = $conn->real_escape_string($_POST['campo2']);

    // Verifica se um arquivo de imagem foi enviado
    if (isset($_FILES['imagem'])) {
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_temp = $_FILES['imagem']['tmp_name'];

        // Lê o conteúdo da imagem
        $imagem_dados = file_get_contents($imagem_temp);

        // Prepara e executa a query para inserir os dados e a imagem no banco de dados
        $stmt = $conn->prepare("INSERT INTO tb_upload_img_jeniffer (campo1, campo2, imagem_nome, imagem_dados) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $campo1, $campo2, $imagem_nome, $imagem_dados);
        $stmt->execute();

        // Fechar a instrução
        $stmt->close();
        
        $url = './mostrar_dados.php';
        header("Location: " . $url);
    } else {
        echo "Erro ao enviar a imagem.";
    }
}

// Fechar a conexão com o banco de dados

?>
