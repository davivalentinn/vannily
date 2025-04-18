<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <title>Criar Conta - Vannily</title>
</head>

<body>
    <header class="header">
        <nav class="container-fluid">
            <div class="d-flex gap-3 justify-content-center align-items-center">
                <div class="">
                    <a href="../../../index.html" class="nav-logo-img col">
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
                <div class="icones-menu text-center">
                    <div class="favoritos-menu">
                        <i class="ri-heart-add-line "></i>
                    </div>
                    <div class="carrinho-menu">
                        <a href="../../carrinho/index.html"><i class="ri-shopping-cart-2-line"></i></a>
                    </div>

                    <div href="#" class="button-account-user">
                        <div class="">
                            <a href="index.html">Registrar</a> ou
                            <a href="../login/index.html">Entrar</a>
                        </div>
                        <div class="circle-cep">
                            <i class="ri-user-3-line"></i>
                        </div>
                        <div>
                        </div>
                    </div>
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

    <main>
        <section class="container-register container-page">
            <div class="register-title">
                <h1>Criar Conta</h1>
                <span>*Campos obrigatórios</span>
            </div>

            <div class="content">
                <form action="../../../backend/account/register.php" class="form-register" id="form-register">
                    <div class="d-flex justify-content-center container-information">
                        <div class="">
                            <div class="d-flex flex-column oferts-new">
                                <div class="mt-3">
                                    <div class="title-campo">
                                        <h2>Informaçãoes Pessoais</h2>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <input type="text" class="input-register" name="nome" placeholder="*Nome Completo"
                                        required>
                                </div>

                                <div class="mt-3">
                                    <input type="number" class="input-register" name="numero"
                                        placeholder="*DDD e Número de celular" required>
                                </div>

                                <div class="oferts-new mt-4">
                                    <div class=""> <input type="checkbox" class="selecionar-produto" checked>
                                    </div>
                                    <div class="">
                                        <p>
                                            Quero receber <b>ofertas</b> e <b>novidades</b> da loja Vinnaly
                                            por <b>e-mail</b>
                                        </p>
                                    </div>

                                </div>

                                <div class="oferts-new">
                                    <div class=""> <input type="checkbox" class="selecionar-produto" checked>
                                    </div>
                                    <p>Concordo com o uso dos meus dados para compra e experiência no site conforme a
                                        <b>
                                            Política
                                            de privacidade
                                        </b>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="">
                            <div class="d-flex flex-column oferts-new">
                                <div class="mt-3">
                                    <div class="title-campo">
                                        <h2>Sobre sua Conta</h2>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <input type="email" class="input-register" name="email" placeholder="Seu email">
                                </div>
                                <div class="mt-3">
                                    <input type="text" class="input-register" name="usuario"
                                        placeholder="Crie um usuario">
                                </div>
                                <div class="mt-3">
                                    <input type="password" class="input-register" name="senha"
                                        placeholder="Crie uma senha">
                                        <i class="ri-eye-line eye-icon" id="toggleEye" onclick="mostrarSenha()"></i>

                                </div>
                                <div class="mt-3">
                                    <input type="password" class="input-register" name="senha-confirm"
                                        placeholder="Confirmar senha">
                                        <i class="ri-eye-line eye-icon" id="toggleEyeConfirm" onclick="mostrarSenhaConfirm()"></i>

                                    <i id="toggleEyeConfirm" class="fas fa-eye eye-icon"
                                        onclick="mostrarSenhaConfirm()"></i>
                                    <span class="nao-enviado" id="nao-enviado-form">As senhas não coincidem! Tente
                                        novamente.</span>
                                        </div>
                                    <style>
                                        .nao-enviado {
                                            font-size: 15px;
                                            font-family: "poppins", sans-serif;
                                            font-weight: 300;
                                            padding: 10px;
                                            display: none;

                                            margin: 10px 0;

                                            transition: .3s;

                                            background-color: #FFCACA;
                                            border: 2px #a60202 solid;
                                            color: red;
                                            border-radius: 5px;
                                        }
                                            .eye-icon {
                                                
                                            }

                                            #toggleEyeConfirm {
                                                
                                            }
                                        
                                    </style>
                               


                            </div>
                        </div>
                    </div>
                    <div class="register-details d-flex flex-column justify-content-center">

                        <div class="d-flex justify-content-center">
                            <input type="submit" class="button-register" value="Criar Conta" onclick="validar()">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>