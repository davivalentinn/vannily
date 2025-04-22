<?php
require_once("../dbconexao.php"); // ou o caminho certo para sua conexão com o banco

// Captura dos dados do formulário
$nome_produto = $_POST['nome_produto'];
$preco_produto = $_POST['preco_produto'];
$categoria_produto = $_POST['categoria_produto'];
$tipo_jogo = $_POST['tipo_jogo'] ?? null;
$numero_jogadores = $_POST['numero_jogadores'] ?? null;
$tempo_jogo = $_POST['tempo_jogo'] ?? null;
$tipo_roupa = $_POST['tipo_roupa'] ?? null;
$tamanho_roupa = $_POST['tamanho_roupa'] ?? null;
$cor_roupa = $_POST['cor_roupa'] ?? null;
$descricao_produto = $_POST['descricao_produto'] ?? null;
$estoque_produto = $_POST['estoque_produto'];

// Upload da imagem
$imagem_nome = $_FILES['imagem_produto']['name'];
$imagem_temp = $_FILES['imagem_produto']['tmp_name'];
$caminho_destino = "../../assets/imagens_produtos/" . basename($imagem_nome);

// Move a imagem para a pasta destino
if (move_uploaded_file($imagem_temp, $caminho_destino)) {
    // Aqui você pode continuar com o INSERT no banco
    // Exemplo básico (ajuste os campos/tabela de acordo com seu banco):
    $sql = "INSERT INTO produtos (
                nome, preco, categoria, tipo_jogo, numero_jogadores, tempo_jogo,
                tipo_roupa, tamanho_roupa, cor_roupa, descricao, estoque, imagem
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $nome_produto, $preco_produto, $categoria_produto, $tipo_jogo,
        $numero_jogadores, $tempo_jogo, $tipo_roupa, $tamanho_roupa,
        $cor_roupa, $descricao_produto, $estoque_produto, $imagem_nome
    ]);

    header("Location: ../../pages/admin/dashboard.php?sucesso=1");
    exit();
} else {
    echo "Erro ao enviar a imagem.";
}
?>
