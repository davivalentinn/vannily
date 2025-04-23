<?php
require_once("../../backend/verifyAdmin.php");

// Garante que só admin acesse
verificaTipo('admin');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard de Produtos</title>
</head>

<body>
    <div class="container">
        <h1>Dashboard de Produtos</h1>

        <form action="../../backend/products/add_product.php" id="productForm" method="post"
            enctype="multipart/form-data">
            <input type="hidden" id="productId">

            <div class="form-group">
                <label for="productName">Nome do Produto</label>
                <input type="text" id="productName" name="nome_produto" required>
            </div>

            <div class="form-group">
                <label for="productImage">Imagem do Produto</label>
                <input type="file" id="productImage" name="imagem_produto" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="productPrice">Preço (R$)</label>
                <input type="number" id="productPrice" name="preco_produto" min="0" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                <input type="text" id="fornecedor" name="fornecedor" required>
            </div>

            <div class="form-group">
                <label for="transportadora">Transportadora</label>
                <input type="text" id="transportadora" name="transportadora" required>
            </div>

            <div class="form-group">
                <label for="productCategory">Categoria</label>
                <select id="productCategory" name="categoria_produto" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="jogos">Jogos</option>
                    <option value="roupas">Roupas</option>
                </select>
            </div>

            <!-- JOGOS -->
            <div id="jogosFields" class="category-fields hidden">
                <div class="form-group">
                    <label for="gameType">Tipo de Jogo</label>
                    <select id="gameType" name="tipo_jogo">
                        <option value="tabuleiro">Tabuleiro</option>
                        <option value="cartas">Cartas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tema">Tema</label>
                    <input type="text" id="tema" name="tema">
                </div>

                <div class="form-group">
                    <label for="genero">Gênero</label>
                    <input type="text" id="genero" name="genero">
                </div>

                <div class="form-group">
                    <label for="classificacao">Classificação Indicativa</label>
                    <input type="text" id="classificacao" name="classificacao">
                </div>

                <div class="form-group">
                    <label for="players">Número de Jogadores</label>
                    <input type="text" id="players" name="numero_jogadores" placeholder="Ex: 2-4">
                </div>

                <div class="form-group">
                    <label for="gameTime">Tempo de Jogo (minutos)</label>
                    <input type="number" name="tempo_jogo" id="gameTime" min="1">
                </div>

                <!-- Jogo de Cartas -->
                <div id="cartasFields" class="subtipo-fields hidden">
                    <div class="form-group">
                        <label for="tipo_baralho">Tipo de Baralho</label>
                        <input type="text" name="tipo_baralho" id="tipo_baralho">
                    </div>

                    <div class="form-group">
                        <label for="tamanho_cartas">Tamanho das Cartas</label>
                        <input type="text" name="tamanho_cartas" id="tamanho_cartas">
                    </div>

                    <div class="form-group">
                        <label for="material_cartas">Material das Cartas</label>
                        <input type="text" name="material_cartas" id="material_cartas">
                    </div>

                    <div class="form-group">
                        <label for="tipo_jogo_cartas">Tipo de Jogo</label>
                        <input type="text" name="tipo_jogo_cartas" id="tipo_jogo_cartas">
                    </div>

                    <div class="form-group">
                        <label for="numero_cartas">Número de Cartas</label>
                        <input type="number" name="numero_cartas" id="numero_cartas" min="1">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="ilustrado" id="ilustrado">
                        <label for="ilustrado">Ilustrado</label>
                    </div>
                </div>

                <!-- Jogo de Tabuleiro -->
                <div id="tabuleiroFields" class="subtipo-fields hidden">
                    <div class="form-group">
                        <label for="qtd_pecas">Quantidade de Peças</label>
                        <input type="number" name="qtd_pecas" id="qtd_pecas" min="1">
                    </div>

                    <div class="form-group">
                        <label for="tamanho_tabuleiro">Tamanho do Tabuleiro</label>
                        <input type="text" name="tamanho_tabuleiro" id="tamanho_tabuleiro">
                    </div>

                    <div class="form-group">
                        <label for="material_tabuleiro">Material do Tabuleiro</label>
                        <input type="text" name="material_tabuleiro" id="material_tabuleiro">
                    </div>

                    <div class="form-group">
                        <label for="tipo_tabuleiro">Tipo do Tabuleiro</label>
                        <input type="text" name="tipo_tabuleiro" id="tipo_tabuleiro">
                    </div>

                    <div class="form-group">
                        <label for="complexidade">Complexidade</label>
                        <input type="text" name="complexidade" id="complexidade">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="possui_cartas" id="possui_cartas">
                        <label for="possui_cartas">Possui Cartas</label>
                    </div>
                </div>
            </div>

            <!-- ROUPAS -->
            <div id="roupasFields" class="category-fields hidden">
                <div class="form-group">
                    <label for="clothingType">Tipo de Roupa</label>
                    <select id="clothingType" name="tipo_roupa">
                        <option value="camisa">Camisa</option>
                        <option value="moletom">Moletom</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="size">Tamanho</label>
                    <select id="size" name="tamanho_roupa">
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="GG">GG</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="color">Cor</label>
                    <input type="text" name="cor_roupa" id="color">
                </div>

                <div class="form-group">
                    <label for="dimensoes">Dimensões (cm)</label>
                    <input type="text" name="dimensoes" id="dimensoes">
                </div>

                <div class="form-group">
                    <label for="numero_modelo">Número do Modelo</label>
                    <input type="text" name="numero_modelo" id="numero_modelo">
                </div>

                <!-- Camisa -->
                <div id="camisaFields" class="subtipo-fields hidden">
                    <div class="form-group">
                        <label for="tipo_gola">Tipo de Gola</label>
                        <input type="text" name="tipo_gola" id="tipo_gola">
                    </div>

                    <div class="form-group">
                        <label for="tipo_manga">Tipo de Manga</label>
                        <input type="text" name="tipo_manga" id="tipo_manga">
                    </div>

                    <div class="form-group">
                        <label for="tecido">Tecido</label>
                        <input type="text" name="tecido" id="tecido">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="possui_bolsos" id="possui_bolsos">
                        <label for="possui_bolsos">Possui Bolsos</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="estampa_personalizada" id="estampa_personalizada">
                        <label for="estampa_personalizada">Estampa Personalizada</label>
                    </div>
                </div>

                <!-- Moletom -->
                <div id="moletomFields" class="subtipo-fields hidden">
                    <div class="form-group">
                        <input type="checkbox" name="tipo_capuz" id="tipo_capuz">
                        <label for="tipo_capuz">Possui Capuz</label>
                    </div>

                    <div class="form-group">
                        <label for="espessura_tecido">Espessura do Tecido</label>
                        <input type="text" name="espessura_tecido" id="espessura_tecido">
                    </div>

                    <div class="form-group">
                        <label for="material_forro">Material do Forro</label>
                        <input type="text" name="material_forro" id="material_forro">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="possui_ziper" id="possui_ziper">
                        <label for="possui_ziper">Possui Zíper</label>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="resistente_agua" id="resistente_agua">
                        <label for="resistente_agua">Resistente à Água</label>
                    </div>
                </div>
            </div>

            <!-- CAMPOS COMUNS -->
            <div class="form-group">
                <label for="productDescription">Descrição</label>
                <input type="text" name="descricao_produto" id="productDescription">
            </div>

            <div class="form-group">
                <label for="productStock">Estoque</label>
                <input type="number" name="estoque_produto" id="productStock" min="0" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn" id="saveBtn">Adicionar Produto</button>
                <button id="limparProdutos" class="btn">Limpar Produtos</button>

            </div>
        </form>



        <div class="product-list">
            <h2>Lista de Produtos</h2>
            <table id="productsTable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Tipo</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="productsTableBody">
                    <!-- Produtos serão inseridos aqui via JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById("limparProdutos").addEventListener("click", () => {
            localStorage.removeItem("produtos");
            alert("Todos os produtos foram removidos.");
        });
    </script>
    <script src="js/script.js"></script>
</body>

</html>