<?php
    include "include/valida_session_usuario.php";
    include "include/mysqlconecta.php";
    $enfermidades = array();
    $medicamentos = array();

    $SQL = "SELECT * FROM enfermidade";
    $result = @mysqli_query($conexao, $SQL) or die("Ocorreu um erro ao consultar as enfermidades.");

    while ($row = mysqli_fetch_assoc($result)) {
        $enfermidades[] = $row;
    }

    $SQL = "SELECT * FROM medicamento";
    $result = @mysqli_query($conexao, $SQL) or die("Ocorreu um erro ao consultar os medicamentos.");

    while ($row = mysqli_fetch_assoc($result)) {
        $medicamentos[] = $row;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>IA MED</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: flex;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        display: flex;
        align-items: center;
        flex-direction: collumn;
        justify-content: center;
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 20%;
        height: 24%;
    }

    .form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .close {
        color: #000;
        float: right;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        margin-top: 20px
    }

    .btn-div {
        display: flex;
        margin-top: 10px;
        flex-direction: collumn;
        gap: 24px;
        justify-content: space-evenly;
    }

    .form-select {
        width: 80%;
    }
    </style>
</head>

<body class="">
    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <?php include "left_menu.php";?>
    </div>
    <!-- end left-sidenav-->

    <div class="page-wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            <?php include "navbar.php";?>
            <!-- end navbar-->
        </div>
        <div class="page-content" style="background-color: #F2F3F3;">
            <div class="container-fluid">
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="CdTitulo" style="
                                    color: #000000;
                                    font-family: 'Poppins', sans-serif;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 20px;
                                    line-height: 29px;">Pacientes</h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <table id="tabela_meus_pacientes"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Nome do paciente</th>
                                            <th>CPF</th>
                                            <th>Sexo</th>
                                            <th>Idade</th>
                                            <th>Enfermidade</th>
                                            <th>Medicamento</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div id="enfermidadeModal" class="modal" style="display:none;">
                                <div class="modal-content">
                                    <h2>Adicionar Enfermidade</h2>
                                    <form id="enfermidadeForm" class="form">
                                        <div class="form">
                                            <input type="hidden" id="cpfenf" name="cpfenf">
                                            <select id="enfermidade" name="enfermidade" class="form-select">
                                                <option selected>Selecione uma enfermidade</option>
                                                <?php foreach ($enfermidades as $enfermidade) : ?>
                                                <option value="<?= $enfermidade['id_enfermidade'] ?>">
                                                    <?= $enfermidade['nome_enfermidade'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="btn-div">
                                            <button class="btn btn-success" type="submit">Adicionar</button>
                                            <span class="btn btn-danger" onclick="fecharModal()">Sair</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="medicamentoModal" class="modal" style="display:none;">
                                <div class="modal-content">
                                    <h2>Adicionar Medicamento</h2>
                                    <form id="medicamentoForm" class="form">
                                        <input type="hidden" id="cpfmed" name="cpfmed">
                                        <select id="medicamento" name="medicamento" class="form-select">
                                            <option selected>Selecione um medicamento</option>
                                            <?php foreach ($medicamentos as $medicamento) : ?>
                                            <option value="<?= $medicamento['id_medicamento'] ?>">
                                                <?= $medicamento['nome_medicamento'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="btn-div">
                                            <button class="btn btn-success" type="submit">Adicionar</button>
                                            <span class="btn btn-danger" onclick="fecharModal()">Sair</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div><!-- container -->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Required datatable js -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap5.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap5.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!-- <script src="assets/pages/jquery.datatable.init.js"></script> -->

    <!-- Plugins js -->

    <script src="assets/plugins/select2/select2.min.js"></script>
    <script src="assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
    <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
</body>

</html>
<script>
function fecharModal() {
    $("#medicamentoModal").css("display", "none");
    $("#medicamentoForm")[0].reset();
    $("#enfermidadeModal").css("display", "none");
    $("#enfermidadeForm")[0].reset();
}

function addMedicamento(cpf) {
    $("#cpfmed").val(cpf);
    $("#medicamentoModal").css("display", "block");
}

function addEfermidade(cpf) {
    $("#cpfenf").val(cpf);
    $("#enfermidadeModal").css("display", "block");
}

$("#tabela_meus_pacientes").DataTable({
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
    },
    pageLength: 100,
    order: [],
    paging: true,
    searching: true,
    info: true,
    data: [],
    columns: [{
            data: "anmpac_nome"
        },
        {
            data: "anmpac_cpf"
        },
        {
            data: "anmpac_sexo"
        },
        {
            data: "anmpac_idade"
        },
        {
            data: "anmpac_enfermidade"
        },
        {
            data: "anmpac_medicamento"
        }
    ]
});

function busca_pacientes() {
    $.ajax({
        url: "assets/ajax/buscar_pacientes.php",
        type: "GET"
    }).done(function(result) {

        var data = JSON.parse(result);

        $("#tabela_meus_pacientes").DataTable().clear().draw();
        $("#tabela_meus_pacientes").DataTable().rows.add(data).draw();
    });
}

busca_pacientes();
$(document).ready(function() {
    const msg = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    $("#enfermidadeForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'assets/ajax/update_enfermidade.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                let result = $.parseJSON(data);
                console.log(result)
                if (result.success) {
                    msg.fire({
                        icon: 'success',
                        title: 'Cadastrado com sucesso'
                    });
                    location.href = "home.php";
                    return;
                }

                msg.fire({
                    icon: 'error',
                    title: 'nome incorreto.'
                });
            },
            error: function() {
                msg.fire({
                    icon: 'error',
                    title: 'Ocorreu um erro.'
                });
            }
        });
    });
    $("#medicamentoForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'assets/ajax/update_medicamento.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                let result = $.parseJSON(data);
                console.log(result)
                if (result.success) {
                    msg.fire({
                        icon: 'success',
                        title: 'Cadastrado com sucesso'
                    });
                    location.href = "home.php";
                    return;
                }

                msg.fire({
                    icon: 'error',
                    title: 'nome incorreto.'
                });
            },
            error: function() {
                msg.fire({
                    icon: 'error',
                    title: 'Ocorreu um erro.'
                });
            }
        });
    });
});
</script>