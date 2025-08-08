<?php

$host = 'localhost';
$dbname = 'armazena_imagem';
$username = 'root';
$password = '';

// Inicializa a variável para evitar erro no foreach
$funcionarios = [];

try {
    // Conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta os funcionários
    $sql = "SELECT id, nome FROM funcionarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verifica se foi solicitada exclusão
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir_id'])) {
        $excluir_id = $_POST['excluir_id'];

        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt_excluir = $pdo->prepare($sql_excluir);
        $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
        $stmt_excluir->execute();

        // Redireciona para evitar reenvio
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Funcionários</title>
</head>
<body>
    <h1>Consulta de Funcionários</h1>

    <?php if (!empty($funcionarios)): ?>
        <ul>
            <?php foreach ($funcionarios as $funcionario): ?>
                <li>
                    <!-- Link para visualizar detalhes -->
                    <a href="visualizar_funcionario.php?id=<?= htmlspecialchars($funcionario['id']) ?>">
                        <?= htmlspecialchars($funcionario['nome']) ?>
                    </a>
                    
                    <!-- Formulário de exclusão -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="excluir_id" value="<?= $funcionario['id'] ?>">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum funcionário encontrado.</p>
    <?php endif; ?>
</body>
</html>