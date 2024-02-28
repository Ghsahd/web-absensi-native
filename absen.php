<?php
	@ob_start();
	session_start();
	require 'config.php';
    $sql = 'select * from data_absen';
    $row = $config->prepare($sql);
    $row -> execute();
    $res = $row -> fetchAll();
    $no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets//images/favicon.png">
    <title>Admin Absensi</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/pages/dashboard.css" rel="stylesheet">
    <link href="assets/css/colors/default-dark.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Absensi</p>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin.php">
                            <div class="dark-logo"></div>
                        </b>
                        <span>
                            <div class="dark-logo"></div>
                        </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>                    
                </div>
            </nav>
        </header>
        
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="admin.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Data Absen</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="dataguru.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Data Guru</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="absen.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Absen</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="logout.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Log Out</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>
        
        <div class="page-wrapper">
            <div class="container-fluid">                
                <!-- Data Absen -->

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Data Absen</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <a data-target="#tambahModal" data-toggle="modal" class="btn waves-effect waves-light btn-success pull-right hidden-sm-down"> Tambah Data</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">  
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h3 class="card-title m-b-5"><span class="lstick"></span>Data Absen </h3>
                                        </div>
                                        
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>kehadiran</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        foreach($res as $isi) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $isi['nama']?></td>
                                                        <td><?= $isi['kehadiran']?></td>
                                                        <td>
                                                        <a href="deleteabsen.php?id=<?php echo $isi['id'];?>" class="waves-effect waves-dark">
                                                            <i class="mdi mdi-delete-forever btn btn-danger"></i>
                                                        </a>

                                                        <a href="editabsen.php?id=<?php echo $isi['id'];?>" class="waves-effect waves-dark">
                                                            <i class="mdi mdi-table-edit btn btn-success"></i>
                                                        </a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $no++;}
								                    ?>                               
                                                </tbody>
                                            </table>

                                            <!-- Form tambah -->

                                            <!-- medium modal -->
                                            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content mt-5">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="mediumBody">
                                                            <!-- form -->

                                                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <form class="form-horizontal form-material" method="POST" action="tambahabsen.php">
                                                                            <div class="form-group">
                                                                                <label class="col-md-12">Nama</label>
                                                                                <div class="col-md-12">
                                                                                    <input type="text" name="nama" class="form-control form-control-line">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-12">kehadiran</label>
                                                                                <div class="col-md-12">
                                                                                    <input type="text" name="kehadiran" class="form-control form-control-line">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-sm-12">
                                                                                    <button class="btn btn-success">Tambah</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- end form -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End Form tambah -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--- content -->
                    </div>
                </div>

                <script>
                    $(document).on('click', '#smallButton', function(event) {
                        event.preventDefault();
                        let href = $(this).attr('data-attr');
                        $.ajax({
                            url: href,
                            beforeSend: function() {
                                $('#loader').show();
                            },
                            success: function(result) {
                                $('#smallModal').modal("show");
                                $('#smallBody').html(result).show();
                            },
                            complete: function() {
                                $('#loader').hide();
                            },
                            error: function(jqXHR, testStatus, error) {
                                console.log(error);
                                alert("Page " + href + " cannot open. Error:" + error);
                                $('#loader').hide();
                            },
                            timeout: 8000
                        })
                    });
                    
                    $(document).on('click', '#mediumButton', function(event) {
                        event.preventDefault();
                        let href = $(this).attr('data-attr');
                        $.ajax({
                            url: href,
                            beforeSend: function() {
                                $('#loader').show();
                            },
                            
                            success: function(result) {
                                $('#mediumModal').modal("show");
                                $('#mediumBody').html(result).show();
                            },
                            complete: function() {
                                $('#loader').hide();
                            },
                            error: function(jqXHR, testStatus, error) {
                                console.log(error);
                                alert("Page " + href + " cannot open. Error:" + error);
                                $('#loader').hide();
                            },
                            timeout: 8000
                        })
                    });

                </script>
            </div>
            <footer class="footer"> © 2022 Admin Absensi </footer>
        </div>
    </div>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/plugins/d3/d3.min.js"></script>
    <script src="assets/plugins/c3-master/c3.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>