<?php


require_once("../dbconexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Dados básicos do produto
    $nome_produto = $_POST['nome_produto'] ?? '';
    $preco_produto = $_POST['preco_produto'] ?? 0;
    $categoria_produto = $_POST['categoria_produto'] ?? '';
    $descricao_produto = $_POST['descricao_produto'] ?? null;
    $estoque_produto = $_POST['estoque_produto'] ?? 0;
    $fornecedor = $_POST['fornecedor'] ?? '';
    $transportadora = $_POST['transportadora'] ?? '';
    
    // Convertendo a categoria para ID numérico para o banco
    $id_categoria = 0;
    if ($categoria_produto == 'jogos') {
        $id_categoria = 1;
    } elseif ($categoria_produto == 'roupas') {
        $id_categoria = 2;
    }

    // Tratamento da imagem
    $imagem_nome = $_FILES['imagem_produto']['name'] ?? '';
    $imagem_temp = $_FILES['imagem_produto']['tmp_name'] ?? '';
    $caminho_destino = "../../assets/images/products_db/" . basename($imagem_nome);

    try {
        if (move_uploaded_file($imagem_temp, $caminho_destino)) {
            // Inserção na tabela principal
            $sql = "INSERT INTO produto (nome, imagem, preco, desconto, unidades, descricao, fornecedor, transportadora, id_categoria)
                    VALUES (?, ?, ?, 0, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $nome_produto,
                $imagem_nome,
                $preco_produto,
                $estoque_produto,
                $descricao_produto,
                $fornecedor,
                $transportadora,
                $id_categoria  // Agora usando o ID numérico
            ]);

            $id_produto = $conn->lastInsertId();

            // Categoria: JOGOS
            if ($categoria_produto === 'jogos') {
                $tema = $_POST['tema'] ?? '';
                $genero = $_POST['genero'] ?? '';
                $qtd_pessoas = $_POST['numero_jogadores'] ?? 0;
                $classificacao = $_POST['classificacao'] ?? '';
                $duracao = $_POST['tempo_jogo'] ?? '';
                $tipo_jogo = $_POST['tipo_jogo'] ?? '';

                $sql_jogo = "INSERT INTO produto_jogo (id_produto, tema, genero, qtd_pessoas, classificacao_indicativa, duracao)
                             VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql_jogo);
                $stmt->execute([
                    $id_produto,
                    $tema,
                    $genero,
                    $qtd_pessoas,
                    $classificacao,
                    $duracao
                ]);

                if ($tipo_jogo === 'cartas') {
                    $sql_cartas = "INSERT INTO jogo_cartas (id_produto, tipo_baralho, tamanho_cartas, material_cartas, tipo_jogo, numero_cartas, ilustrado)
                                   VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql_cartas);
                    $stmt->execute([
                        $id_produto,
                        $_POST['tipo_baralho'] ?? '',
                        $_POST['tamanho_cartas'] ?? '',
                        $_POST['material_cartas'] ?? '',
                        $_POST['tipo_jogo_cartas'] ?? '',
                        $_POST['numero_cartas'] ?? 0,
                        isset($_POST['ilustrado']) ? 1 : 0
                    ]);
                } elseif ($tipo_jogo === 'tabuleiro') {
                    $sql_tabuleiro = "INSERT INTO jogo_tabuleiro (id_produto, qtd_pecas, tamanho_tabuleiro, material_tabuleiro, tipo_tabuleiro, complexidade, possui_cartas)
                                      VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql_tabuleiro);
                    $stmt->execute([
                        $id_produto,
                        $_POST['qtd_pecas'] ?? 0,
                        $_POST['tamanho_tabuleiro'] ?? '',
                        $_POST['material_tabuleiro'] ?? '',
                        $_POST['tipo_tabuleiro'] ?? '',
                        $_POST['complexidade'] ?? '',
                        isset($_POST['possui_cartas']) ? 1 : 0
                    ]);
                }
            }

            // Categoria: ROUPAS
            elseif ($categoria_produto === 'roupas') {
                $tipo_roupa = $_POST['tipo_roupa'] ?? '';

                $sql_roupa = "INSERT INTO produto_roupa (id_produto, tamanho, cor, dimensoes, numero_modelo)
                              VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql_roupa);
                $stmt->execute([
                    $id_produto,
                    $_POST['tamanho_roupa'] ?? '',
                    $_POST['cor_roupa'] ?? '',
                    $_POST['dimensoes'] ?? '',
                    $_POST['numero_modelo'] ?? ''
                ]);

                if ($tipo_roupa === 'camisa') {
                    $sql_camisa = "INSERT INTO camisa (id_produto, tipo_gola, tipo_manga, tecido, possui_bolsos, estampa_personalizada)
                                   VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql_camisa);
                    $stmt->execute([
                        $id_produto,
                        $_POST['tipo_gola'] ?? '',
                        $_POST['tipo_manga'] ?? '',
                        $_POST['tecido'] ?? '',
                        isset($_POST['possui_bolsos']) ? 1 : 0,
                        isset($_POST['estampa_personalizada']) ? 1 : 0
                    ]);
                } elseif ($tipo_roupa === 'moletom') {
                    $sql_moletom = "INSERT INTO moletom (id_produto, tipo_capuz, espessura_tecido, material_forro, possui_ziper, resistente_agua)
                                    VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql_moletom);
                    $stmt->execute([
                        $id_produto,
                        isset($_POST['tipo_capuz']) ? 1 : 0,
                        $_POST['espessura_tecido'] ?? '',
                        $_POST['material_forro'] ?? '',
                        isset($_POST['possui_ziper']) ? 1 : 0,
                        isset($_POST['resistente_agua']) ? 1 : 0
                    ]);
                }
            }

            // Redireciona após sucesso
            header("Location: ../../pages/admin/index.php?sucesso=1");
            exit();
        } else {
            echo "Erro ao enviar a imagem.";
        }
    } catch (PDOException $e) {
        echo "Erro no banco de dados: " . $e->getMessage();
    }
} else {
    echo "Requisição inválida.";
}
?>