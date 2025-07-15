
Código PHP (index.php):
PHP
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto - Gerenciador de Estoque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1, h2 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
        strong {
            color: #555;
        }
        .disponivel {
            color: green;
            font-weight: bold;
        }
        .indisponivel {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalhes do Produto no Estoque</h1>

        <?php
        // --- Seção 1: Declaração e Atribuição de Variáveis ---

        // Variável String: Nome do produto
        $nomeProduto = "Camiseta Básica Masculina";

        // Variável String: Código SKU do produto
        $skuProduto = "CMB-M-001";

        // Variável Inteira: Quantidade em estoque
        $quantidadeEstoque = 45;

        // Variável de Ponto Flutuante (Float): Preço de venda unitário
        $precoVenda = 39.99;

        // Variável Booleana: Indica se o produto está ativo/disponível para venda
        $produtoAtivo = true;

        // Exemplo de variável com nome inválido (para discussão)
        // $1produto = "Erro"; // Começa com número - INVÁLIDO
        // $nome-do-produto = "Erro"; // Contém hífen - INVÁLIDO
        // $estoque total = "Erro"; // Contém espaço - INVÁLIDO

        // --- Seção 2: Exibição das Informações do Produto ---
        ?>
        <h2>Informações do Produto</h2>
        <p><strong>Nome do Produto:</strong> <?php echo $nomeProduto; ?></p>
        <p><strong>SKU:</strong> <?php echo $skuProduto; ?></p>
        <p><strong>Quantidade em Estoque:</strong> <?php echo $quantidadeEstoque; ?> unidades</p>
        <p><strong>Preço de Venda:</strong> R$ <?php echo number_format($precoVenda, 2, ',', '.'); ?></p>
        <p><strong>Status:</strong>
            <?php
            if ($produtoAtivo) {
                echo '<span class="disponivel">Disponível para venda</span>';
            } else {
                echo '<span class="indisponivel">Indisponível para venda</span>';
            }
            ?>
        </p>

        <h2>Regras para Variáveis em PHP: Um Lembrete Importante</h2>
        <ul>
            <li>Variáveis em PHP **sempre começam com o símbolo de dólar** (<code>$</code>). Ex: <code>$minhaVariavel</code>.</li>
            <li>O **primeiro caractere** após o <code>$</code> deve ser uma letra (<code>a-z</code>, <code>A-Z</code>) ou um underscore (<code>_</code>).</li>
            <li>Os caracteres subsequentes podem ser letras, números (<code>0-9</code>) ou underscores.</li>
            <li>Variáveis são **case-sensitive** (<code>$nome</code> é diferente de <code>$Nome</code>).</li>
            <li>Evite usar nomes que coincidam com palavras-chave reservadas do PHP (ex: <code>$echo</code>, <code>$for</code>).</li>
            <li>Utilize **nomes descritivos e significativos** para suas variáveis (ex: <code>$nomeProduto</code> ao invés de <code>$nP</code>). Isso melhora a legibilidade do código.</li>
        </ul>
        <h2>Tipos de Variáveis Utilizados Nesta Atividade</h2>
        <ul>
            <li>**String:** Usada para textos e cadeias de caracteres (<code>$nomeProduto</code>, <code>$skuProduto</code>).</li>
            <li>**Integer (Inteiro):** Usada para números inteiros (<code>$quantidadeEstoque</code>).</li>
            <li>**Float (Ponto Flutuante):** Usada para números com casas decimais (<code>$precoVenda</code>).</li>
            <li>**Boolean (Booleano):** Usada para valores verdadeiro/falso (<code>$produtoAtivo</code>).</li>
        </ul>
        <p><em>Esta página demonstra como variáveis PHP armazenam e exibem informações de produtos no estoque de forma dinâmica.</em></p>

    </div>
</body>
</html>
