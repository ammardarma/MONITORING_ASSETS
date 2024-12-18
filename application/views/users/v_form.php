<div><h5 class="fw-bold"><i class="fa fa-users"></i> Users</h5></div>

<?php if(!empty($data)): ?>
    <form id='formEditData' method="post" action="<?= base_url() ?>Users/actEditData" class="was-validated">
<?php else: ?>
    <form id='formAddData' method="post" action="<?= base_url() ?>Users/actAddData" class="was-validated">
<?php endif; ?>
<div class="card mt-4">
    <div class="card-header">
        <h6 class="card-title fw-bold"><i class="fa fa-pen"></i> &nbsp;<?=$title?></h6>
    </div>
    <div class="card-body">
        <input type="hidden" name="id" value="<?=!empty($data) ? $data->USERS_ID : ''?>"/>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="text" class="form-control" name="nama" style="width:100%" value="<?=!empty($data) ? $data->NAME : ''?>" required/>
                <label for="nama_lembaga" class="form-label">Nama Lengkap</label>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="email" class="form-control" name="email" style="width:100%" value="<?=!empty($data) ? $data->EMAIL : ''?>" required/>
                <label for="email" class="form-label">Email</label>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="password" class="form-control" name="password" style="width:100%" value="<?=!empty($data) ? $data->PASSWORD : ''?>" required/>
                <label for="password" class="form-label">Password</label>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <select name="status" data-mdb-select-init class="status" required>
                <option value="admin" <?=!empty($data) ? ($data->STATUS == "admin" ? 'selected' : '') : ''?>>Admin</option>
                <option value="user" <?=!empty($data) ? ($data->STATUS == "user" ? 'selected' : '') : ''?>>User</option>
            </select>
            <label class="form-label select-label">Status</label>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?=base_url()?>Users" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function() {
   

});
</script>