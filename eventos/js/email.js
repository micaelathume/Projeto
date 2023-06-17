function enviarEmail(ass, mens) {
    var email = {
        assunto: ass,
        mensagem: mens
    };

    $.ajax({
        url: 'http://localhost/api-eventos/email.php',
        type: 'PUT',
        dataType: 'JSON',
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(email),
        error: function (request, status, erro) {
            console.log(request);
            console.log(status);
            console.log(erro);
        },
        success: function () {
        }
    });
}