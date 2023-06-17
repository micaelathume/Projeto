<!DOCTYPE html>

<?php include_once('header.php'); ?>

<!-- Title Page-->
<title>Registre-se</title>

<body>
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="images/icon/logo.png" alt="">
                            <h2 class="title-1">Eventos</h2>
                        </a>
                    </div>
                    <div class="login-form">
                        <div class="form-group">
                            <label>Nome Completo</label>
                            <input class="au-input au-input--full" type="text" name="nome"
                                   placeholder="Seu nome">
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input class="au-input au-input--full" type="text" name="cpf"
                                   placeholder="CPF">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="au-input au-input--full" type="email" name="email" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input class="au-input au-input--full" type="password" name="senha"
                                   placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <label>Endereço</label>
                            <input class="au-input au-input--full" type="text" name="endereco"
                                   placeholder="Endereço">
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit"
                                onclick="cadastrarUsuario()">Criar conta
                        </button>

                        <div class="register-link">
                            <p>Já tem uma conta?
                                <a href="login.php">Entrar</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php include_once('footer.php'); ?>

<script src="js/usuario.js"></script>

<script>
    $("input[name=cpf]").mask('000.000.000-00', {reverse: false});
</script>

</html>
<!-- end document-->