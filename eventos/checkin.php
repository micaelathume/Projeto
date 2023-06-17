<!DOCTYPE html>

<?php include_once('header.php'); ?>

<!-- Title Page-->
<title>Checkin</title>

<body>
<div class="page-wrapper">

    <?php include_once('menu.php'); ?>

    <!-- PAGE CONTENT-->
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="page-content--bgf7">
                        <div class="card">
                            <div class="card-header">
                                <strong>Checkin do evento</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Código</label>
                                    <input type="number" id="evento" placeholder="Digite o código do evento"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Usuário</label>
                                    <input type="number" id="usuario" placeholder="Digite o código do usuário"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Usuário não inscrito?</label>
                                    <a href="#" role="button" class="btn btn-link" data-placement="top" data-toggle="modal" data-target="#staticModal">Inscrição rápida
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" onclick="confirmarCheckin()">Confirmar presença
                                </button>
                            </div>
                        </div>
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
                            <h5 class="modal-title" id="staticModalLabel">Inscrição rápida</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">E-mail</label>
                                <input type="text" name="email" placeholder="Digite o e-mail"
                                       class="form-control">
                                <input hidden type="password" name="senha" value="123">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" onclick="inscricaoRapida()">Confirmar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php include_once('footer.php'); ?>

<script src="js/usuario.js"></script>
<script src="js/inscricao.js"></script>

</html>
<!-- end document-->