function gerarCertificado() {

    $('#inscricoes').on('click', '#certificado', function (e) {
        if (e.handled !== true) // This will prevent event triggering more then once
        {
            e.handled = true;

            var linha = $(this).closest('tr');

            var ins = {
                usuario: "1",
                evento: linha.find('td:eq(0)').text(),
                data_emissao: getDateFormatted(),
                conteudo: "Certificamos que você participou do evento " + linha.find('td:eq(1)').text() + "."
            };

            $.ajax({
                url: 'http://localhost/api-eventos/api/certificado/create.php',
                type: 'POST',
                dataType: 'JSON',
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify(ins),
                error: function (request, status, erro) {
                    console.log(request);
                    console.log(status);
                    console.log(erro);
                    alert("Não foi possível gerar o certificado da sua participação");
                },
                success: function () {
                    pdf(ins.evento);

                    var assunto = "Emissão de certificado";
                    var mensagem = "Olá, \n\nInformamos que o certificado de participação do evento foi gerado com sucesso.";
                    enviarEmail(assunto, mensagem);
                }
            });
        }

    });
}

function pdf(evento) {
    var usuario = $('#id-usuario').val();

    var request = new XMLHttpRequest();
    request.open('GET', 'http://localhost/api-eventos/api/certificado/generate.php?usuario=' + usuario + '&evento=' + evento, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.responseType = 'blob';

    request.onload = function () {
        // Only handle status code 200
        if (request.status === 200) {
            // Try to find out the filename from the content disposition `filename` value
            var disposition = request.getResponseHeader('content-disposition');
            var matches = /"([^"]*)"/.exec(disposition);
            var filename = (matches != null && matches[1] ? matches[1] : 'file.pdf');

            // The actual download
            var blob = new Blob([request.response], {type: 'application/pdf'});
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = filename;

            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);
        }
    };

    request.send('content=' + "meu textinho");
}

function validarCertificado() {
    var codigo = $('#codigo').val();

    $.ajax({
        url: 'http://localhost/api-eventos/api/certificado/validate.php?codigo=' + codigo,
        type: 'GET',
        dataType: 'JSON',
        contentType: "application/json; charset=utf-8",
        error: function (request, status, erro) {
            alert("Certificado inválido");
        },
        success: function () {
            alert("Certificado validado com sucesso");
        }
    });
}