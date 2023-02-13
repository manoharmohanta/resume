<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Login for ResumeGenie</title>
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
                <h2 class="text-center">Login Form</h2>
                    <form class="login" role="form">
                        <div class="form-group row m-2">
                            <label for="email" class="col-sm-3 control-label">Email * </label>
                            <div class="col-sm-9">
                                <input type="email" id="email" placeholder="Email" class="form-control" name= "email">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="password" class="col-sm-3 control-label">Password*</label>
                            <div class="col-sm-9">
                                <input type="password" id="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row ms-2">
                            <div class="col-sm-9 col-sm-offset-3">
                                <span class="help-block">*Required fields</span>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary mt-4 setup" type="submit">
                                Login
                            </button>
                        </div>
                    </form>
                    <hr>
                    <div class="row g-0">
                        <div class="col-5 text-center">
                            <a href="<?= base_url('resume/register') ?>" class="text-primary">Register</a>
                        </div>
                        <div class="col-2 text-center">
                            <span>|</span>
                        </div>
                        <div class="col-5 text-center">
                            <a href="<?= base_url('resume/forgot') ?>" class="text-primary">Forgot Passowrd</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="assets/js/toastr.min.js"></script>
        <script src="assets/js/setup.js"></script>
    </body>
</html>