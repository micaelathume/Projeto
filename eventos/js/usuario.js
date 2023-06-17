function cadastrarUsuario() {

    var usuario = {
        nome: $("input[name=nome]").val(),
        cpf: $("input[name=cpf]").val(),
        email: $("input[name=email]").val(),
        senha: md5($("input[name=senha]").val()),
        endereco: $("input[name=endereco]").val()
    };

    $.ajax({
        url: 'http://localhost/api-eventos/api/usuario/create.php',
        type: 'POST',
        dataType: 'JSON',
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(usuario),
        error: function (request, status, erro) {
            console.log(request);
            console.log(status);
            console.log(erro);
            alert("Não foi possível confirmar seu cadastro");
        },
        success: function () {
            alert('Usuário cadastrado com sucesso');

            var assunto = "Bem-vindo";
            var mensagem = "Olá, \n\nSeja bem-vindo a nossa plataforma de eventos!";
            enviarEmail(assunto, mensagem);

            window.location.href = 'login.php';
        }
    });
}

function inscricaoRapida() {

    var usuario = {
        email: $("input[name=email]").val(),
        senha: md5('123'),
        nome: '',
        cpf: '',
        endereco: ''
    };

    $.ajax({
        url: 'http://localhost/api-eventos/api/usuario/create.php',
        type: 'POST',
        dataType: 'JSON',
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(usuario),
        error: function (request, status, erro) {
            alert("Não foi possível confirmar o cadastro");
        },
        success: function () {
            $.ajax({
                url: 'http://localhost/api-eventos/api/usuario/login.php?email=' + usuario.email + "&senha=" + usuario.senha,
                type: 'GET',
                dataType: 'JSON',
                contentType: "application/json; charset=utf-8",
                error: function (request, status, erro) {
                    alert("Não foi possível confirmar o cadastro");
                },
                success: function (data) {
                    alert("Usuário cadastrado com sucesso");

                    var assunto = "Bem-vindo";
                    var mensagem = "Olá, \n\nSeja bem-vindo a nossa plataforma de eventos! \n\n"+
                                   "Você deve completar seu cadastro pelo nosso site, para isso, utilize a senha \"123\" para fazer login. ";
                    enviarEmail(assunto, mensagem);

                    $('#staticModal').modal('toggle');
                    $('#usuario').val(data.id);
                }
            });
        }
    });
}