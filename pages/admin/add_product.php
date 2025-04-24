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

    echo "Produto inserido com sucesso!";

} else {
    echo "Requisição inválida.";
}
?>
