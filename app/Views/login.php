<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Sinjam :)</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url("vendor") ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url("css") ?>/sb-admin-2.min.css" rel="stylesheet">

</head>

<body
    style="background :url(<?= base_url("img") . "/login.jpg" ?>); height:100%; background-position:center; background-size: cover;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-5 pt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center mb-4">
                                        <div class="h3 text-gray-900">
                                            <i class="fa fa-search-dollar"></i> Sinjam SarPras <sup>:)</sup>
                                        </div>
                                        <sup>Aplikasi Untuk Optimalisasi Informasi.</sup>
                                        <h3 class="h4 mb-4">Selamat Datang !</h3>
                                        <?php echo session()->getFlashdata('message'); ?>
                                    </div>
                                    <form class="user" method="POST" action="<?= base_url() ?>/login/auth">
                                        <div class="form-group">
                                            <select class="form-control" id="nama" name="nama">
                                                <?php for ($i = 0; $i < count($user); $i++) : ?>
                                                <option value="<?= $user[$i]["id"] ?>">
                                                    <?=  $user[$i]["nama"] ?>
                                                </option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="exampleInputPassword"
                                                placeholder="Password" name="password">
                                        </div>
                                        <input type="submit" value="Masuk" class="btn btn-success btn-user btn-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url("vendor") ?>/jquery/jquery.min.js">
    </script>
    <script src="<?php echo base_url("vendor") ?>/bootstrap/js/bootstrap.bundle.min.js">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url("vendor") ?>/jquery-easing/jquery.easing.min.js">
    </script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url("js") ?>/sb-admin-2.min.js">
    </script>

</body>

</html>