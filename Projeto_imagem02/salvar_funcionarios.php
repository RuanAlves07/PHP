<?php
    function redimensionar ($imagem,$largura,$altura){
        //Obtém as dimensões originais da imagem 
        //Getimagesize() Retorna a largura e altura de uma imagem

        list($largura,$alturaOriginal,$larguraOriginal) = getimagesize($imagem);

        //Cria uma nova imagem de acordo com as novas dimensões
        //imagecreatetruecolor = cria uma nova imagem em branco com alta qualidade


        $nova_imagem = imagecreatetruecolor($largura, $largura);

        //Carrega a imagem origina (jpeg) a partir do arquivp 
        //imagecreatefromjpeg() cria a imagem php

        $imagemOriginal = imagecreatefromjpeg($imagem);

        //copia e redmensiona a imagem original para a nova 
        //imagecopyresampled()-- copia o redimensionamento e suavização

        imagecopyresampled($nova_imagem,$imagemOriginal,0,0,0,0,$largura,$altura,$larguraOriginal,$alturaOriginal);

        //Inicia um buffer para guardar a imagem com texto binário
        //ob-start()-- iniciar o "output buffering" guardando a saida

        ob_start();

        //imagejep()Envia a imagem para o output(que vai pro buffer)

        imagejpeg($nova_imagem);

        //Ob_get_clean() -- Pegar o conteudo do buffer e limpa
        $dadosImagem =ob_clean();

        //Libera a memória usada pelas imagens
        //imagedestroy() -- limpa a memoria da imagem criada
        imagedestroy($nova_imagem);
        imagedestroy($imagemOriginal);

        //Retorna a imagem redmensionada em formato binario
        return $dadosImagem;

    }

    //Configuraçao do banco de dados
    $host = 'localhost';
    $dbname = 'armazena_imagem';
    $username = 'root';
    $password = '';

    try {
        //Conexao com o banco usando pdo
        $pdo = new pdo("mysql:host=$host;dbname:$dbname",$username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_FILES['foto'])){

            if($_FILES['foto']['error'] == 0){
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $imagem = $_FILES['foto']['name']; // PEGA O NOME ORIGINAL DO ARQUIVO
                $tipo_foto = $_POST['foto']['type'];  // PEGA O TIPO mime DA IMAGEM

                // REDIMENSIONA A IMAGEM
                // O CODIGO ABAIXO CUJA VARIAVEL É tpm_name É O CAMINHO TEMPORARIO DO ARQUIVO 
                $imagem = redimensionar($_FILES['foto']['tmp_name'], 300,400);

                // INSERE NO BANCO E DADOS USANDO O SQL PREPARED
                $sql = "INSERT INTO funcionarios (nome,telefone,nome_foto,tipo_foto,foto) VALUES(:nome, :telefone, :nome_foto, :tipo_foto, :foto)";
                $stmt = $pdo->prepare($sql); // RESPONSAVEL POR PREPARAR A QUERY PARA EVITAR ATAQUE SQL INJECTION
                $stmt->bindParam(':nome',$nome); // LIGA OS PARAMETROS ÀS VARIAVEIS
                $stmt->bindParam(':telefone',$telefone); // LIGA OS PARAMETROS ÀS VARIAVEIS
                $stmt->bindParam(':nome_foto',$imagem); // LIGA OS PARAMETROS ÀS VARIAVEIS
                $stmt->bindParam(':tipo_foto',$tipo_imagem); // LIGA OS PARAMETROS ÀS VARIAVEIS
                $stmt->bindParam(':foto', $imagem,PDO::PARAM_LOB); // LOB = LARGE OBJECT USADO PARA DADOS BINARIOS COMO IMAGEM 

                if ($stmt->execute()){
                    echo "funcionario cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar o funcionario";
                }
            } else {
                echo "Erro ao fazer upload da foto! Código: ". $_FILES['foto']['error'];
            }
        }
       } catch(PDOException $e) {
        echo "Erro. ".$e->getMessage(); // MOSTRA O ERRO SE HOUVER 
       } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Imagens</title>
</head>
<body>
    <h1>Lista de Imagens</h1>

    <a href="consulta_funcionario.php">Listar Funcionarios</a>

</body>
</html>

<!--Warning: Undefined array key "foto" in C:\xampp\htdocs\PHP\Projeto_imagem02\salvar_funcionarios.php on line 63

Warning: Trying to access array offset on value of type null in C:\xampp\htdocs\PHP\Projeto_imagem02\salvar_funcionarios.php on line 63
Erro. SQLSTATE[3D000]: Invalid catalog name: 1046 No database selected-->