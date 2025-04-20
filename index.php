<?php

session_start();

$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$email_usuario = isset($_SESSION['email_usuario']) ? $_SESSION['email_usuario'] : null;
$nome_completo_usuario = isset($_SESSION['nome_completo_usuario']) ? $_SESSION['nome_completo_usuario'] : null;
$numero_usuario = isset($_SESSION['numero_usuario']) ? $_SESSION['numero_usuario'] : null;
$data_criacao_usuario = isset($_SESSION['data_criacao_usuario']) ? $_SESSION['data_criacao_usuario'] : null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <title>Vannily</title>
</head>

<body>

    <header class="header">
        <nav class="container-fluid">
            <div class="d-flex gap-3 justify-content-center align-items-center">
                <div class="">
                    <a href="index.html" class="nav-logo-img col">
                        <img src="assets/images/logo/logo.svg" alt="">
                    </a>
                </div>
                <div class="">
                    <a href="#" class="button-localizar-cep">

                        <div class="circle-cep">
                            <i class="ri-map-pin-line"></i>
                        </div>


                        <div class="">
                            <p class="">Informe seu cep</p>
                        </div>

                    </a>
                </div>
                <div class="w-50 barra-de-navegacao">
                    <form action="#" class="form-pesquisa">
                        <div class="row g-0">
                            <div class="col-auto">
                                <select name="filtro-pesquisa" class="form-select custom-select">
                                    <option value="todos" enable>Todos</option>
                                    <option value="boardgames">Board-Games</option>
                                    <option value="cardgames">Card-Games</option>
                                    <option value="perifericos">Perifericos</option>
                                    <option value="camisas">Camisas</option>
                                    <option value="moletom">Moletom</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" name="buscarproduto" class="form-control search-input"
                                    placeholder="Pesquisa por: BoardGames, CardGames, Periféricos, Modageek">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn search-button">
                                    <i class="ri-search-line search-icon"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="icones-menu">
                    <div class="favoritos-menu">
                        <i class="ri-heart-add-line "></i>
                    </div>
                    <div class="carrinho-menu">
                        <a href="pages/carrinho/index.html"><i class="ri-shopping-cart-2-line"></i></a>
                    </div>




                    <!-- Se tiver uma sessao de usuario, aparecera estas propriedades -->
                    <?php if (isset($_SESSION['id_usuario'])): ?>
                        <div href="#" class="button-account-user">
                            <div class="dados-usuario-session">
                                <p>Olá, <span><?= $_SESSION['usuario'] ?></span></p>
                            </div>

                            <div class="circle-cep">
                                <a href="#" class="header__action-btn">

                                    <i class="ri-user-3-line" onclick="toggleMenuUser()"></i>
                                </a>
                            </div>

                            <div class="sub-menu-wrap" id="subMenuUser">
                                <div class="sub-menu-user">
                                    <div class="user-info">

                                        <i class="ri-user-line"></i>


                                        <h3>Bem vindo <span><?= $_SESSION['nome_completo_usuario'] ?></span></h3>

                                    </div>
                                    <hr>

                                    <?php if (isset($_SESSION['email_usuario'])): ?>
                                        <a href='pages/perfil/index.php' class='sub-menu-link'>
                                            <i class='ri-user-settings-line'></i>
                                            <p>Meu perfil</p>
                                            <span><i class="ri-arrow-right-s-line"></i></span>
                                        </a>
                                    <?php endif; ?>

                                    <?php
                                    if (isset($_SESSION['email_usuario'])): ?>
                                        <a href="backend/account/logout.php" class="sub-menu-link">
                                            <i class="ri-logout-box-r-line" class="icone-logout"></i>
                                            <p>Sair da Conta</p>
                                            <span><i class="ri-arrow-right-s-line"></i></span>
                                        </a>

                                    <?php endif; ?>

                                </div>

                            </div>
                        </div>
                    </div>



                    <style>
                        .dados-usuario-session p {
                            margin: 0 auto;
                        }

                        .dados-usuario-session span {
                            font-weight: 700;
                        }


                        /*MENU DROPDOWN USUARIO*/
                        .sub-menu-wrap {
                            position: absolute;
                            top: 10%;
                            right: 25px;
                            width: 320px;
                            z-index: 1000;
                            max-height: 0px;
                            overflow: hidden;
                            transition: max-height 0.5s;

                        }

                        .sub-menu-wrap.open-menu {
                            max-height: 400px;
                            transition: all 0.2s var(--transition);
                        }

                        .sub-menu-user {
                            background-color: #8B1689;
                            border: 2px solid #353535;
                            padding: 20px;
                            margin: 10px;
                            border-radius: 5px;
                            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
                        }

                        .sub-menu-link-user {
                            text-decoration: none;
                            color: #ffffff;
                            font-weight: 600;
                        }

                        .user-info h3 span {
                            font-weight: 600;
                        }


                        .user-info {
                            display: flex;
                            align-items: center;
                        }

                        .user-info h3 {
                            font-size: 15px;
                            font-weight: 300;
                        }

                        .user-info i {
                            font-size: 20px;
                            margin-right: 15px;
                        }

                        .sub-menu hr {
                            border: 0;
                            height: 1px;
                            width: 100%;
                            margin: 15px 0 10px;
                            background-color: #353535;
                        }

                        .sub-menu-link {
                            display: flex;
                            align-items: center;
                            text-decoration: none;
                            color: var(--second--color);

                        }

                        .sub-menu-link:hover p {
                            font-weight: 600;
                        }

                        .sub-menu-link p {
                            width: 100%;
                            margin: 0 auto;
                        }

                        .sub-menu-link span {
                            font-size: 20px;
                            transition: transform 0.5s;
                        }

                        .sub-menu-link:hover span {
                            transform: translateX(5px);
                        }



                        .sub-menu-link i {
                            font-size: 20px;
                            padding: 8px;
                            margin-right: 15px;

                            color: var(--text-color);
                        }
                    </style>

                <?php endif; ?>


                <!-- Senao tiver uma sessao de usuario, oculta estas propriedades -->
                <?php
                if (!isset($_SESSION['id_usuario'])): ?>
                    <div class="button-account-user">
                        <div>
                            <a href="pages/account/register/index.php">Registrar</a> ou
                            <a href="pages/account/login/index.php">Entrar</a>
                        </div>

                        <div class="circle-cep">
                            <a href="#" class="">

                                <i class="ri-user-3-line"></i>
                            </a>
                        </div>

                    </div>



                <?php endif; ?>
            </div>






        </nav>
    </header>

    <div class="sub-menu d-flex container-fluid justify-content-evenly align-items-center">
        <div class="categorias-sub-menu d-flex">
            <li class="nav-item dropdown p-2">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Catalógo
                </a>
                <ul class="dropdown-menu mt-3">
                    <li><a class="dropdown-item" href="#">Board Games</a></li>

                    <li><a class="dropdown-item" href="#">Card Games</a></li>

                    <li><a class="dropdown-item" href="#">Perifericos</a></li>

                    <li><a class="dropdown-item" href="#">Camisas</a></li>
                    <li><a class="dropdown-item" href="#">Moletom</a></li>

                </ul>
            </li>
            <a href="#" class="p-2">Mais Vendidos</a>
            <li class="nav-item dropdown p-2">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Moda Geek
                </a>
                <ul class="dropdown-menu mt-3">
                    <li><a class="dropdown-item" href="#">Camisas</a></li>
                    <li><a class="dropdown-item" href="#">Moletom</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown p-2">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    BoardGames
                </a>
                <ul class="dropdown-menu mt-3">
                    <li>
                        <h6 class="dropdown-header">Genêros de Board Games</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Estratégia (Strategy)</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Cooperativo (Cooperative)</a></li>
                    <li><a class="dropdown-item" href="#">Party Game (Festas e Grupos)</a></li>
                    <li><a class="dropdown-item" href="#">Deck Building (Construção de Baralho) </a></li>
                    <li><a class="dropdown-item" href="#">Dedução/Investigação</a></li>

                </ul>
            </li>
            <a href="#" class="p-2">Destaques</a>
        </div>

        <div class="infor-site d-flex">
            <li class="p-2">
                <a href="#">Meus pedidos</a>
            </li>
            <li class="p-2">
                <a href="#">Devoluções e reembolso</a>
            </li>
            <li class="p-2">
                <a href="#">Sobre-nós</a>
            </li>
            <li class="p-2">
                <a href="#">Contato</a>
            </li>
            <li class="p-2">
                <a href="#">Suporte</a>
            </li>
        </div>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="assets/images/carousel/image.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex justify-content-center">
                    <div class="button-slider d-flex justify-content-evenly align-items-center mb-4">
                        <a href="#">Conhecer categoria</a>
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/images/carousel/image-2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex justify-content-center">
                    <div class="button-slider d-flex justify-content-evenly align-items-center mb-4">
                        <a href="#">Conhecer categoria</a>
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/images/carousel/image-3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex justify-content-center">
                    <div class="button-slider d-flex justify-content-evenly align-items-center mb-4">
                        <a href="#">Conhecer categoria</a>
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/images/carousel/image-4.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex justify-content-center">
                    <div class="button-slider d-flex justify-content-evenly align-items-center mb-4">
                        <a href="#">Conhecer categoria</a>
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/images/carousel/image-5.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex justify-content-center">
                    <div class="button-slider d-flex justify-content-evenly align-items-center mb-4">
                        <a href="#">Conhecer categoria</a>
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="seta-slider" aria-hidden="true"><i class="ri-arrow-left-line"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="seta-slider" aria-hidden="true"><i class="ri-arrow-right-line"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-destaque-products">
        <div class="carousel-destaque-products">

            <div class="destaque-data container">
                <!--Informacoes dos cards-->
                <div class="product-info-destaque-products">
                    <h2 class="product-title-destaque-products" id="product-title-destaque-products">Ticket to Ride</h2>
                    <p class="product-description-destaque-products" id="product-description-destaque-products">
                        Ticket to Ride é uma aventura de trem rail através dos Estados
                        Unidos e Canadá, onde alguns velhos amigos se reuniram para
                        celebrar a aposta ousada e lucrativa de Fogg. A nova aposta
                        onde é tudo ou nada, com objetivo de ver quem consegue viajar
                        de trem pelo maior número de cidades nos EUA em apenas 7
                        dias.
                    </p>

                    <div class="content-elements-destaque">
                        <div class="content-elements-price">
                            <div class="product-price-destaque-products" id="product-price-destaque-products">
                                R$ 329,99
                                <span class="product-original-price-destaque-products">R$ 399,99</span>
                            </div>
                            <p class="product-installments-destaque-products"
                                id="product-installments-destaque-products">
                                ou 6x de 54,99 sem juros
                            </p>
                        </div>
                        <div class="action-buttons-destaque-products">
                            <button class="wishlist-button-destaque-products">
                                <div class="favoritos-menu">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>
                            </button>
                            <a href="#" class="add-to-cart-destaque-products">Adicionar ao carrinho</a>
                        </div>
                    </div>
                </div>
                <!--Imagens dos cards-->
                <div class="image-gallery-destaque-products">
                    <button class="nav-button-destaque-products nav-button-prev-destaque-products"><i
                            class="ri-arrow-left-line setinha"></i></button>
                    <div class="image-container-destaque-products" id="prev-image-destaque-products">
                        <img src="assets/images/destaque-board-games/marvel-united.png" alt="Produto Anterior"
                            class="product-image-destaque-products">
                    </div>
                    <div class="image-container-destaque-products active-destaque-products"
                        id="current-image-destaque-products">
                        <img src="assets/images/destaque-board-games/ticket-to-ride.png" alt="Produto Atual"
                            class="product-image-destaque-products">
                    </div>
                    <div class="image-container-destaque-products" id="next-image-destaque-products">
                        <img src="assets/images/destaque-board-games/kelp.png" alt="Próximo Produto"
                            class="product-image-destaque-products">
                    </div>
                    <button class="nav-button-destaque-products nav-button-next-destaque-products"><i
                            class="ri-arrow-right-line setinha"></i></button>
                </div>
            </div>


        </div>
    </div>

    <main>

        <section class="container-products products-main">
            <div class="header-products">
                <h1>Produtos em Promoção</h1>
            </div>

            <div class="slider-container">
                <div class="slider-pagination">
                    <span class="current-page">01</span> - <span class="total-pages">02</span>
                </div>
                <div class="products-slider">

                    <div class="slider-wrapper">
                        <!-- Group 1 -->
                        <div class="product-group">

                            <!-- Product 1 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/moletom-demon-slayer-unissex-anime-tajiro.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Demon Slayer - Unisex Anime Tanjiro</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 299,99</div>
                                    <div class="current-price">
                                        <p>R$ 129,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 2 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/the-mind.png" alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+8</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>2 a 4</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>15min</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">The Mind</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 229,99</div>
                                    <div class="current-price">
                                        <p>R$ 299,99</p>

                                        <div><span class="discount-badge">-26%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 9,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 3 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Headset-Gamer-RGB-Blackfire-FORTREK.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Headset Gamer RGB Blackfire FORTREK</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 119,99</div>
                                    <div class="current-price">
                                        <p>R$ 99,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">6x de R$ 21,45 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 4 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Camiseta-Gamer-Geek-Mario-Bros-Arcade.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Camiseta Gamer Geek - Mario Bros Arcade</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 149,99</div>
                                    <div class="current-price">
                                        <p>R$ 119,99</p>

                                        <div><span class="discount-badge">-22%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 5 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Cartas-Contra-a-Humanidade.png"
                                        alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+18</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>3 a 5</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>2h</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">Cartas Contra a Humanidade</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 299,99</div>
                                    <div class="current-price">
                                        <p>R$ 129,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <!-- Group 2 -->
                        <div class="product-group">
                            <!-- Product 1 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Moletom-Anime-Geek-Tanjiro-Uniforme.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Anime Geek - Tanjiro Uniforme</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 299,99</div>
                                    <div class="current-price">
                                        <p>R$ 259,99</p>

                                        <div><span class="discount-badge">-11%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 8,23 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 2 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Camiseta-One-Piece-Ace-Camisa-Anime.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Camiseta One Piece Ace Camisa Anime</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 89,99</div>
                                    <div class="current-price">
                                        <p>R$ 79,99</p>

                                        <div><span class="discount-badge">-5%</span></div>
                                    </div>
                                    <div class="installment">22x de R$ 40,00 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 3 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Dobble.png" alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+6</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>2 a 8</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>15min</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">Dobble</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 99,99</div>
                                    <div class="current-price">
                                        <p>R$ 89,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 4 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Historias-Sinistras.png"
                                        alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+6</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>2 a 8</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>15min</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">Histórias Sinistras</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 79,99</div>
                                    <div class="current-price">
                                        <p>R$ 49,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">4x de R$ 12,50 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 5 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Moletom-Anime-Geek-Sasuke-Uchiha.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Anime Geek - Sasuke Uchiha</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 169,99</div>
                                    <div class="current-price">
                                        <p>R$ 149,99</p>

                                        <div><span class="discount-badge">-26%</span></div>
                                    </div>
                                    <div class="installment">3x de R$ 50,42 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <button class="slider-nav prev-btn"><i class="ri-arrow-left-line"></i></button>
                <button class="slider-nav next-btn""><i class=" ri-arrow-right-line"></i></button>
            </div>
        </section>
        <section class="container-products products-main">
            <div class="header-products">
                <h1>Roupas estilo geek</h1>
            </div>

            <div class="slider-container">
                <div class="slider-pagination">
                    <span class="current-page">01</span> - <span class="total-pages">02</span>
                </div>
                <div class="products-slider">

                    <div class="slider-wrapper">
                        <!-- Group 1 -->
                        <div class="product-group">

                            <!-- Product 1 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/moletom-demon-slayer-unissex-anime-tajiro.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Demon Slayer - Unisex Anime Tanjiro</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 299,99</div>
                                    <div class="current-price">
                                        <p>R$ 129,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 2 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Moletom-Anime-Geek-Tanjiro-Uniforme.png"
                                        alt="Moletom Demon Slayer">


                                </div>
                                <h1 class="product-title">Moletom Anime Geek - Tanjiro Uniforme</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 329,99</div>
                                    <div class="current-price">
                                        <p>R$ 299,99</p>

                                        <div><span class="discount-badge">-86%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 9,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 3 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Moletom-Anime-Geek-Sasuke-Uchiha.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Anime Geek - Sasuke Uchiha</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 239,99</div>
                                    <div class="current-price">
                                        <p>R$ 200,99</p>

                                        <div><span class="discount-badge">40%</span></div>
                                    </div>
                                    <div class="installment">6x de R$ 21,45 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 4 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Camiseta-One-Piece-Ace-Camisa-Anime.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Camiseta One Piece Ace Camisa Anime</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 149,99</div>
                                    <div class="current-price">
                                        <p>R$ 119,99</p>

                                        <div><span class="discount-badge">-22%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 5 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Camiseta-Gamer-Geek-Mario-Bros-Arcade.png"
                                        alt="Moletom Demon Slayer">

                                </div>
                                <h1 class="product-title">Camiseta Gamer Geek - Mario Bros Arcade</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 289,99</div>
                                    <div class="current-price">
                                        <p>R$ 189,99</p>

                                        <div><span class="discount-badge">-50%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <!-- Group 2 -->
                        <div class="product-group">
                            <!-- Product 1 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Moletom-Anime-Geek-Tanjiro-Uniforme.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Anime Geek - Tanjiro Uniforme</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 299,99</div>
                                    <div class="current-price">
                                        <p>R$ 259,99</p>

                                        <div><span class="discount-badge">-11%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 8,23 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 2 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Camiseta-One-Piece-Ace-Camisa-Anime.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Camiseta One Piece Ace Camisa Anime</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 89,99</div>
                                    <div class="current-price">
                                        <p>R$ 79,99</p>

                                        <div><span class="discount-badge">-5%</span></div>
                                    </div>
                                    <div class="installment">22x de R$ 40,00 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 3 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Dobble.png" alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+6</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>2 a 8</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>15min</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">Dobble</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 99,99</div>
                                    <div class="current-price">
                                        <p>R$ 89,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 4 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Historias-Sinistras.png"
                                        alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+6</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>2 a 8</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>15min</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">Histórias Sinistras</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 79,99</div>
                                    <div class="current-price">
                                        <p>R$ 49,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">4x de R$ 12,50 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 5 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Moletom-Anime-Geek-Sasuke-Uchiha.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Anime Geek - Sasuke Uchiha</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 169,99</div>
                                    <div class="current-price">
                                        <p>R$ 149,99</p>

                                        <div><span class="discount-badge">-26%</span></div>
                                    </div>
                                    <div class="installment">3x de R$ 50,42 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <button class="slider-nav prev-btn"><i class="ri-arrow-left-line"></i></button>
                <button class="slider-nav next-btn""><i class=" ri-arrow-right-line"></i></button>
            </div>
        </section>
        <section class="container-notifications">
            <div class="content-notifications">
                <div class="notifications-data container">
                    <div class="product-info-notifications">
                        <h2 class="product-title-notifications" id="product-title-destaque-products">Não fique de fora
                        </h2>
                        <p class="product-description-notifications" id="product-description-destaque-products">
                            Inscreva-se para não perder as novidades, lançamentos e promoções!
                        </p>

                    </div>

                    <div class="rows">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-notification" placeholder="Digite seu nome">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="email" class="form-notification" id="floatingInputGrid"
                                        placeholder="Digite seu email">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-floating mt-2" id="floatingInputgrid">
                                    <input type="submit" class="button-notification" value="Enviar">
                                </div>
                            </div>
                        </div>
                    </div>



                </div>


            </div>
        </section>
        <section class="container-products products-main">
            <div class="header-products">
                <h1>Lançamento</h1>
            </div>

            <div class="slider-container">
                <div class="slider-pagination">
                    <span class="current-page">01</span> - <span class="total-pages">02</span>
                </div>
                <div class="products-slider">

                    <div class="slider-wrapper">
                        <!-- Group 1 -->
                        <div class="product-group">

                            <!-- Product 1 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/moletom-demon-slayer-unissex-anime-tajiro.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Demon Slayer - Unisex Anime Tanjiro</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 299,99</div>
                                    <div class="current-price">
                                        <p>R$ 129,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 2 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/the-mind.png" alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+8</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>2 a 4</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>15min</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">The Mind</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 229,99</div>
                                    <div class="current-price">
                                        <p>R$ 299,99</p>

                                        <div><span class="discount-badge">-26%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 9,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 3 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Headset-Gamer-RGB-Blackfire-FORTREK.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Headset Gamer RGB Blackfire FORTREK</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 119,99</div>
                                    <div class="current-price">
                                        <p>R$ 99,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">6x de R$ 21,45 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 4 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Camiseta-Gamer-Geek-Mario-Bros-Arcade.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Camiseta Gamer Geek - Mario Bros Arcade</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 149,99</div>
                                    <div class="current-price">
                                        <p>R$ 119,99</p>

                                        <div><span class="discount-badge">-22%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Product 5 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Cartas-Contra-a-Humanidade.png"
                                        alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+18</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>3 a 5</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>2h</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">Cartas Contra a Humanidade</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 299,99</div>
                                    <div class="current-price">
                                        <p>R$ 129,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <!-- Group 2 -->
                        <div class="product-group">
                            <!-- Product 1 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Moletom-Anime-Geek-Tanjiro-Uniforme.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Anime Geek - Tanjiro Uniforme</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 299,99</div>
                                    <div class="current-price">
                                        <p>R$ 259,99</p>

                                        <div><span class="discount-badge">-11%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 8,23 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 2 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Camiseta-One-Piece-Ace-Camisa-Anime.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Camiseta One Piece Ace Camisa Anime</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 89,99</div>
                                    <div class="current-price">
                                        <p>R$ 79,99</p>

                                        <div><span class="discount-badge">-5%</span></div>
                                    </div>
                                    <div class="installment">22x de R$ 40,00 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 3 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Dobble.png" alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+6</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>2 a 8</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>15min</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">Dobble</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 99,99</div>
                                    <div class="current-price">
                                        <p>R$ 89,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">12x de R$ 10,83 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 4 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Historias-Sinistras.png"
                                        alt="Moletom Demon Slayer">

                                    <div class="infor-jogos">
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                            <p>+6</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                            <p>2 a 8</p>
                                        </div>
                                        <div class="info-1">
                                            <img src="assets/images/products/info-jogos/time.png" alt="">
                                            <p>15min</p>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="product-title">Histórias Sinistras</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 79,99</div>
                                    <div class="current-price">
                                        <p>R$ 49,99</p>

                                        <div><span class="discount-badge">-16%</span></div>
                                    </div>
                                    <div class="installment">4x de R$ 12,50 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                            <!-- Product 5 -->
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/images/products/Moletom-Anime-Geek-Sasuke-Uchiha.png"
                                        alt="Moletom Demon Slayer">
                                </div>
                                <h1 class="product-title">Moletom Anime Geek - Sasuke Uchiha</h1>
                                <div class="product-price">
                                    <div class="original-price">R$ 169,99</div>
                                    <div class="current-price">
                                        <p>R$ 149,99</p>

                                        <div><span class="discount-badge">-26%</span></div>
                                    </div>
                                    <div class="installment">3x de R$ 50,42 sem juros</div>

                                </div>

                                <div class="button-card">
                                    <div class="favoritos-products">
                                        <a href="#"> <i class="ri-heart-add-line"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <button class="slider-nav prev-btn"><i class="ri-arrow-left-line"></i></button>
                <button class="slider-nav next-btn""><i class=" ri-arrow-right-line"></i></button>
            </div>
        </section>
        <section class="category-products products-main">
            <div class="tabs-btns">
                <span class="tab__btn active-tab" data-target="#board-games">Board Games</span>
                <span class="tab__btn" data-target="#card-games">Card Games</span>
                <span class="tab__btn" data-target="#moda-geek">Moda Geek</span>
                <span class="tab__btn" data-target="#moda-geek">Periféricos</span>
            </div>

            <div class="tab-items">
                <div class="tab-item active-tab" content id="board-games">
                    <div class="category-products-container grid">

                        <!-- Product 1 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/moletom-demon-slayer-unissex-anime-tajiro.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Demon Slayer - Unisex Anime Tanjiro</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 129,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 2 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/the-mind.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 4</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">The Mind</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 229,99</div>
                                <div class="current-price">
                                    <p>R$ 299,99</p>

                                    <div><span class="discount-badge">-26%</span></div>
                                </div>
                                <div class="installment">12x de R$ 9,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 3 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Headset-Gamer-RGB-Blackfire-FORTREK.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Headset Gamer RGB Blackfire FORTREK</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 119,99</div>
                                <div class="current-price">
                                    <p>R$ 99,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">6x de R$ 21,45 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 4 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Camiseta-Gamer-Geek-Mario-Bros-Arcade.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Camiseta Gamer Geek - Mario Bros Arcade</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 149,99</div>
                                <div class="current-price">
                                    <p>R$ 119,99</p>

                                    <div><span class="discount-badge">-22%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 5 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Cartas-Contra-a-Humanidade.png"
                                    alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+18</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>3 a 5</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>2h</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Cartas Contra a Humanidade</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 129,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 1 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/moletom-demon-slayer-unissex-anime-tajiro.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Demon Slayer - Unisex Anime Tanjiro</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 129,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 2 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/the-mind.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 4</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">The Mind</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 229,99</div>
                                <div class="current-price">
                                    <p>R$ 299,99</p>

                                    <div><span class="discount-badge">-26%</span></div>
                                </div>
                                <div class="installment">12x de R$ 9,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 3 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Headset-Gamer-RGB-Blackfire-FORTREK.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Headset Gamer RGB Blackfire FORTREK</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 119,99</div>
                                <div class="current-price">
                                    <p>R$ 99,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">6x de R$ 21,45 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 4 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Camiseta-Gamer-Geek-Mario-Bros-Arcade.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Camiseta Gamer Geek - Mario Bros Arcade</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 149,99</div>
                                <div class="current-price">
                                    <p>R$ 119,99</p>

                                    <div><span class="discount-badge">-22%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 5 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Cartas-Contra-a-Humanidade.png"
                                    alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+18</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>3 a 5</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>2h</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Cartas Contra a Humanidade</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 129,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="tab-item" content id="card-games">
                    <div class="category-products-container grid">
                        <!-- Product 1 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Moletom-Anime-Geek-Tanjiro-Uniforme.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Anime Geek - Tanjiro Uniforme</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 259,99</p>

                                    <div><span class="discount-badge">-11%</span></div>
                                </div>
                                <div class="installment">12x de R$ 8,23 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 2 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Camiseta-One-Piece-Ace-Camisa-Anime.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Camiseta One Piece Ace Camisa Anime</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 89,99</div>
                                <div class="current-price">
                                    <p>R$ 79,99</p>

                                    <div><span class="discount-badge">-5%</span></div>
                                </div>
                                <div class="installment">22x de R$ 40,00 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 3 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Dobble.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+6</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Dobble</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 99,99</div>
                                <div class="current-price">
                                    <p>R$ 89,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 4 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Historias-Sinistras.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+6</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Histórias Sinistras</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 79,99</div>
                                <div class="current-price">
                                    <p>R$ 49,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">4x de R$ 12,50 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 5 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Moletom-Anime-Geek-Sasuke-Uchiha.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Anime Geek - Sasuke Uchiha</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 169,99</div>
                                <div class="current-price">
                                    <p>R$ 149,99</p>

                                    <div><span class="discount-badge">-26%</span></div>
                                </div>
                                <div class="installment">3x de R$ 50,42 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>


                        <!-- Product 1 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Moletom-Anime-Geek-Tanjiro-Uniforme.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Anime Geek - Tanjiro Uniforme</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 259,99</p>

                                    <div><span class="discount-badge">-11%</span></div>
                                </div>
                                <div class="installment">12x de R$ 8,23 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 2 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Camiseta-One-Piece-Ace-Camisa-Anime.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Camiseta One Piece Ace Camisa Anime</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 89,99</div>
                                <div class="current-price">
                                    <p>R$ 79,99</p>

                                    <div><span class="discount-badge">-5%</span></div>
                                </div>
                                <div class="installment">22x de R$ 40,00 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 3 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Dobble.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+6</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Dobble</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 99,99</div>
                                <div class="current-price">
                                    <p>R$ 89,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 4 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Historias-Sinistras.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+6</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Histórias Sinistras</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 79,99</div>
                                <div class="current-price">
                                    <p>R$ 49,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">4x de R$ 12,50 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 5 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Moletom-Anime-Geek-Sasuke-Uchiha.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Anime Geek - Sasuke Uchiha</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 169,99</div>
                                <div class="current-price">
                                    <p>R$ 149,99</p>

                                    <div><span class="discount-badge">-26%</span></div>
                                </div>
                                <div class="installment">3x de R$ 50,42 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-item" content id="moda-geek">
                    <div class="category-products-container grid">

                        <!-- Product 1 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/moletom-demon-slayer-unissex-anime-tajiro.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Demon Slayer - Unisex Anime Tanjiro</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 129,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 2 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/the-mind.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 4</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">The Mind</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 229,99</div>
                                <div class="current-price">
                                    <p>R$ 299,99</p>

                                    <div><span class="discount-badge">-26%</span></div>
                                </div>
                                <div class="installment">12x de R$ 9,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 3 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Headset-Gamer-RGB-Blackfire-FORTREK.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Headset Gamer RGB Blackfire FORTREK</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 119,99</div>
                                <div class="current-price">
                                    <p>R$ 99,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">6x de R$ 21,45 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 4 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Camiseta-Gamer-Geek-Mario-Bros-Arcade.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Camiseta Gamer Geek - Mario Bros Arcade</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 149,99</div>
                                <div class="current-price">
                                    <p>R$ 119,99</p>

                                    <div><span class="discount-badge">-22%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 5 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Cartas-Contra-a-Humanidade.png"
                                    alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+18</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>3 a 5</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>2h</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Cartas Contra a Humanidade</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 129,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 1 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/moletom-demon-slayer-unissex-anime-tajiro.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Demon Slayer - Unisex Anime Tanjiro</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 129,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 2 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/the-mind.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 4</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">The Mind</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 229,99</div>
                                <div class="current-price">
                                    <p>R$ 299,99</p>

                                    <div><span class="discount-badge">-26%</span></div>
                                </div>
                                <div class="installment">12x de R$ 9,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 3 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Headset-Gamer-RGB-Blackfire-FORTREK.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Headset Gamer RGB Blackfire FORTREK</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 119,99</div>
                                <div class="current-price">
                                    <p>R$ 99,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">6x de R$ 21,45 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 4 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Camiseta-Gamer-Geek-Mario-Bros-Arcade.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Camiseta Gamer Geek - Mario Bros Arcade</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 149,99</div>
                                <div class="current-price">
                                    <p>R$ 119,99</p>

                                    <div><span class="discount-badge">-22%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                        <!-- Product 5 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Cartas-Contra-a-Humanidade.png"
                                    alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+18</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>3 a 5</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>2h</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Cartas Contra a Humanidade</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 129,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="tab-item" content id="moda-geek">
                    <div class="category-products-container grid">
                        <!-- Product 1 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Moletom-Anime-Geek-Tanjiro-Uniforme.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Anime Geek - Tanjiro Uniforme</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 259,99</p>

                                    <div><span class="discount-badge">-11%</span></div>
                                </div>
                                <div class="installment">12x de R$ 8,23 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 2 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Camiseta-One-Piece-Ace-Camisa-Anime.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Camiseta One Piece Ace Camisa Anime</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 89,99</div>
                                <div class="current-price">
                                    <p>R$ 79,99</p>

                                    <div><span class="discount-badge">-5%</span></div>
                                </div>
                                <div class="installment">22x de R$ 40,00 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 3 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Dobble.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+6</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Dobble</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 99,99</div>
                                <div class="current-price">
                                    <p>R$ 89,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 4 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Historias-Sinistras.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+6</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Histórias Sinistras</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 79,99</div>
                                <div class="current-price">
                                    <p>R$ 49,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">4x de R$ 12,50 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 5 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Moletom-Anime-Geek-Sasuke-Uchiha.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Anime Geek - Sasuke Uchiha</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 169,99</div>
                                <div class="current-price">
                                    <p>R$ 149,99</p>

                                    <div><span class="discount-badge">-26%</span></div>
                                </div>
                                <div class="installment">3x de R$ 50,42 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>


                        <!-- Product 1 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Moletom-Anime-Geek-Tanjiro-Uniforme.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Anime Geek - Tanjiro Uniforme</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 299,99</div>
                                <div class="current-price">
                                    <p>R$ 259,99</p>

                                    <div><span class="discount-badge">-11%</span></div>
                                </div>
                                <div class="installment">12x de R$ 8,23 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 2 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Camiseta-One-Piece-Ace-Camisa-Anime.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Camiseta One Piece Ace Camisa Anime</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 89,99</div>
                                <div class="current-price">
                                    <p>R$ 79,99</p>

                                    <div><span class="discount-badge">-5%</span></div>
                                </div>
                                <div class="installment">22x de R$ 40,00 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 3 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Dobble.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+6</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Dobble</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 99,99</div>
                                <div class="current-price">
                                    <p>R$ 89,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">12x de R$ 10,83 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 4 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Historias-Sinistras.png" alt="Moletom Demon Slayer">

                                <div class="infor-jogos">
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/homem-idoso.png" alt="">
                                        <p>+6</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/grupo-criancas.png" alt="">
                                        <p>2 a 8</p>
                                    </div>
                                    <div class="info-1">
                                        <img src="assets/images/products/info-jogos/time.png" alt="">
                                        <p>15min</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="product-title">Histórias Sinistras</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 79,99</div>
                                <div class="current-price">
                                    <p>R$ 49,99</p>

                                    <div><span class="discount-badge">-16%</span></div>
                                </div>
                                <div class="installment">4x de R$ 12,50 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>

                        <!-- Product 5 -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="assets/images/products/Moletom-Anime-Geek-Sasuke-Uchiha.png"
                                    alt="Moletom Demon Slayer">
                            </div>
                            <h1 class="product-title">Moletom Anime Geek - Sasuke Uchiha</h1>
                            <div class="product-price">
                                <div class="original-price">R$ 169,99</div>
                                <div class="current-price">
                                    <p>R$ 149,99</p>

                                    <div><span class="discount-badge">-26%</span></div>
                                </div>
                                <div class="installment">3x de R$ 50,42 sem juros</div>

                            </div>

                            <div class="button-card">
                                <div class="favoritos-products">
                                    <a href="#"> <i class="ri-heart-add-line"></i>
                                    </a>
                                </div>

                                <div>
                                    <a href="#" class="add-to-cart-products">Adicionar ao carrinho</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/product-slider.js"></script>
</body>

</html>