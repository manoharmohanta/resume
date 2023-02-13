<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Setup for ResumeGenie</title>
        <link rel="canonical" href="<?= base_url() ?>">
        <!-- Bootstrap core CSS -->
        <link href="<?= base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/toastr.min.css" rel="stylesheet">
        <style>
            html,body {
                height: 100vh;
                background-color: #f5f5f5;
            }
            .container{
                height: 100%;
            }
            h1 span {
                color: #0ea2bd;
                font-weight: 500;
            }
        </style>
    </head>
    <body class="text-center overflow-hidden">
        <main class="row container d-flex align-items-center justify-content-center">
            <div class="col-md-6 offset-md-3">
                <a href="<?= base_url() ?>" class="logo">
                    <h1>Resume<span>Genie</span></h1>
                </a>
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <ul class="list-group list-group-flush text-start ps-5 pe-5 mt-4">
                        <?php 
                            if($status == 0){
                                foreach($msg as $val){ 
                        ?>
                        <li class="list-group-item"><i class="text-danger bi bi-x-circle"></i> <?= $val ?></li>
                        <?php }}else{ ?>
                        <li class="list-group-item"><i class="text-success bi bi-check-circle"></i> <?= $msg ?></li>
                        <script>
                            var delay = 3000; 
                            setTimeout(function(){window.location.replace("<?= base_url() ?>") }, delay);;
                        </script>
                        <?php }?>
                    </ul>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary mt-4 setup" type="button">
                            Start Your Set Up
                            <!-- <div class="spinner-border text-warning" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div> -->
                        </button>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="assets/js/toastr.min.js"></script>
        <script src="assets/js/setup.js"></script>
    </body>
</html>