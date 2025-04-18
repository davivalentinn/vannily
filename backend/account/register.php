<?php
session_start();

// Inicializa o array de resposta
$response = [
    'sucesso' => false,
    'erro' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    try {
        require_once '../dbconexao.php';

        // Validação do e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['erro'] = "E-mail inválido. Por favor, insira um e-mail válido.";
            echo json_encode($response);
            exit;
        }

        // Verifica se o e-mail já está cadastrado
        $sql_verifica = "SELECT email FROM usuario WHERE email = :email";
        $stmt = $conn->prepare($sql_verifica);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $response['erro'] = "O e-mail já está cadastrado. Por favor, use outro e-mail.";
            echo json_encode($response);
            exit;
        }

        // Se não houver erros, insere no banco
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario (nomeCompleto, nomeExibicao, email, senha) VALUES (:nomeCompleto, :nomeExibicao, :email, :senha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nomeCompleto', $nome);
        $stmt->bindParam(':nomeExibicao', $nomeExibicao);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha_hash);
        $stmt->execute();

        $response['sucesso'] = true;
        
    } catch (Exception $e) {
        $response['erro'] = "ERRO!! Sistema indisponível. Tente novamente.";
    }
}

// Retorna a resposta em formato JSON
echo json_encode($response);
?>