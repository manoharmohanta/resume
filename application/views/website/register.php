<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Register for ResumeGenie</title>
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
    <body class="text-center">
        <main class="row container d-flex align-items-center justify-content-center">
            <div class="col-md-6 offset-md-3">
                <a href="<?= base_url() ?>" class="logo">
                    <h1>Resume<span>Genie</span></h1>
                </a>
                <div class="card shadow p-3 mb-5 bg-body rounded text-start">
                    <h2 class="text-center">Registeration Form</h2>
                    <form class="register" role="form">
                        <div class="form-group row m-2">
                            <label for="firstName" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="email" class="col-sm-3 control-label">Email * </label>
                            <div class="col-sm-9">
                                <input type="email" id="email" name="email" placeholder="Email" class="form-control" name= "email">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="password" class="col-sm-3 control-label">Password*</label>
                            <div class="col-sm-9">
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="password" class="col-sm-3 control-label">Confirm Password *</label>
                            <div class="col-sm-9">
                                <input type="password" id="cPassword" name="cPassword" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="birthDate" class="col-sm-3 control-label">Date of Birth *</label>
                            <div class="col-sm-9">
                                <input type="date" id="birthDate" name="birthDate" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="phoneNumber" class="col-sm-3 control-label">Phone number *</label>
                            <div class="col-sm-9">
                                <input type="phoneNumber" id="phoneNumber" name="phoneNumber" placeholder="Phone number" class="form-control">
                                <span class="form-text">Your phone number won't be disclosed anywhere </span>
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label class="control-label col-sm-3">Gender</label>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="radio-inline">
                                            <input type="radio" id="femaleRadio" name="gender" value="Female">Female
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="radio-inline">
                                            <input type="radio" id="maleRadio" name="gender" value="Male">Male
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.form-group -->
                        <div class="form-group row ms-2">
                            <div class="col-sm-9 col-sm-offset-3">
                                <span class="help-block">*Required fields</span>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary mt-4 setup" type="submit">
                                Register
                            </button>
                            <small class="text-muted">By clicking the 'Register' button, you confirm that you accept our Terms of use and Privacy Policy.</small>
                        </div>
                    </form>
                    <hr>
                    <div class="row g-0">
                        <div class="col-5 text-center">
                            <a href="<?= base_url('resume/login') ?>" class="text-primary">Login</a>
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