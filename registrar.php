<?php
include_once './config/config.php';
include_once './classes/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new Usuario($db);
    $nome  = $_POST['nome'];
    $sexo  = $_POST['sexo'];
    $fone  = $_POST['fone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario->criar($nome, $sexo, $fone, $email, $senha);
    header('Location: portal.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta — Sistema</title>
    <?php include_once './includes/head.php'; ?>
</head>
<body>
<div class="auth-screen" style="align-items:flex-start;padding-top:60px;">
    <div class="auth-card" style="max-width:500px;">
        <a href="index.php" style="display:inline-flex;align-items:center;gap:8px;color:var(--text-muted);text-decoration:none;font-size:13px;margin-bottom:28px;">
            ← Voltar para login
        </a>

        <h1 class="auth-title">Criar conta</h1>
        <p class="auth-subtitle">Preencha os dados para se registrar</p>

        <form method="POST">
            <div class="field">
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
            </div>

            <div class="field">
                <label>Sexo</label>
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="sexo" value="M" required> Masculino
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="sexo" value="F"> Feminino
                    </label>
                </div>
            </div>

            <div class="form-row">
                <div class="field">
                    <label for="fone">Telefone</label>
                    <input type="text" id="fone" name="fone" placeholder="(51) 99999-9999" required>
                </div>
                <div class="field">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                </div>
            </div>

            <div class="field">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Mínimo 6 caracteres" required>
            </div>

            <button type="submit" class="btn btn-primary btn-full" style="margin-top:4px;">
                Criar conta
            </button>
        </form>
    </div>
</div>
</body>
</html>