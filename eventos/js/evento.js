function popularEventos() {
    $.ajax({
        url: 'http://localhost/api-eventos/api/evento/read.php',
        type: 'GET',
        dataType: 'JSON',
        contentType: "application/json; charset=utf-8",
        error: function (request, status, erro) {
            console.log(request);
            console.log(status);
            console.log(erro);
            alert("Não foi possível carregar os eventos");
        },
        success: function (data) {
            $(data).each(function (index) {

                var situacao = "";
                switch (data[index].status) {
                    case 'F':
                        situacao = '<span>Finalizado</span>';
                        break;
                    case 'C':
                        situacao = '<span class="status--denied">Cancelado</span>';
                        break;
                    case 'A':
                        situacao = '<span class="status--process">Disponível</span>';
                        break;
                    case 'E':
                        situacao = 'Ocorrendo';
                        break;
                }

                $('tbody#eventos').append(
                    '<tr class="spacer"></tr>' +
                    '<tr><td>'
                    + data[index].id
                    + '</td><td class="desc">'
                    + data[index].nome
                    + '</td><td>'
                    + data[index].data
                    + '</td><td>'
                    + data[index].valor_inscricao
                    + '</td><td>'
                    + situacao
                    + '</td>' +
                    '<td>' +
                    '    <div>' +
                    '        <button class="item" data-placement="top" data-toggle="modal" data-target="#staticModal" ' +
                    '                id="detalhes" onclick="detalhesIncricao()"' +
                    '                title="Inscrever-se">' +
                    '            <i class="zmdi zmdi-check"></i>' +
                    '            <span>participar</i>' +
                    '        </button>' +
                    '    </div>' +
                    '</td></tr>')
            });
        }

    });
}
