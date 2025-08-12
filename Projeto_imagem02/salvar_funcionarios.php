<?php
// Função para redimensionar imagem (JPEG, PNG, GIF)
function redimensionar($caminho_temp, $largura_nova = 300, $altura_nova = 400) {
    // Obter informações da imagem
    list($largura_original, $altura_original, $tipo) = getimagesize($caminho_temp);

    // Criar nova imagem em branco
    $nova_imagem = imagecreatetruecolor($largura_nova, $altura_nova);

    // Carregar imagem original conforme o tipo
    switch ($tipo) {
        case IMAGETYPE_JPEG:
            $imagem_original = imagecreatefromjpeg($caminho_temp);
            break;
        case IMAGETYPE_PNG:
            $imagem_original = imagecreatefrompng($caminho_temp);
            break;
        case IMAGETYPE_GIF:
            $imagem_original = imagecreatefromgif($caminho_temp);
            break;
        default:
            throw new Exception("Formato de imagem não suportado.");
    }

    // Redimensionar com suavização
    imagecopyresampled(
        $nova_imagem,
        $imagem_original,
        0, 0, 0, 0,
        $largura_nova, $altura_nova,
        $largura_original, $altura_original
    );

    // Iniciar buffer para capturar dados binários
    ob_start();

    // Saída da imagem em JPEG (padrão)
    imagejpeg($nova_imagem, null, 90); // qualidade 90%

    // Capturar e limpar o buffer
    $dados = ob_get_clean();

    // Liberar memória
    imagedestroy($nova_imagem);
    imagedestroy($imagem_original);

    return $dados;
}

// Configuração do banco
$host = 'localhost';
$dbname = 'armazena_imagem'; // ✅ Nome do banco corrigido
$username = 'root';
$password = '';

try {
    // ✅ Correção: dbname=$dbname, não :$dbname
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['nome']);
        $telefone = trim($_POST['telefone']);
        $foto = $_FILES['foto'];

        // Validar se o upload foi feito corretamente
        if ($foto['error'] !== UPLOAD_ERR_OK) {
            die("Erro no upload da imagem: Código " . $foto['error']);
        }

        // Validar tipo de arquivo
        $tipo_mime = $foto['type'];
        if (!in_array($tipo_mime, ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'])) {
            die("Apenas imagens JPEG, PNG e GIF são permitidas.");
        }

        // Redimensionar a imagem
        try {
            $foto_blob = redimensionar($foto['tmp_name'], 300, 400);
        } catch (Exception $e) {
            die("Erro ao processar imagem: " . $e->getMessage());
        }

        // Inserir no banco
        // ✅ Certifique-se de que a tabela tem: id, nome, telefone, foto (LONGBLOB), tipo_foto (VARCHAR)
        $sql = "INSERT INTO funcionarios (nome, telefone, tipo_foto, foto) VALUES (:nome, :telefone, :tipo_foto, :foto)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':tipo_foto', $tipo_mime);
        $stmt->bindParam(':foto', $foto_blob, PDO::PARAM_LOB); // Dados binários

        if ($stmt->execute()) {
            echo "<h2 style='color: green;'>Funcionário cadastrado com sucesso!</h2>";
        } else {
            echo "<p style='color: red;'>Erro ao cadastrar funcionário.</p>";
        }

        echo "<a href='formulario_cadastro.html'>Voltar ao formulário</a> | ";
        echo "<a href='consulta_funcionario.php'>Ver todos os funcionários</a>";
        exit();
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erro no banco de dados: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvando Funcionário</title>
</head>
<body>
    <h1>Processando cadastro...</h1>
</body>
</html>