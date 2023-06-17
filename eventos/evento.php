<!DOCTYPE html>

<?php include_once('header.php'); ?>

<!-- Title Page-->
<title>Eventos</title>

<body>
<div class="page-wrapper">

    <?php include_once('menu.php'); ?>

    <!-- PAGE CONTENT-->
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="page-content--bgf7">
                        <!-- DATA TABLE-->
                        <section class="p-t-20">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="title-5 m-b-35">Eventos</h3>
                                        <div class="table-data__tool">
                                        </div>

                                        <div class="table-responsive table-responsive-data2">
                                            <table class="table table-data2" id="table-eventos">
                                                <thead>
                                                <tr>
                                                    <th>código</th>
                                                    <th>nome</th>
                                                    <th>data</th>
                                                    <th>valor</th>
                                                    <th>status</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody id="eventos">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal static -->
        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
             aria-hidden="true"
             data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Confirmação de inscrição</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="inserirInscricao()">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>

<?php include_once('footer.php'); ?>

<script src="js/evento.js"></script>
<script src="js/inscricao.js"></script>

<script>
    $(document).ready(function () {
        popularEventos();
    });
</script>

</html>
<!-- end document-->
