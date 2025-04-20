<?php
session_start();
require_once(__DIR__ . "/dbconexao.php");

function verificaTipo($tipo_esperado) {
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: ../pages/account/login/index.php");
        exit();
    }

    global $conn;
    $id_usuario = $_SESSION['id_usuario'];

    $sql = "SELECT tipo_usuario FROM usuario WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_usuario]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if ($row['tipo_usuario'] !== $tipo_esperado) {
            header("Location: /404.php"); // redireciona pra página de erro
            exit();
        }
    } else {
        header("Location: /404.php"); // se o usuário não for encontrado
        exit();
    }
}
?>
