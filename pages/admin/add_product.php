<?php

require_once("dbconexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Dados básicos do produto
    $nome_produto = $_POST['nome_produto'];
    $preco_produto = $_POST['preco_produto'];
    $categoria_produto = $_POST['categoria_produto']; // A categoria recebida do formulário
    $descricao_produto = $_POST['descricao_produto'];
    $estoque_produto = $_POST['estoque_produto'];
    $fornecedor = $_POST['fornecedor'];
    $transportadora = $_POST['transportadora'];

    // Variáveis adicionais para produtos de categorias específicas
    $tipo_jogo = isset($_POST['tipo_jogo']) ? $_POST['tipo_jogo'] : null;
    $tema = isset($_POST['tema']) ? $_POST['tema'] : null;
    $genero = isset($_POST['genero']) ? $_POST['genero'] : null;
    $classificacao = isset($_POST['classificacao']) ? $_POST['classificacao'] : null;
    $numero_jogadores = isset($_POST['numero_jogadores']) ? $_POST['numero_jogadores'] : null;
    $tempo_jogo = isset($_POST['tempo_jogo']) ? $_POST['tempo_jogo'] : null;

    // Para processar o upload da imagem
    if (isset($_FILES['imagem_produto']) && $_FILES['imagem_produto']['error'] == 0) {
        $imagem = $_FILES['imagem_produto']['name'];
        $imagem_tmp = $_FILES['imagem_produto']['tmp_name'];

        // Define o caminho para o diretório 'assets/images/products_db/'
        $imagem_destino = '../../assets/images/products_db/' . $imagem; // Altere o caminho conforme necessário

        // Verifique se o diretório existe e se tem permissão para escrita
        if (!is_dir('../../assets/images/products_db/')) {
            mkdir('../../assets/images/products_db/', 0777, true);
        }

        // Mova a imagem para o diretório especificado
        move_uploaded_file($imagem_tmp, $imagem_destino);
    } else {
        $imagem_destino = null; // Caso não tenha imagem
    }

    // Passo 1: Buscar o id_categoria baseado no nome da categoria
    $sql_categoria = "SELECT id FROM categoria WHERE nome = :categoria_produto";
    $stmt_categoria = $conn->prepare($sql_categoria);
    $stmt_categoria->bindParam(':categoria_produto', $categoria_produto);
    $stmt_categoria->execute();
    $categoria = $stmt_categoria->fetch(PDO::FETCH_ASSOC);

    // Se a categoria for encontrada, armazenamos o ID
    if ($categoria) {
        $id_categoria = $categoria['id'];
    } else {
        // Caso a categoria não seja encontrada, você pode lançar um erro ou fazer algum outro tratamento
        die("Categoria não encontrada!");
    }

    // Passo 2: Inserir o produto na tabela produto com o id_categoria
    $sql_produto = "INSERT INTO produto 
                    (nome, imagem, preco, unidades, descricao, fornecedor, transportadora, id_categoria) 
                    VALUES 
                    (:nome_produto, :imagem_produto, :preco_produto, :estoque_produto, :descricao_produto, :fornecedor, :transportadora, :id_categoria)";

    // Preparar a consulta para inserir o produto
    $stmt_produto = $conn->prepare($sql_produto);

    // Vincular os parâmetros
    $stmt_produto->bindParam(':nome_produto', $nome_produto);
    $stmt_produto->bindParam(':imagem_produto', $imagem_destino);
    $stmt_produto->bindParam(':preco_produto', $preco_produto);
    $stmt_produto->bindParam(':estoque_produto', $estoque_produto);
    $stmt_produto->bindParam(':descricao_produto', $descricao_produto);
    $stmt_produto->bindParam(':fornecedor', $fornecedor);
    $stmt_produto->bindParam(':transportadora', $transportadora);
    $stmt_produto->bindParam(':id_categoria', $id_categoria);

    // Executar a consulta
    $stmt_produto->execute();

    echo "Produto inserido com sucesso!";

} else {
    echo "Requisição inválida.";
}
?>
