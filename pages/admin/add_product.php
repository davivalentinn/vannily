<?php

require_once("dbconexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Dados básicos do produto
    $nome_produto = $_POST['nome_produto'];
    $preco_produto = $_POST['preco_produto'];
    $categoria_produto = $_POST['categoria_produto']; // Nome da categoria
    $descricao_produto = $_POST['descricao_produto'];
    $estoque_produto = $_POST['estoque_produto'];
    $fornecedor = $_POST['fornecedor'];
    $transportadora = $_POST['transportadora'];

    // Upload da imagem
    if (isset($_FILES['imagem_produto']) && $_FILES['imagem_produto']['error'] == 0) {
        $imagem = $_FILES['imagem_produto']['name'];
        $imagem_tmp = $_FILES['imagem_produto']['tmp_name'];
        $imagem_destino = '../../assets/images/products_db/' . $imagem;

        if (!is_dir('../../assets/images/products_db/')) {
            mkdir('../../assets/images/products_db/', 0777, true);
        }

        move_uploaded_file($imagem_tmp, $imagem_destino);
    } else {
        $imagem_destino = null;
    }

    // Verifica se a categoria já existe
    $sql_categoria = "SELECT id FROM categoria WHERE nome = :categoria_produto";
    $stmt_categoria = $conn->prepare($sql_categoria);
    $stmt_categoria->bindParam(':categoria_produto', $categoria_produto);
    $stmt_categoria->execute();
    $categoria = $stmt_categoria->fetch(PDO::FETCH_ASSOC);

    if ($categoria) {
        $id_categoria = $categoria['id'];
    } else {
        // Insere a nova categoria
        $sql_insert_categoria = "INSERT INTO categoria (nome) VALUES (:categoria_produto)";
        $stmt_insert_categoria = $conn->prepare($sql_insert_categoria);
        $stmt_insert_categoria->bindParam(':categoria_produto', $categoria_produto);
        $stmt_insert_categoria->execute();

        // Pega o ID da nova categoria
        $id_categoria = $conn->lastInsertId();
    }

    // Insere o produto com o id_categoria
    $sql_produto = "INSERT INTO produto 
                    (nome, imagem, preco, unidades, descricao, fornecedor, transportadora, id_categoria) 
                    VALUES 
                    (:nome_produto, :imagem_produto, :preco_produto, :estoque_produto, :descricao_produto, :fornecedor, :transportadora, :id_categoria)";

    $stmt_produto = $conn->prepare($sql_produto);
    $stmt_produto->bindParam(':nome_produto', $nome_produto);
    $stmt_produto->bindParam(':imagem_produto', $imagem_destino);
    $stmt_produto->bindParam(':preco_produto', $preco_produto);
    $stmt_produto->bindParam(':estoque_produto', $estoque_produto);
    $stmt_produto->bindParam(':descricao_produto', $descricao_produto);
    $stmt_produto->bindParam(':fornecedor', $fornecedor);
    $stmt_produto->bindParam(':transportadora', $transportadora);
    $stmt_produto->bindParam(':id_categoria', $id_categoria);

    $stmt_produto->execute();

    // Pega o ID do produto inserido
    $id_produto = $conn->lastInsertId();

    // Agora, insere nas tabelas específicas conforme a categoria enviada
    if ($categoria_produto == 'jogos') {       
        $tema = $_POST['tema'];
        $genero = $_POST['genero'];
        $qtd_pessoas = $_POST['numero_jogadores'];
        $classificacao_indicativa = $_POST['classificacao'];
        $duracao = $_POST['tempo_jogo'];

        $sql_produto_jogo = "INSERT INTO produto_jogo 
                            (id_produto, tema, genero, qtd_pessoas, classificacao_indicativa, duracao) 
                            VALUES 
                            (:id_produto, :tema, :genero, :qtd_pessoas, :classificacao_indicativa, :duracao)";
        
        $stmt_produto_jogo = $conn->prepare($sql_produto_jogo);
        $stmt_produto_jogo->bindParam(':id_produto', $id_produto);
        $stmt_produto_jogo->bindParam(':tema', $tema);
        $stmt_produto_jogo->bindParam(':genero', $genero);
        $stmt_produto_jogo->bindParam(':qtd_pessoas', $qtd_pessoas);
        $stmt_produto_jogo->bindParam(':classificacao_indicativa', $classificacao_indicativa);
        $stmt_produto_jogo->bindParam(':duracao', $duracao);

        $stmt_produto_jogo->execute();

        // Agora inserimos nas tabelas jogo_tabuleiro ou jogo_cartas
        $tipo_jogo = $_POST['tipo_jogo'];

        if ($tipo_jogo == 'tabuleiro') {
            $qtd_pecas = $_POST['qtd_pecas'];
            $tamanho_tabuleiro = $_POST['tamanho_tabuleiro'];
            $material_tabuleiro = $_POST['material_tabuleiro'];
            $tipo_tabuleiro = $_POST['tipo_tabuleiro'];
            $complexidade = $_POST['complexidade'];
            $possui_cartas = isset($_POST['possui_cartas']) ? 1 : 0;

            $sql_jogo_tabuleiro = "INSERT INTO jogo_tabuleiro 
                                (id_produto, qtd_pecas, tamanho_tabuleiro, material_tabuleiro, tipo_tabuleiro, complexidade, possui_cartas)
                                VALUES
                                (:id_produto, :qtd_pecas, :tamanho_tabuleiro, :material_tabuleiro, :tipo_tabuleiro, :complexidade, :possui_cartas)";
            
            $stmt_jogo_tabuleiro = $conn->prepare($sql_jogo_tabuleiro);
            $stmt_jogo_tabuleiro->bindParam(':id_produto', $id_produto);
            $stmt_jogo_tabuleiro->bindParam(':qtd_pecas', $qtd_pecas);
            $stmt_jogo_tabuleiro->bindParam(':tamanho_tabuleiro', $tamanho_tabuleiro);
            $stmt_jogo_tabuleiro->bindParam(':material_tabuleiro', $material_tabuleiro);
            $stmt_jogo_tabuleiro->bindParam(':tipo_tabuleiro', $tipo_tabuleiro);
            $stmt_jogo_tabuleiro->bindParam(':complexidade', $complexidade);
            $stmt_jogo_tabuleiro->bindParam(':possui_cartas', $possui_cartas);

            $stmt_jogo_tabuleiro->execute();
        }

        if ($tipo_jogo == 'cartas') {
            $tipo_baralho = $_POST['tipo_baralho'];
            $tamanho_cartas = $_POST['tamanho_cartas'];
            $material_cartas = $_POST['material_cartas'];
            $tipo_jogo_cartas = $_POST['tipo_jogo_cartas'];
            $numero_cartas = $_POST['numero_cartas'];
            $ilustrado = isset($_POST['ilustrado']) ? 1 : 0;

            $sql_jogo_cartas = "INSERT INTO jogo_cartas 
                                (id_produto, tipo_baralho, tamanho_cartas, material_cartas, tipo_jogo, numero_cartas, ilustrado)
                                VALUES
                                (:id_produto, :tipo_baralho, :tamanho_cartas, :material_cartas, :tipo_jogo_cartas, :numero_cartas, :ilustrado)";
            
            $stmt_jogo_cartas = $conn->prepare($sql_jogo_cartas);
            $stmt_jogo_cartas->bindParam(':id_produto', $id_produto);
            $stmt_jogo_cartas->bindParam(':tipo_baralho', $tipo_baralho);
            $stmt_jogo_cartas->bindParam(':tamanho_cartas', $tamanho_cartas);
            $stmt_jogo_cartas->bindParam(':material_cartas', $material_cartas);
            $stmt_jogo_cartas->bindParam(':tipo_jogo_cartas', $tipo_jogo_cartas);
            $stmt_jogo_cartas->bindParam(':numero_cartas', $numero_cartas);
            $stmt_jogo_cartas->bindParam(':ilustrado', $ilustrado);

            $stmt_jogo_cartas->execute();
        }
    }

    if ($categoria_produto == 'roupas') {       
        $tamanho = $_POST['tamanho'];
        $cor = $_POST['cor'];
        $dimensoes = $_POST['dimensoes'];
        $numero_modelo = $_POST['numero_modelo'];

        $sql_produto_roupa = "INSERT INTO produto_roupa 
                            (id_produto, tamanho, cor, dimensoes, numero_modelo) 
                            VALUES 
                            (:id_produto, :tamanho, :cor, :dimensoes, :numero_modelo)";
        
        $stmt_produto_roupa = $conn->prepare($sql_produto_roupa);
        $stmt_produto_roupa->bindParam(':id_produto', $id_produto);
        $stmt_produto_roupa->bindParam(':tamanho', $tamanho);
        $stmt_produto_roupa->bindParam(':cor', $cor);
        $stmt_produto_roupa->bindParam(':dimensoes', $dimensoes);
        $stmt_produto_roupa->bindParam(':numero_modelo', $numero_modelo);

        $stmt_produto_roupa->execute();
    }

    echo "Produto inserido com sucesso!";

} else {    
    echo "Requisição inválida.";
}

?>
