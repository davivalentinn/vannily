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
                <label for="productCategory">Categoria</label>
                <select id="productCategory" name="categoria_produto" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="jogos">Jogos</option>
                    <option value="roupas">Roupas</option>
                </select>
            </div>

            <div id="jogosFields" class="category-fields hidden">
                <div class="form-group">
                    <label for="gameType">Tipo de Jogo</label>
                    <select id="gameType" name="tipo_jogo">
                        <option value="tabuleiro">Tabuleiro</option>
                        <option value="cartas">Cartas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="players">Número de Jogadores</label>
                    <input type="text" id="players" name="numero_jogadores" placeholder="Ex: 2-4">
                </div>

                <div class="form-group">
                    <label for="gameTime">Tempo de Jogo (minutos)</label>
                    <input type="number" name="tempo_jogo" id="gameTime" min="1">
                </div>
            </div>

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
            </div>

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

    <script src="js/script.js"></script>
</body>

</html>