<?php
$email_usuario = $_POST['email_usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

try {
    require_once '../dbconexao.php'; // deve criar um objeto PDO em $conn

    $sql = "SELECT * FROM usuario WHERE email = :valor OR usuario = :valor";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':valor', $email_usuario);
    $stmt->execute();

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($dados) === 1) {
        $senha_banco = $dados[0]['senha'];
        if (password_verify($senha, $senha_banco)) {
            session_start();
            $_SESSION['id_usuario'] = $dados[0]['id'];
            $_SESSION['email_usuario'] = $dados[0]['email'];
            $_SESSION['usuario'] = $dados[0]['usuario'];
            $_SESSION['nome_completo_usuario'] = $dados[0]['nome'];
            $_SESSION['numero_usuario'] = $dados[0]['numero_telefone'];
            $_SESSION['tipo_usuario'] = $dados[0]['tipo_usuario'];
            $_SESSION['data_criacao_usuario'] = $dados[0]['data_criacao'];

            header("Location: ../../index.php");
            exit();
        } else {
            header("Location: ../../pages/account/login/index.php?erro=senha");
            exit();
        }
    } else {
        header("Location: ../../pages/account/login/index.php?erro=usuario");
        exit();
    }

} catch (Exception $erro) {
    echo "Erro ao tentar logar: " . $erro->getMessage();
}
?>
