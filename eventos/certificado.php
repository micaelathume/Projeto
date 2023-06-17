<!DOCTYPE html>

<?php include_once('header.php'); ?>

<!-- Title Page-->
<title>Validação de certificado</title>

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
                                <strong>Validar certificado</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Código</label>
                                    <input type="text" id="codigo" placeholder="Digite o código do certificado"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" onclick="validarCertificado()">Validar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php include_once('footer.php'); ?>

<script src="js/certificado.js"></script>

</html>
<!-- end document-->

