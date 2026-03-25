<?php
session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';

$usuario = new Usuario($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        if ($dados_usuario = $usuario->login($email, $senha)) {
            $_SESSION['usuario_id'] = $dados_usuario['id'];
            header('Location: portal.php');
            exit();
        } else {
            $mensagem_erro = "E-mail ou senha incorretos. Tente novamente.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar — Sistema</title>
    <?php include_once './includes/head.php'; ?>
</head>

<body>
    <div class="auth-screen">
        <div class="auth-card">
            <div class="brand"
                style="display:flex;align-items:center;gap:10px;margin-bottom:32px;text-decoration:none;">
                <div class="brand-dot"></div>
                <span
                    style="font-family:'Syne',sans-serif;font-weight:800;font-size:16px;letter-spacing:0.08em;">SISTEMA</span>
            </div>

            <h1 class="auth-title">Bem-vindo de volta</h1>
            <p class="auth-subtitle">Faça login para acessar o painel</p>

            <?php if (isset($mensagem_erro)): ?>
                <div class="alert alert-danger"><?php echo $mensagem_erro; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="field">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="field">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="••••••••" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-full">
                    Entrar
                </button>
            </form>

            <div class="auth-link">
                Não tem conta? <a href="./registrar.php">Criar conta</a>
            </div>
        </div>
    </div>
</body>

</html>