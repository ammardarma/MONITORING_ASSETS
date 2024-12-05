
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Inventaris Assets</title>
        <link rel="icon" href="#" type="image/x-icon" />
        <link rel="stylesheet" href="https://esokbumi.my.id/assets/bundle/style-secret.css" />
        <link rel="stylesheet" href="https://esokbumi.my.id/assets/font-awesome-complete/css/all.min.css"/>
        <link rel="stylesheet" href="https://esokbumi.my.id/assets/mdbootstrap5/css/mdb.min.css"/>
        <link rel="stylesheet" href="https://esokbumi.my.id/assets/mdbootstrap5/plugins/css/all.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    </head>
<body style="font-family: Lato;">
    <main>
        <div class="vh-100 align-content-center bg-gambar">
            <div class="container h-100" style="padding-top:8rem; padding-bottom:8rem;">
                <!-- ALERT MESSAGE -->
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" data-mdb-alert-init
                        data-mdb-color="success">
                        <i class="fa fa-check-circle me-3"></i>
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('failed')) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" data-mdb-alert-init
                        data-mdb-color="danger">
                        <i class="fa fa-check-circle me-3"></i>
                        <?php echo $this->session->flashdata('failed'); ?>
                        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <div class="card rounded-8 shadow-5-strong h-100 ">
                    <div class="card-body p-0">
                        <div class="row h-100">
                            <div class="col-md-6 align-content-center text-center px-5">
                                <form id="formLogin" action="<?=base_url()?>Login/actValidated" method="POST" class="was-validated">
                                    <div class="d-md-none mb-2">
                                        <img src="assets/ilustration_login.svg" height="90" class="rounded-8" alt="?" loading="lazy"/>
                                    </div>
                                    <div class="d-none d-md-block">
                                    <img src="assets/logo-wb.png" height="70" class="rounded-8" alt="?" loading="lazy"/>
                                    </div>
                                    <div class="row text-center mb-2 mt-3">
                                        <h6 class="m-0"><strong>Login Account</strong></h6>
                                        <small class="form-label">Glad to have you come back here!</small>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-3">
                                        <input type="email" id="email" name="email" class="form-control" required/>
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="password" id="password" class="form-control" required />
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="mb-5 d-flex justify-content-end">
                                        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block w-50">Login</button>
                                    </div>
                                    <div class="mt-5 text-center form-label">
                                        <small><small>If you're forgot the password, please contact Administrator!</small></small>
                                    </div>
                                </form>
                            </div>
                            <div class="d-none d-md-block col-md-6 align-content-center text-center bg-gambar" style="border-top-right-radius:28px; border-bottom-right-radius:28px; border-left:1px solid #f8f8f8;">
                                <img src="assets/ilustration_login.svg" height="280" class="rounded-8" alt="?" loading="lazy"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
    <script type="text/javascript" src="https://esokbumi.my.id/assets/mdbootstrap5/js/mdb.umd.min.js"></script>
    <script type="text/javascript" src="https://esokbumi.my.id/assets/mdbootstrap5/plugins/js/all.min.js"></script>
</html>

<script type="text/javascript">
$(document).ready(function(){
   
});
</script>

<style>

    .bg-gambar {
        background-image:url("assets/login_background.svg");
        background-size: cover;
        background-repeat:no-repeat;
        background-position:center;
    }

    .btn {
        text-transform: unset !important;
    }
</style>