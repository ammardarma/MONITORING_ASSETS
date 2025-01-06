
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
        <!-- DataTables -->
        <link href="https://lib.wika-beton.co.id/datatables/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://lib.wika-beton.co.id/datatables/jquery.dataTables.min.js"></script>
        <script src="https://lib.wika-beton.co.id/datatables/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="https://lib.wika-beton.co.id/datatables/dataTables.fixedColumns.min.js"></script>
        <!-- FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
         <!-- Chart Js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    </head>
<body style="font-family: Lato;">
    <nav data-mdb-sidenav-init id="sidenav-1" class="sidenav bg-transparent text-gray align-content-center shadow-0" data-mdb-mode="side" data-mdb-slim="true" data-mdb-slim-collapsed="true" data-mdb-content="#content" data-mdb-hidden="false">
        <ul class="sidenav-menu">
            <li class="sidenav-item mb-3">
                <a href="<?=base_url()?>Home" class="sidenav-link p-0 justify-content-center" data-mdb-tooltip-init title="Home">
                    <div class="btn-primary bg-button-menu <?=$this->uri->segment(1) == 'Home' ? 'bg-button-menu-active' : '' ?>">
                        <h5 class="fa fa-home m-0 p-0"></h5>
                    </div>
                </a>
            </li>
            <li class="sidenav-item mb-3">
                <a href="<?=base_url()?>PC"  class="sidenav-link p-0 justify-content-center" data-mdb-tooltip-init title="PC">
                    <div class="btn-primary bg-button-menu <?=$this->uri->segment(1) == 'PC' ? 'bg-button-menu-active' : '' ?>">
                        <h5 class="fa fa-desktop m-0"></h5>
                    </div>
                </a>
            </li>
            <li class="sidenav-item mb-3">
                <a href="<?=base_url()?>Laptop" class="sidenav-link p-0 justify-content-center" data-mdb-tooltip-init title="Laptop">
                    <div class="btn-primary bg-button-menu <?=$this->uri->segment(1) == 'Laptop' ? 'bg-button-menu-active' : '' ?>">
                        <h5 class="fa fa-laptop m-0"></h5>
                    </div>
                </a>
            </li>
            <li class="sidenav-item mb-3">
                <a href="<?=base_url()?>Printer" class="sidenav-link p-0 justify-content-center" data-mdb-tooltip-init title="Printer">
                    <div class="btn-primary bg-button-menu <?=$this->uri->segment(1) == 'Printer' ? 'bg-button-menu-active' : '' ?>">
                        <h5 class="fa fa-print m-0"></h5>
                    </div>
                </a>
            </li>
            <?php if($this->session->userdata('status') == 'admin'): ?>
                <li class="sidenav-item mb-3">
                    <a href="<?=base_url()?>Target" class="sidenav-link p-0 justify-content-center" data-mdb-tooltip-init title="Target">
                        <div class="btn-primary bg-button-menu <?=$this->uri->segment(1) == 'Target' ? 'bg-button-menu-active' : '' ?>">
                            <h5 class="fa fa-bullseye-arrow m-0"></h5>
                        </div>
                    </a>
                </li>
            <?php endif; ?>
            <?php if($this->session->userdata('status') == 'admin'): ?>
            <li class="sidenav-item mb-3">
                <a href="<?=base_url()?>Users" class="sidenav-link p-0 justify-content-center" data-mdb-tooltip-init title="Users">
                    <div class="btn-primary bg-button-menu <?=$this->uri->segment(1) == 'Users' ? 'bg-button-menu-active' : '' ?>">
                        <h5 class="fa fa-users m-0"></h5>
                    </div>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
</nav>

<div id="content">
    <div class="py-4 ps-3 pe-5 h-100">
        <div class="mb-2 justify-content-between d-flex align-items-center">
            <div class="d-flex">
                <img src="<?=base_url()?>assets/logo-wb.png" class="rounded d-none d-md-block" height="50" alt="?" loading="lazy"/>
            </div>
            <div class="d-flex align-items-center">
                <div class="me-4 mt-2 d-none d-md-block text-center">
                    <h5 class="m-0 text-purple"><strong>&nbsp;&nbsp;IT INVENTORY</strong></h5>
                    <small class="m-0 text-dark">&nbsp;&nbsp;Maintain Our Assets</small><br>
                </div>
                <div class="dropdown">
                    <a data-mdb-dropdown-init class="dropdown-toggle align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                        <img src="<?=!empty($this->session->userdata('profile_picture')) ? base_url() . $this->session->userdata('profile_picture') : base_url(). 'assets/user.png'?>" class="rounded-8" height="60" alt="?" loading="lazy"/>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="width:250px;" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <div class="py-2 px-3 border rounded-2">
                                <span class="text-primary" style="font-size:1rem;"><span class="fa fa-angle-double-right"></span> &nbsp;&nbsp;<?=$this->session->userdata('name')?></span><br>
                            </div>
                        </li>
                        <li>
                            <a class="dropdown-item text-primary" href="<?=base_url()?>Users/myProfile"><i class="fa fa-user"></i> &nbsp;Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-danger" href="<?=base_url()?>Login/actLogout"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="hr hr-blurry" />
        <div class="text-end mb-4">
            <h6 class="fw-bold text-primary" style="font-size:14px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i><?=ucfirst($this->session->userdata('status'))?></h6>
        </div>
        <?=$content?>
    </div>
</div>
<!-- Toggler -->
</body>
    <script type="text/javascript" src="https://esokbumi.my.id/assets/mdbootstrap5/js/mdb.umd.min.js"></script>
    <script type="text/javascript" src="https://esokbumi.my.id/assets/mdbootstrap5/plugins/js/all.min.js"></script>
</html>

<script type="text/javascript">
$(document).ready(function(){
   
});
</script>

<style>

    html, body {
        height:100vh;
        background-color:#f8f8fa;
    }

    .text-gray {
        color: rgba(156,163,175, 1);
    }

    .bg-gray {
        background-color: rgba(55,65,81,1);
    }

    .bg-gray-200 {
        background-color: rgba(229, 231, 235, 1);
    }

    .bg-button-menu {
        background: rgba( 255, 255, 255, 0.8);
        backdrop-filter: blur( 3px );
        -webkit-backdrop-filter: blur( 3px );
        border: 1px solid rgba(0,0,0, 0.2); 
        border-radius:50%;
        width:2.8em;
        height:2.8em;
        align-content:center;
        text-align:center;
    }

    .bg-button-menu-active {
        background: #845EC2!important;
        color: rgba(255, 255, 255, 1) !important;
        border: none; 
    }

    .bg-glass {
        background: rgba( 255, 255, 255, 0.2 );
        backdrop-filter: blur( 1px );
        -webkit-backdrop-filter: blur( 1px );
    }

    .text-purple {
        color: #845EC2 !important;
    }

    .text-teal {
        color: #007f72 !important;
    }

    .text-pink {
        color :#f05f76 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: black !important;
        border: 1px solid #f1f1f1 !important;
        border-radius: 25px;
        background: #fff !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.active {
        color: black !important;
        border: 1px solid #d4d4d0 !important;
        border-radius: 25px;
        background: #fff !important;
    }

    .btn {
        text-transform: unset !important;
    }
</style>