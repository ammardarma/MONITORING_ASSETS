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

<div><h5 class="fw-bold"><i class="fa fa-users"></i> Users</h5></div>

<form id='formEditData' method="post" action="<?= base_url() ?>Users/actEditProfile" enctype="multipart/form-data" class="was-validated">
<div class="card mt-4">
    <div class="card-header">
        <h6 class="card-title fw-bold"><i class="fa fa-pen"></i> &nbsp;<?=$title?></h6>
    </div>
    <div class="card-body">
        <input type="hidden" name="id" value="<?=!empty($data) ? $data->USERS_ID : ''?>"/>
        <div class="col-md-12 mb-4 text-center">
            <input type="file" name="profile_picture" class="profile_picture" hidden/>
            <div class="d-inline-flex position-relative hover-overlay change_image" data-mdb-ripple-init data-mdb-ripple-color="light">
                <span class="position-absolute top-100 start-100 translate-middle">
                    <i class="fa fa-camera"></i>
                </span>
                <img class="rounded-circle shadow-4 image" src="<?= base_url() . $this->session->userdata('profile_picture') ?: base_url(). 'assets/user.png'?>" alt="Avatar" style="width: 100px; height: 100px;">
                <a href="#!">
                    <div class="mask" style="background-color: hsla(0, 0%, 98%, 0.2)"></div>
                </a>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="text" class="form-control" name="nama" style="width:100%" value="<?=!empty($data) ? $data->NAME : ''?>" required/>
                <label for="nama_lembaga" class="form-label">Nama Lengkap</label>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="password" class="form-control" name="password" style="width:100%" value="<?=!empty($data) ? $data->PASSWORD : ''?>" required/>
                <label for="password" class="form-label">Password</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?=base_url()?>Home" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function() {
   $('.change_image').on('click', function() {
        $('.profile_picture').click();
   });

   $('.profile_picture').on('change', function(e) {
        var tmppath = URL.createObjectURL(e.target.files[0]);
        $('.image').attr('src', tmppath);
   });

});
</script>

<style>
    .file-upload-preview {
        background-color: transparent !important;
    }
</style>