<?php
session_start(); // Inicia a sessão

require_once '../dbconexao.php'; // Inclua sua conexão com o banco

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome_produto = $_POST['nome_livro'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $classificacao_etaria = $_POST['classificacao_etaria'];
    $quant_paginas = $_POST['quant_paginas'];
    $dimensoes = $_POST['dimensoes'];
    $idioma = $_POST['idioma'];
    $colecao = $_POST['colecao'];
    $data_publicacao = $_POST['data_publicacao'];
    $ISBN_10 = $_POST['ISBN_10'];
    $ISBN_13 = $_POST['ISBN_13'];
    $preco = $_POST['preco'];
    $parcela = $_POST['parcela'];
    $promocao = $_POST['promocao'];
    $tipo = 'comum';  // O valor do tipo será 'comum' por padrão
    $novo_escritor = $_POST['novo_escritor'];

    // Para processar o upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = $_FILES['imagem']['name'];
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        
        // Define o caminho para o diretório 'assets/images/livros/'
        $imagem_destino = 'assets/images/products/' . $imagem; // Altere o caminho conforme necessário

        // Mova a imagem para o diretório especificado
        move_uploaded_file($imagem_tmp, $imagem_destino);
    } else {
        $imagem = null;
    }

    // Preparar a consulta SQL
    $stmt = $conn->prepare("INSERT INTO livros (nome_livro, autor, genero, classificacao_etaria, quant_paginas, dimensoes, idioma, colecao, data_publicacao, ISBN_10, ISBN_13, imagem, preco, parcela, promocao, tipo, novo_escritor) 
                            VALUES (:nome_livro, :autor, :genero, :classificacao_etaria, :quant_paginas, :dimensoes, :idioma, :colecao, :data_publicacao, :ISBN_10, :ISBN_13, :imagem, :preco, :parcela, :promocao, :tipo, :novo_escritor)");

    // Vincular os parâmetros
    $stmt->bindParam(':nome_livro', $nome_livro);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':classificacao_etaria', $classificacao_etaria);
    $stmt->bindParam(':quant_paginas', $quant_paginas);
    $stmt->bindParam(':dimensoes', $dimensoes);
    $stmt->bindParam(':idioma', $idioma);
    $stmt->bindParam(':colecao', $colecao);
    $stmt->bindParam(':data_publicacao', $data_publicacao);
    $stmt->bindParam(':ISBN_10', $ISBN_10);
    $stmt->bindParam(':ISBN_13', $ISBN_13);
    $stmt->bindParam(':imagem', $imagem_destino);  // Aqui é passado o caminho completo da imagem
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':parcela', $parcela);
    $stmt->bindParam(':promocao', $promocao);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':novo_escritor', $novo_escritor);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Livro cadastrado com sucesso!";
        header("Location: ../../../index.php");
    } else {
        echo "Erro ao cadastrar o livro.";
    }
}


?>
