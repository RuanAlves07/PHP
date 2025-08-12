<?php
$host = 'localhost';
$dbname = 'armazena_imagem';
$username = 'root';
$password = '';

try {
    // Conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        
        $sql = "SELECT nome, telefone, tipo_foto, foto FROM funcionarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

            
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir_id'])) {
                $excluir_id = $_POST['excluir_id'];

                $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
                $stmt_excluir = $pdo->prepare($sql_excluir);
                $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
                $stmt_excluir->execute();

                
                header("Location: consulta_funcionario.php");
                exit();
            }
        } else {
            echo "Funcionário não encontrado.";
            exit();
        }
    } else {
        echo "ID do funcionário não foi fornecida.";
        exit();
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizador de Funcionários</title>
</head>
<body>
    <h1>Dados do Funcionário</h1>
    <p><strong>Nome:</strong> <?= htmlspecialchars($funcionario['nome']) ?></p>
    <p><strong>Telefone:</strong> <?= htmlspecialchars($funcionario['telefone']) ?></p>
    <p><strong>Foto:</strong></p>
    <img src="data:<?= $funcionario['tipo_foto'] ?>;base64,<?= base64_encode($funcionario['foto']) ?>" alt="Foto do Funcionário";>
    
    <form method="POST">
        <input type="hidden" name="excluir_id" value="<?= $id ?>">
        <button type="submit">
            Excluir Funcionário
        </button>
    </form>
</body>
</html>