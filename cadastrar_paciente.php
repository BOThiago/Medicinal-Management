<?php 
include "include/mysqlconecta.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>IA MED</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->
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
        <!-- Top Bar End -->

        <!-- Page Content-->
        <div class="page-content" style="background-color: #F2F3F3;">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">Paciente</h4>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <div class="breadcrumb" style="margin-bottom: 10px;">
                    <a href="home.php" style="text-decoration: none; color: #000;">Home</a>
                    <span style="color: #888;margin: 0 5px;"> > </span>
                    <a href="pacientes.php" style="text-decoration: none; color: #000;">Paciente</a>
                    <span style="color: #888;margin: 0 5px;"> > </span>
                    <span>Cadastrar novo paciente</span>
                </div>
                <!-- end page title end breadcrumb -->
                <!--formulario add_usuarios-->
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">

                                <h4 class="d-flex align-items-end" style="
                                                color: #000000;
                                                
                                                font-style: normal;
                                                font-weight: 600;
                                                font-size: 30px;
                                                line-height: 29px;
                                                ">Novo paciente</h4><br>

                                <h4 class="d-flex align-items-end" style="
                                                color: #000000;
                                                
                                                font-style: normal;
                                                font-weight: 600;
                                                font-size: 20px;
                                                line-height: 29px;
                                                ">Paciente</h4>
                            </div>
                            <hr style="border: 1px solid #000000; border-radius: 5px; place-items: center">
                            <form class="form-horizontal well" id="formulario_paciente" method="post">
                                <div class="row">
                                    <div class="row mb-3">
                                        <a onclick="goBack()"
                                            style="cursor:pointer;font-weight: 700;font-size: 16px;color: #333388;"><i
                                                class="mdi mdi-arrow-left"></i> Voltar</a>
                                    </div>

                                    <div class="mt-3 col-sm-12">
                                        <label class="mb-2">Nome do paciente</label>
                                        <input type="text" class="form-control" placeholder="Nome do paciente" id="nome"
                                            name="nome" value="" />
                                    </div>

                                    <div class="mt-3 col-sm-12">
                                        <label class="mb-2">CPF</label>
                                        <input type="text" class="form-control" placeholder="CPF" id="cpf" name="cpf" />
                                    </div>

                                    <div class="mt-3 col-sm-12">
                                        <label class="mb-2">Sexo</label>
                                        <input type="text" class="form-control" placeholder="Sexo" id="sexo"
                                            name="sexo" />
                                    </div>

                                    <div class="mt-3 col-sm-12">
                                        <label class="mb-2">Idade</label>
                                        <input type="text" class="form-control" placeholder="Idade" id="idade"
                                            name="idade" />
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-10 ms-auto text-end">
                                            <a class="btn btn-danger"
                                                onclick="goBack()">Cancelar</a>
                                            <input type="submit" class="btn btn-success"
                                                value="Salvar alterações" />
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div> <!-- end card-body -->

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

    <!--CADASTRO VIA AJAX-->
    <script>
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

    $(document).ready(function() {
        $("#formulario_paciente").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: 'assets/ajax/cria_paciente.php',
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

    function goBack() {
        history.back();
    }
    </script>

</body>

</html>